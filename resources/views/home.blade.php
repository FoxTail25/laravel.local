<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>
    <h4>
        Изучение фреймворка Laravel
    </h4>
    <h5>
        По учебнику
        <a href="https://code.mu/ru/php/framework/laravel/book/prime/" target="_blank">
            code.mu
        </a>
        Дмитрия Трепачёва. И обучающему курсу
        <a href="https://laravel.com/learn/getting-started-with-laravel/setting-up-your-laravel-project" target="_blank">
            Lavarel Bootcamp
        </a>
    </h5>
    @php
        $fileDir = __DIR__;
        $publicDir = $_SERVER['DOCUMENT_ROOT'];
        $path = $publicDir . '../../routes/web.php';
        $str = file_get_contents($path);

        $reg = '#(/blade/.*/\')#';

        preg_match_all($reg, $str, $res);
        // var_dump($res[0]);
        foreach ($res[0] as $link) {
            echo "<a href='$link'>$link</a><br/>";
        }
        // dump($str);
    @endphp
    {{-- @foreach ($res[0] as $link)
        <a href="{{ $link }}">{{ $link }}</a>
        <br />
    @endforeach --}}
</x-layout>
