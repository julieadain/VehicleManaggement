<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use mysql_xdevapi\Schema;

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
       /* Blade::directive('hello', function ($expression) {
            return "<?php echo 'Hello ' . {$expression}; ?>";
        });*/

        \Illuminate\Support\Facades\Schema::defaultStringLength(191);
    }
}
