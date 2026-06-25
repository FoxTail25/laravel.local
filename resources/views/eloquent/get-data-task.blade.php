<x-layout>
    <x-slot:title>
        Получение данных в Eloquent Laravel
    </x-slot:title>

    @if ($id == 1)
        <p>
            {{ $text }}
        </p>
        <pre>
            //Controller code:
            $data = User::all()

            //Blade code:

        </pre>
        @php
            $field = $data->first()->keys();
        @endphp
        <table>

            @foreach ($fields as $field)
                <tr>
                    <th>
                        {{ $field }}
                    </th>
                </tr>
            @endforeach
        </table>
    @endif

</x-layout>
