<x-layout>
    <x-slot:title>
        Создание, изменение, удаление в Eloquent Laravel
    </x-slot:title>

    @if ($id == 1)
        <x-page.tasks.header :text="$text" />
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
    return $totalUsers;

//Blade code:
    теперь в базе &#123;&#123; $data }} записей</pre>
        <h5>
            Результат:
        </h5>
        теперь в базе {{ $data }} записей
        <br />
        <br />
        <a href="{{ route('eloquent-create-update-del') }}#task1">Назад</a>
    @elseif ($id == 2)
        <x-page.tasks.header :text="$text" />
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
        <h5>
            Результат:
        </h5>
        Теперь имя пользователя с id = 1 {{ $data }}
        <br />
        <br />
        <a href="{{ route('eloquent-create-update-del') }}#task2">Назад</a>
    @elseif ($id == 3)
        <x-page.tasks.header :text="$text" />
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
        <h5>
            Результат:
        </h5>
        {{ is_int($data) ? "пользователь с id = $data удалён" : $data }}
        <br />
        <br />
        <a href="{{ route('eloquent-create-update-del') }}#task3">Назад</a>
    @elseif ($id == 4)
        <x-page.tasks.header :text="$text" />
        <pre>
    //Controller code:

    // Получаем ID последнего пользователя.
    // Если пользователей нет, запишется null
    $id = User::latest('id')->first()?->id;

    if ($id) {

        User::destroy($id); // Удалит юзера

        return (int) $id; // вренёт id удалённого юзера
    }
    return 'в таблице users нет пользоателей';

    //Blade code:
    &#123;&#123; is_int($data) ? "пользователь с id = $data удалён" : $data }}

    return $totalUsers;
        </pre>
        <h5>
            Результат:
        </h5>
        {{ is_int($data) ? "пользователь с id = $data удалён" : $data }}
        <br />
        <br />
        <a href="{{ route('eloquent-create-update-del') }}#task4">Назад</a>
    @elseif ($id == 5)
        <x-page.tasks.header :text="$text" />
        <pre>
    //Controller code:

    // Получаем ID последнего пользователя.
    // Если пользователей нет, запишется null
    $id = User::latest('id')->first()?->id;

    // Получаем ID 3 последних пользователей в виде коллекции [5, 4, 3]
    $ids = User::latest('id')->take(3)->pluck('id');

    if ($ids->isNotEmpty()) {
        // Передаем всю коллекцию в destroy()
        User::destroy($ids);

        return $ids; // вренёт id удалённого юзера
    }

    return 'в таблице users нет пользователей';

    //Blade code:
    &#123;&#123; is_string($data) ? $data : "Пользователи с ID = " . $data->implode(', ') . " удалены"  }}

    return $totalUsers;
        </pre>
        <h5>
            Результат:
        </h5>
        {{ is_string($data) ? $data : 'Пользователи с ID = ' . $data->implode(', ') . ' удалены' }}
        <br />
        <br />
        <a href="{{ route('eloquent-create-update-del') }}#task4">Назад</a>
    @endif
</x-layout>
