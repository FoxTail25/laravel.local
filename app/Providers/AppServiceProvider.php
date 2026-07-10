<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// 1. ОБЯЗАТЕЛЬНО ИМПОРТИРУЕМ КЛАСС ПАГИНАТОРА ВВЕРХУ ФАЙЛА:
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 2. ДОБАВЛЯЕМ ЭТУ СТРОЧКУ ВНУТРЬ МЕТОДА boot():
        Paginator::useBootstrapFive();
    }
}
