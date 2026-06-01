<!DOCTYPE html>
<html>

<head>
    <title>{{ isset($title) ? $title : 'Laravel' }}</title>
</head>

<body>
    <h2>Общий макет</h2>

    {{ $slot }}
</body>

</html>
