<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentColor;
use Illuminate\Support\Facades\Blade;
use Livewire\Livewire;
use App\Livewire\Client\SearchBar;
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
        Livewire::component('client.search-bar', SearchBar::class);
        FilamentColor::register([
            'danger' => Color::Red,
            'gray' => Color::Zinc,
            'info' => Color::Blue,
            'primary' => Color::Green,
            'success' => Color::Green,
            'warning' => Color::Amber,
        ]);

        Blade::component('footer', \App\View\Components\Footer::class);
    }
}
