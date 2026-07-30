<ul>
    @foreach ($posts as $post)
        <li>
            <a href="/education-task/post/{{ $post->id }}">
                {{ $post->title }}
            </a>
        </li>
    @endforeach
</ul>
