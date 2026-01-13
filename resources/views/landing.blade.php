@extends('layouts.app')

@section('title', 'Sistem Pakar Deteksi Anemia Ibu Hamil')

@section('content')
<div class="min-h-screen flex flex-col justify-center items-center
            bg-gradient-to-b from-rose-50 to-white px-4 text-center">

    {{-- Logo / Ilustrasi --}}
    <div class="mb-6">
        <img src="{{ asset('images/sipanem_logo.png') }}"
             alt="Ibu Hamil"
             class="mx-auto w-60">
    </div>

    {{-- Judul --}}
    <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">
        SISTEM PAKAR DETEKSI DINI<br>
        ANEMIA PADA IBU HAMIL
    </h1>

    {{-- Deskripsi --}}
    <p class="max-w-xl text-gray-600 mb-8">
        Dukung kesehatan ibu dan janin dengan deteksi dini anemia.
         Lindungi masa depan buah hati Anda.
    </p>

    {{-- Tombol Aksi --}}
    <div class="flex flex-col gap-4 w-full max-w-xs">

        {{-- User --}}
        <a href="{{ url('/konsultasi') }}"
           class="bg-rose-500 hover:bg-rose-600 text-white
                  font-semibold py-3 rounded-full shadow-lg transition">
            Mulai Deteksi
        </a>

        {{-- Admin --}}
        <a href="{{ url('/admin/login') }}"
           class="bg-rose-100 hover:bg-rose-200 text-rose-700
                  font-semibold py-3 rounded-full transition">
            Login Admin
        </a>

    </div>
<div class="mt-10 text-sm text-gray-400">
    Made by <span class="font-semibold text-gray-500">
        Brinarya Nino Sudhipurwa
    </span>
</div>
</div>
@endsection
