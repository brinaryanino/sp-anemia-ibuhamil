<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala;
use App\Models\Konsultasi;
use App\Models\Rule;
use App\Models\BasisPengetahuan;
use App\Models\RuleDetail;
use App\Models\KonsultasiGejala;
use App\Models\Kondisi;
use App\Models\SaranAwal;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class KonsultasiController extends Controller
{
    /**
     * Menampilkan form konsultasi (user side)
     */
    public function index()
    {
        $gejalas = Gejala::all();
        return view('konsultasi.index', compact('gejalas'));
    }

    /**
     * Memproses input user dan menghitung hasil deteksi anemia
     */
    public function store(Request $request)
    {
        try {
            /*
            |-------------------------------------------------------------
            | 1. VALIDASI INPUT
            |-------------------------------------------------------------
            */
            $request->validate([
                'usia_kehamilan' => 'required|numeric|min:1',
                'gejala'         => 'required|array|min:1',
            ]);

            /*
            |-------------------------------------------------------------
            | 2. HITUNG TRIMESTER KEHAMILAN
            |-------------------------------------------------------------
            */
            $usia = $request->usia_kehamilan;

            if ($usia <= 12) {
                $trimester = 'I';
            } elseif ($usia <= 27) {
                $trimester = 'II';
            } else {
                $trimester = 'III';
            }

            /*
            |-------------------------------------------------------------
            | 3. AMBIL GEJALA YANG DIPILIH USER
            |-------------------------------------------------------------
            */
            $gejalaTerpilih = $request->gejala;

            /*
            |-------------------------------------------------------------
            | 4. AMBIL BASIS PENGETAHUAN BERDASARKAN GEJALA
            |-------------------------------------------------------------
            */
            $basisPengetahuan = BasisPengetahuan::whereIn(
                'gejala_id',
                $gejalaTerpilih
            )->get();

            /*
            |-------------------------------------------------------------
            | 5. HITUNG CERTAINTY FACTOR PER KONDISI
            |-------------------------------------------------------------
            */
            $cfPerKondisi = [];

            foreach ($basisPengetahuan as $bp) {
                $cfRule = $bp->cf_pakar;

                if (!isset($cfPerKondisi[$bp->kondisi_id])) {
                    $cfPerKondisi[$bp->kondisi_id] = $cfRule;
                } else {
                    $cfPerKondisi[$bp->kondisi_id] =
                        $cfPerKondisi[$bp->kondisi_id]
                        + ($cfRule * (1 - $cfPerKondisi[$bp->kondisi_id]));
                }
            }

            /*
            |-------------------------------------------------------------
            | 6. TENTUKAN KONDISI DENGAN CF TERTINGGI
            |-------------------------------------------------------------
            */
            if (!empty($cfPerKondisi)) {
                arsort($cfPerKondisi);
                $hasilKondisiId = array_key_first($cfPerKondisi);
                $nilaiCF = $cfPerKondisi[$hasilKondisiId];
            } else {
                $hasilKondisiId = 1;
                $nilaiCF = 0;
            }

            /*
            |-------------------------------------------------------------
            | 7. SIMPAN DATA KONSULTASI
            |-------------------------------------------------------------
            */
            $konsultasi = Konsultasi::create([
                'usia_kehamilan'   => $usia,
                'trimester'        => $trimester,
                'hasil_kondisi_id' => $hasilKondisiId,
                'nilai_cf'         => round($nilaiCF, 2),
            ]);

            /*
            |-------------------------------------------------------------
            | 8. SIMPAN DETAIL GEJALA (PIVOT)
            |-------------------------------------------------------------
            */
            foreach ($gejalaTerpilih as $gejalaId) {
                KonsultasiGejala::create([
                    'konsultasi_id' => $konsultasi->id,
                    'gejala_id'     => $gejalaId,
                ]);
            }

            /*
            |-------------------------------------------------------------
            | 9. REDIRECT KE HALAMAN HASIL
            |-------------------------------------------------------------
            */
            return redirect()->route('konsultasi.hasil', $konsultasi->id);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([
                'error' => $th->getMessage(),
            ]);
        }
    }

    /**
     * Menampilkan hasil konsultasi
     */
    public function hasil($id)
    {
        $konsultasi = Konsultasi::with([
            'kondisi',
            'gejalas'
        ])->findOrFail($id);

        return view('konsultasi.hasil', compact('konsultasi'));
    }

    /**
     * EXPORT HASIL KONSULTASI KE PDF
     */
    public function exportPdf($id)
    {
        $konsultasi = Konsultasi::with([
            'kondisi',
            'gejalas'
        ])->findOrFail($id);

        $pdf = Pdf::loadView('konsultasi.pdf', compact('konsultasi'))
            ->setPaper('A4', 'portrait');

        return $pdf->download(
            'hasil-konsultasi-' . $konsultasi->id . '.pdf'
        );
    }
}
