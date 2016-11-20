<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Categories;
use App\Category;
use Session;
class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        \Carbon\Carbon::setLocale('es');
    }
}
