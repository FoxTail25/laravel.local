<!DOCTYPE html>
<html>

<head>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>{{ isset($title) ? $title : 'Laravel' }}</title>

</head>
<nav>
    @php
        $fileDir = __DIR__;
        $publicDir = $_SERVER['DOCUMENT_ROOT'];
        $path = $publicDir . '../../routes/web.php';
        $str = file_get_contents($path);

        $reg = '#(/blade/.*/)(\'\S)#';

        preg_match_all($reg, $str, $res);

    @endphp
    <a href="/">home</a>
    @foreach ($res[1] as $link)
        <a href="{{ $link }}">{{ $loop->iteration }} {{ trim(mb_substr($link, 7), '/') }}</a>
    @endforeach
</nav>

<body>
    {{-- <h3>layout: Общий макет</h3> --}}
    {{ $slot }}
</body>

</html>
