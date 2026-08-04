<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// 1. ОБЯЗАТЕЛЬНО ИМПОРТИРУЕМ КЛАСС ПАГИНАТОРА ВВЕРХУ ФАЙЛА:
use Illuminate\Pagination\Paginator;
use Route;

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
        Route::pattern('testslug', '[a-z0-9_-]+');
        // 2. ДОБАВЛЯЕМ ЭТУ СТРОЧКУ ВНУТРЬ МЕТОДА boot():
        Paginator::useBootstrapFive();
    }
}
