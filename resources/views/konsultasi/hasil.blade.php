@extends('layouts.app')

@section('title', 'Hasil Deteksi Anemia')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden my-10">

    {{-- Header --}}
    <div class="bg-gradient-to-r from-rose-500 to-pink-500 p-6 text-center">
        <h2 class="text-2xl font-bold text-white tracking-wide">
            Hasil Deteksi Anemia
        </h2>
        <p class="text-pink-100 text-sm mt-1">
            Ringkasan hasil konsultasi Anda
        </p>
    </div>

    {{-- Content --}}
    <div class="p-8 space-y-5 text-gray-700">

        <div class="flex justify-between border-b pb-2">
            <span class="font-semibold">Usia Kehamilan</span>
            <span>{{ $konsultasi->usia_kehamilan }} minggu</span>
        </div>

        <div class="flex justify-between border-b pb-2">
            <span class="font-semibold">Trimester</span>
            <span>{{ $konsultasi->trimester }}</span>
        </div>

        <div class="flex justify-between border-b pb-2">
            <span class="font-semibold">Kondisi Terdeteksi</span>
            <span class="font-semibold text-rose-600">
                {{ $konsultasi->kondisi->nama_kondisi }}
            </span>
        </div>

        <div class="flex justify-between border-b pb-2">
            <span class="font-semibold">Nilai Certainty Factor (CF)</span>
            <span class="font-mono">
                {{ number_format($konsultasi->nilai_cf, 2) }}
            </span>
        </div>

        {{-- Saran Awal --}}
        @php
            $trimester = $konsultasi->trimester;

            $saranList = $konsultasi->kondisi->saranAwals
                ->whereIn('trimester', [$trimester, 'Semua']);
        @endphp

        @if ($saranList->count() > 0)
            <div class="mt-6 p-5 rounded-xl bg-emerald-50 border border-emerald-200">
                <h3 class="text-lg font-bold text-emerald-700 mb-3">
                    Saran Awal
                </h3>

                <ul class="space-y-3 text-sm text-emerald-800">
                    @foreach ($saranList as $saran)
                        <li class="flex items-start gap-2">
                            <span class="mt-1 text-emerald-600">•</span>
                            <span>
                                <strong>{{ $saran->fokus }}:</strong>
                                {{ $saran->deskripsi_saran }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Gejala yang Dipilih --}}
@if ($konsultasi->gejalas && $konsultasi->gejalas->count() > 0)
    <div class="mt-6 p-5 rounded-xl bg-slate-50 border border-slate-200">
        <h3 class="text-lg font-bold text-slate-700 mb-3">
            Gejala yang Dipilih
        </h3>

        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-2 text-sm text-slate-700">
            @foreach ($konsultasi->gejalas as $gejala)
                <li class="flex items-start gap-2">
                    <span class="text-rose-500 mt-1">•</span>
                    <span>{{ $gejala->nama_gejala }}</span>
                </li>
            @endforeach
        </ul>
    </div>
@endif


        {{-- Disclaimer --}}
        <div class="mt-6 p-4 rounded-lg bg-yellow-50 border border-yellow-200 text-sm text-yellow-700">
            <strong>Catatan:</strong>
            Hasil ini merupakan <em>deteksi dini</em> berbasis sistem pakar dan
            <strong>bukan diagnosis medis</strong>.
            Untuk kepastian, silakan konsultasi dengan tenaga kesehatan.
        </div>

        {{-- Action --}}
<div class="pt-6 flex justify-center gap-4">
    <a href="{{ route('konsultasi.index') }}"
       class="inline-block bg-gray-100 hover:bg-gray-200 text-gray-700
              font-semibold px-6 py-3 rounded-lg transition">
        Kembali ke Form Deteksi
    </a>

    {{-- Tombol Export PDF --}}
    <a href="{{ route('konsultasi.export.pdf', $konsultasi->id) }}"
       class="inline-block bg-red-600 hover:bg-red-700 text-white
              font-semibold px-6 py-3 rounded-lg transition">
        Export PDF
    </a>
</div>

    </div>
</div>
@endsection
