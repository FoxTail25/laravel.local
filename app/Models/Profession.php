<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    public function employees(){
        return $this->belongsToMany(Employee::class);
    }
}
