@props(['tasks'])
<ol>
    @foreach ($tasks as $href => $text)
        <li><a href="{{ $href . '?text=' . $text }}">{{ $text }}</a></li>
        {{-- @php preg_match('/(\d+)$/u', $href, $matches) @endphp --}}
        {{-- <li><a href="{{ route('components-task', ['id' => $matches[1], 'text' => $text]) }}">{{ $text }}</a></li> --}}
    @endforeach
</ol>
