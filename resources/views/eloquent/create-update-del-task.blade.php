<x-layout>
    <x-slot:title>
        Создание, изменение, удаление в Eloquent Laravel
    </x-slot:title>

    @if ($id == 1)
        <p>
            {{ $text }}
        </p>
        <pre>
    //Controller code:

    // узнаём сколько записей в базе данных
    $totalUsers = User::count();
    $newUserCount = $totalUsers + 1;

    // создаём нового пользователя
    $user = new User;

    // прописываем его данные
    $user->name = "UserName$newUserCount";
    $user->email = "UserName$newUserCount@gmail.com";
    $user->age = mt_rand(20, 50);
    $user->salary = mt_rand(3000, 5000);
    $user->city = mt_rand(1, 4);

    // сохраняем нового пользователя в базу
    $user->save();

    //Blade code:
    теперь в базе &#123;&#123; $data }} записей

    return $totalUsers;
        </pre>
        теперь в базе {{ $data }} записей
        <br />
        <a href="/eloquent/create-update-del/">Назад</a>
    @elseif ($id == 2)
        <p>
            {{ $text }}
        </p>
        <pre>
    //Controller code:

    $user = User::find(1);
    if ($user) {

        // переписываем его данные
        $newName = strrev($user->name);
        $user->name = $newName;

        // сохраняем нового пользователя в базу
        $user->save();

        return $newName;
    } else {
        return 'пользователя с id = 1 нет в базе';
    }

    //Blade code:
    Теперь имя пользователя с id = 1: &#123;&#123; $data }}

    return $totalUsers;
        </pre>
        Теперь имя пользователя с id = 1 {{ $data }}
        <br />
        <a href="/eloquent/create-update-del#task2/">Назад</a>
    @elseif ($id == 3)
        <p>
            {{ $text }}
        </p>
        <pre>
    //Controller code:

    // получаем пользователя с максимальным id
    $user = User::latest('id')->first();

    if ($user) {
        $id = $user->id;
        $user->delete(); // Удалит юзера
        return (int)$id; // вренёт id удалённого юзера
    }
    return 'в таблице users нет пользоателей';

    //Blade code:
    &#123;&#123; is_int($data) ? "пользователь с id = $data удалён" : $data }}

    return $totalUsers;
        </pre>
        {{ is_int($data) ? "пользователь с id = $data удалён" : $data }}
        <br />
        <a href="/eloquent/create-update-del#task2/">Назад</a>
    @endif
</x-layout>
