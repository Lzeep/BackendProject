<?php

namespace App\Providers;

use App\Company;
use App\Financial;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        $financial = Financial::where('company_id', 1)->get();
        View::share('company', $financial);
    }
}
