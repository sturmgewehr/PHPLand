<?php

namespace App\Providers;

use App\Models\BlogCategory;
use App\Observers\BlogCategoryObserver;
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
        BlogCategory::observe(BlogCategoryObserver::class);
    }
}
