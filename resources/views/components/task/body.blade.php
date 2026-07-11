@props(['tasks'])
<ol>
    @foreach ($tasks as $href => $text)
        <li><a href="{{ $href . '?text=' . $text }}">{{ $text }}</a></li>
    @endforeach
</ol>
