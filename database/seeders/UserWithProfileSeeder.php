<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User_r;
use Illuminate\Database\Seeder;

class UserWithProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {

            // 1. Создаем и сохраняем пользователя
            $user = new User_r;
            $user->login = 'moderator'.$i;
            $user->password = bcrypt('password321'.$i);
            $user->save(); // После этого у объекта $user появляется свойство id

            // 2. Создаем профиль вручную
            $profile = new Profile;
            $profile->name = 'name'.$i;
            $profile->surname = 'surname'.$i;
            $profile->email = 'name'.$i.'@example.com';

            // Руками связываем таблицы по ID созданного юзера
            $profile->user_id = $user->id;

            $profile->save();
        }
    }
}
