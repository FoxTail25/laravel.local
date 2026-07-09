<x-layout>
    <x-slot:title>
        Тест пагинации в Laravel
    </x-slot:title>

    <h2>
        Тест пагинации в Laravel
    </h2>
    @foreach ($data as $user)
        <p>{{ $user->name }}</p>
    @endforeach
    {{ $data->links() }}
</x-layout>
