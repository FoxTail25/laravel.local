@props(['href', 'tasks'])
<ol>
    @foreach ($tasks as $id => $dataArr)
        <li>
            <a
                href="{{ route($href, [
                    'id' => $id,
                    'text' => $dataArr['text'],
                ]) }}">
                {{ $dataArr['text'] }}
            </a>
        </li>
    @endforeach
</ol>
