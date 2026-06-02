<!DOCTYPE html>
<html>

<head>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>{{ isset($title) ? $title : 'Laravel' }}</title>

</head>

<body>
    <h3>layout: Общий макет</h3>
    {{ $slot }}
</body>

</html>
