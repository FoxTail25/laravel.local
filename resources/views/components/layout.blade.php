<!DOCTYPE html>
<html>

<head>
    <title>{{ isset($title) ? $title : 'Laravel' }}</title>
</head>

<body>
    <h3>layout: Общий макет</h3>

    {{ $slot }}
</body>

</html>
