<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;

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
        // Jika kamu ingin menambahkan logic saat Filament sedang diload, bisa tambahkan di sini.
        Filament::serving(function () {
            // Contoh: kustomisasi logo, tema, dll. Jangan daftarkan Login di sini.
        });
    }
}
