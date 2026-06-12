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
            // переименовываем поля name и surname
            $table->renameColumn('name', 'first-name');
            $table->renameColumn('surname', 'second-name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // переименовываем поля name и surname
            $table->renameColumn('first-name', 'name');
            $table->renameColumn('second-name', 'surname');
        });
    }
};
