<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        // ******************************* Class 61 **********************************
        // Using Vendor bootstrap pagination by tag (Without linking file).
        // Paginator::useBootstrapFive();

        // Using Vendor bootstrap pagination (With linking file).
        // Paginator::defaultSimpleView('vendor.pagination.simple-bootstrap-5');

        // ******************************* Class 62 (Number Pagination) **********************************

        // Methord 1
        Paginator::useBootstrapFive();

        // Methord 2
        // Paginator::defaultView('vendor.pagination.bootstrap-5');

    }
}
