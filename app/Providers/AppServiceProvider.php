<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

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
        View::composer('*', function ($view) {
            $view->with('user', Auth::user());
        });
        View::composer('frontend.master.website', function ($view) {
            $view->with('categories', Category::where('status', 1)->orderBy('name')->get());
        });
        View::composer('frontend.master.other', function ($view) {
            $view->with('categories', Category::where('status', 1)->orderBy('name')->get());
        });
    }
}
