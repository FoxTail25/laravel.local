<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_r extends Model
{
    // Принудительно связываем модель с вашей конкретной таблицей
    protected $table = 'users_r';

    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id');
    }
}
