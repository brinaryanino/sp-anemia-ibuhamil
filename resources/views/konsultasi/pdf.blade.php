<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Hasil Deteksi Anemia</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
            line-height: 1.6;
        }

        .container {
            padding: 20px 30px;
        }

        /* Header */
        .header {
            text-align: center;
            margin-bottom: 25px;
            border-bottom: 2px solid #b91c1c;
            padding-bottom: 10px;
        }

        .header h2 {
            margin: 0;
            font-size: 18px;
            color: #b91c1c;
            letter-spacing: 0.5px;
        }

        .header p {
            margin-top: 4px;
            font-size: 11px;
            color: #666;
        }

        /* Section title */
        .section-title {
            font-size: 14px;
            font-weight: bold;
            margin-top: 25px;
            margin-bottom: 8px;
            color: #111827;
            border-left: 4px solid #b91c1c;
            padding-left: 8px;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        td {
            padding: 10px;
            border: 1px solid #d1d5db;
        }

        td.label {
            width: 40%;
            background-color: #f9fafb;
            font-weight: bold;
        }

        td.value {
            width: 60%;
        }

        /* Highlight box */
        .highlight {
            background-color: #fef2f2;
            border: 1px solid #fecaca;
            padding: 12px;
            margin-top: 20px;
            border-radius: 4px;
        }

        .highlight strong {
            color: #b91c1c;
        }

        /* List */
        ul {
            margin: 8px 0 0 18px;
            padding: 0;
        }

        ul li {
            margin-bottom: 6px;
        }

        span {
            color: #b91c1c;
            font-style: italic;
        }

        /* Footer note */
        .note {
            margin-top: 40px;
            font-size: 10px;
            color: #555;
            border-top: 1px dashed #d1d5db;
            padding-top: 10px;
        }

        .signature {
            margin-top: 50px;
            text-align: right;
            font-size: 11px;
        }
    </style>
</head>

<body>
<div class="container">

    {{-- Header --}}
    <div class="header">
        <h2>HASIL DETEKSI ANEMIA IBU HAMIL</h2>
        <p>Sistem Pakar Berbasis Certainty Factor</p>
        <p>Made by <span>Brinarya Nino Sudhipurwa</span></p>
    </div>

    {{-- Data Konsultasi --}}
    <div class="section-title">Data Konsultasi</div>
    <table>
        <tr>
            <td class="label">Usia Kehamilan</td>
            <td class="value">{{ $konsultasi->usia_kehamilan }} minggu</td>
        </tr>
        <tr>
            <td class="label">Trimester</td>
            <td class="value">{{ $konsultasi->trimester }}</td>
        </tr>
        <tr>
            <td class="label">Kondisi Terdeteksi</td>
            <td class="value">
                <strong>{{ $konsultasi->kondisi->nama_kondisi }}</strong>
            </td>
        </tr>
        <tr>
            <td class="label">Nilai Certainty Factor (CF)</td>
            <td class="value">{{ number_format($konsultasi->nilai_cf, 2) }}</td>
        </tr>
    </table>

    {{-- Saran Awal --}}
    @if ($konsultasi->kondisi->saranAwals->count() > 0)
        <div class="section-title">Saran Awal</div>

        <div class="highlight">
            <ul>
                @foreach ($konsultasi->kondisi->saranAwals as $saran)
                    <li>
                        <strong>{{ $saran->fokus }}:</strong>
                        {{ $saran->deskripsi_saran }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Catatan --}}
    <div class="note">
        <strong>Catatan:</strong><br>
        Hasil ini merupakan <em>deteksi dini</em> berbasis sistem pakar dan
        <strong>bukan diagnosis medis</strong>.  
        Untuk kepastian dan penanganan lebih lanjut, silakan berkonsultasi
        dengan tenaga kesehatan profesional.
    </div>

    {{-- Signature --}}
    <div class="signature">
        <p>
            Dicetak pada:<br>
            {{ now()->format('d F Y') }}
        </p>
    </div>

</div>
</body>
</html>
