<?php

namespace App\Providers;

use App\Reservation;
use Illuminate\Support\Facades\Blade;
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
        \Illuminate\Support\Facades\Schema::defaultStringLength(191);

        Blade::directive('Super_admin', function () {
            return '<?php if(auth()->user()->role == 1) { ?>';
        });

        Blade::directive('endSuper_admin', function () {
            return '<?php } ?>';
        });

        Blade::directive('admin', function () {
        return '<?php if(auth()->user()->role == 2) { ?>';
        });

        Blade::directive('endadmin', function () {
            return '<?php } ?>';
        });
        Blade::directive('countCurrentReservation', function () {
           $res = Reservation::where('status', '1');
            return $res->count();
        });
        Blade::directive('countPendingReservation', function () {
            $res = Reservation::where('status', '0');
            return $res->count();
        });

    }
}
