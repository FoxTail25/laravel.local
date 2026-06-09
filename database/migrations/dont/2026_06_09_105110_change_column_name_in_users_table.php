<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Изменяем имя солбцов
            $table->renameColumn('name', 'first_name');
            $table->renameColumn('surname', 'second_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Возвращаем первоначальные имена
            $table->renameColumn('first_name', 'name');
            $table->renameColumn('second_name', 'surname');
        });
    }
};
