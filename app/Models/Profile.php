<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function user_r()
    {
        return $this->belongsTo(
            User_r::class, // 1. Класс связанной модели
            'user_id',     // 2. Внешний ключ в текущей таблице (profiles.user_id)
            'id'           // 3. Первичный ключ в связанной таблице (users_r.id)
        );
    }
}
