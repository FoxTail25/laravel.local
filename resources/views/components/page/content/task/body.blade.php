@props(['href', 'tasks'])
<ol>
    @foreach ($tasks as $id => $dataArr)
        <li>
            <a
                href="{{ route($href, [
                    'id' => $id,
                    'text' => strip_tags($dataArr['text']),
                ]) }}">
                {!! $dataArr['text'] !!}
            </a>
        </li>
    @endforeach
</ol>
