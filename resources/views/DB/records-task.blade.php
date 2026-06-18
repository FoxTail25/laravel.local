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
    public function getAllRecord()
    {
        /* Запрос выполнится только тогда, когда таблица РЕАЛЬНО существует
        Иначе придётся комментировать роут, который ссылается на этот код
        */
        if (Schema::hasTable('users')) {

            $allUsers = DB::table('users')->get();
            return $allUsers;
        }
    }
}</pre>
            <table>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                </tr>
                @foreach ($data[0] as $user)
                    <tr>
                        <th>{{ $user->id }}</th>
                        <th>{{ $user->name }}</th>
                        <th>{{ $user->email }}</th>
                    </tr>
                @endforeach
            </table>
        </div>
    @elseif ($id == 2)
        <div>
            <p>
                {{ $text }}
            </p>
            <pre>
                DB::table('users')->select('name', 'email')->get();
            </pre>
            {{-- {{ var_dump($data[0]) }} --}}
            <table>
                <tr>
                    @foreach (array_keys((array) $data[0][0]) as $fieldName)
                        <th>{{ $fieldName }}</th>
                    @endforeach
                </tr>
                @foreach ($data[0] as $user)
                    <tr>
                        <th>{{ $user->name }}</th>
                        <th>{{ $user->email }}</th>
                    </tr>
                @endforeach
            </table>
        </div>
    @endif
    <a href="/DB/records#record">Назад</a>
</x-layout>
