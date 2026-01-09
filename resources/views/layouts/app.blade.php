<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Pakar Deteksi Anemia')</title>

    {{-- Tailwind CSS via Vite --}}
    @vite('resources/css/app.css')
</head>
<body>

    {{-- Container utama --}}
    <main>
        @yield('content')
    </main>
<script src="https://cdn.tailwindcss.com"></script>
</body>
</html>
