<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

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
        Paginator::useBootstrapFive();
        Validator::extend('telefone', '\App\Utils\TelefoneValidation@validate', 'Celular inválido');
        Validator::extend('time', '\App\Utils\TimeValidation@validate', 'Hora inválida');
        Schema::disableForeignKeyConstraints();
        $locale = Session::get('locale', config('app.fallback_locale'));
        App::setLocale($locale);
    }
}
