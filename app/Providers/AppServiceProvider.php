<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use App\Models\Kendaraan;
use App\Observers\KendaraanObserver;
use App\Models\Destinasi;
use App\Observers\DestinasiObserver;

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
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        Paginator::defaultView('vendor.pagination.default');
        Kendaraan::observe(KendaraanObserver::class);
        Destinasi::observe(DestinasiObserver::class);
    }
}
