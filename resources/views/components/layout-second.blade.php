<!DOCTYPE html>
<html lang="RU">

<head>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <x-meta />
    <title>{{ isset($title) ? $title : 'Laravel' }}</title>
</head>

<body class="d-flex flex-column vh-100 overflow-hidden">
    {{-- Компонет header --}}
    <x-header />
    {{-- layout: content --}}
    <main id="contentZone" class="flex-grow-1 overflow-auto">
        <div class="container">
            {{ $slot }}
        </div>
    </main>
    {{-- Компонет footer --}}
    {{-- <x-footer /> --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/shadowInHeaderMenu.js') }}"></script>
</body>

</html>
