<!DOCTYPE html>
<html lang="RU">

<head>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">

    <title>{{ isset($title) ? $title : 'Laravel' }}</title>
    <style>

    </style>
</head>

<body class="container">
    {{-- Компонет header --}}
    <x-header />
    {{-- <h3>layout: Общий макет</h3> --}}
    <main>
        {{ $slot }}
    </main>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
