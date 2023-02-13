<?php

namespace App\Providers;

<<<<<<< HEAD
use Illuminate\Support\ServiceProvider;
=======
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Spatie\LaravelIgnition\Support\Composer\FakeComposer;
>>>>>>> 4a1ed0f2e38ec36cb4ada39582ab2567f36f2ccb

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
<<<<<<< HEAD
        //
=======
        Paginator::useBootstrap();
        
>>>>>>> 4a1ed0f2e38ec36cb4ada39582ab2567f36f2ccb
    }
}
