@extends('layouts.app')

@section('title', 'Konsultasi Deteksi Anemia')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden my-10 font-sans">
    
    {{-- Header --}}
    <div class="bg-gradient-to-r from-pink-400 to-rose-500 p-6 text-center">
        <h2 class="text-2xl font-bold text-white tracking-wide">
            Deteksi Dini Anemia
        </h2>
        <p class="text-pink-100 text-sm mt-1">
            Jaga kesehatan Ibu dan Buah Hati
        </p>
    </div>

    {{-- Form --}}
    <form method="POST" action="{{ route('konsultasi.store') }}" class="p-8">
        @csrf

        {{-- Usia Kehamilan --}}
        <div class="mb-8">
            <label class="block text-gray-700 font-semibold mb-2">
                Usia Kehamilan
            </label>

            <div class="relative">
                <input
                    type="number"
                    name="usia_kehamilan"
                    min="1"
                    required
                    class="w-full border-2 border-gray-200 rounded-lg p-3 pl-4 pr-12 text-gray-700
                           focus:outline-none focus:border-pink-400 transition-colors"
                    placeholder="Contoh: 12"
                >
                <span class="absolute right-4 top-3.5 text-gray-400 text-sm font-medium">
                    Minggu
                </span>
            </div>
        </div>

        {{-- Gejala --}}
        <div class="mb-8">
            <strong class="block text-gray-700 font-semibold mb-3">
                Apakah Ibu merasakan gejala berikut?
            </strong>

            <p class="text-xs text-gray-500 mb-4">
                Pilih semua yang sesuai dengan kondisi Anda saat ini.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach ($gejalas as $gejala)
                    <label class="relative cursor-pointer">
                        <input
                            type="checkbox"
                            name="gejala[]"
                            value="{{ $gejala->id }}"
                            class="peer sr-only"
                        >

                        <div
                            class="p-4 rounded-lg border-2 border-gray-100 bg-gray-50
                                   hover:bg-pink-50 transition-all duration-200
                                   peer-checked:border-pink-500
                                   peer-checked:bg-pink-50
                                   peer-checked:shadow-sm
                                   flex items-center"
                        >
                            <div
                                class="w-5 h-5 border-2 border-gray-300 rounded-full mr-3
                                       peer-checked:bg-pink-500
                                       peer-checked:border-pink-500
                                       flex items-center justify-center transition-colors"
                            >
                                <div
                                    class="w-2.5 h-2.5 bg-pink-500 rounded-full
                                           peer-checked:bg-white"
                                ></div>
                            </div>

                            <span class="text-gray-700 font-medium select-none">
                                {{ $gejala->nama_gejala }}
                            </span>
                        </div>
                    </label>
                @endforeach
            </div>
        </div>

        {{-- Submit --}}
        <button
            type="submit"
            class="w-full bg-rose-500 hover:bg-rose-600 text-white font-bold py-4
                   rounded-lg shadow-md hover:shadow-lg
                   transform transition hover:-translate-y-0.5 duration-200"
        >
            Proses Deteksi Sekarang
        </button>
    </form>
</div>
@endsection
