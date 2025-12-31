<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala;
use App\Models\Konsultasi;

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
     * Memproses input user (tanpa login)
     */
    public function proses(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | 1. VALIDASI INPUT USER
        |--------------------------------------------------------------------------
        */
        $request->validate([
            'usia_kehamilan' => 'required|numeric|min:1',
            'gejala' => 'required|array|min:1',
        ]);

        /*
        |--------------------------------------------------------------------------
        | 2. HITUNG TRIMESTER BERDASARKAN USIA KEHAMILAN
        |--------------------------------------------------------------------------
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
        |--------------------------------------------------------------------------
        | 3. SIMPAN DATA KONSULTASI (SEMENTARA, TANPA CF)
        |--------------------------------------------------------------------------
        | hasil_kondisi_id dan nilai_cf masih dummy
        */
        $konsultasi = Konsultasi::create([
            'usia_kehamilan'     => $usia,
            'trimester'          => $trimester,
            'hasil_kondisi_id'   => 1,   // placeholder sementara
            'nilai_cf'           => 0.0, // placeholder
        ]);

        /*
        |--------------------------------------------------------------------------
        | 4. REDIRECT KE HALAMAN HASIL
        |--------------------------------------------------------------------------
        */
        return redirect('/hasil/' . $konsultasi->id);
    }

    /**
     * Menampilkan hasil konsultasi
     */
    public function hasil($id)
    {
        $konsultasi = Konsultasi::with('kondisi')->findOrFail($id);

        return view('konsultasi.hasil', compact('konsultasi'));
    }
}
