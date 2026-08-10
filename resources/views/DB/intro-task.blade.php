<x-layout>
    <x-slot:title>
        Query builder в Laravel
    </x-slot:title>

    @if ($id == 1)
        <x-page.tasks.header :text="$text" />
        <pre>
&lt;?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB; // подключаем фасад DB

class UserController extends Controller
{
    //
}
            </pre>
    @elseif ($id == 2)
    @endif
    <br />
    <br />
    <a href="{{ route('qb-intro') }}#qb-intro_task">Назад к задачам</a>
</x-layout>
