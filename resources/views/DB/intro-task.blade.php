<x-layout>
    <x-slot:title>
        в Laravel
    </x-slot:title>

    @if ($id == 1)
        <div>
            <p>
                {{ $text }}
            </p>
            <pre>
&lt;?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB; // подключаем фасад DB

class UserController extends Controller
{
    //
}
            </pre>
        </div>
    @elseif ($id == 2)
    @endif
    <a href="/DB/intro">Назад</a>
</x-layout>
