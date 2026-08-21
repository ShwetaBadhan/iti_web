<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Course;

class ViewServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // Share courses with ALL views (including navigation menu)
        View::composer('*', function ($view) {
            $view->with('menuCourses', Course::where('status', true)->orderBy('name')->get());
        });
    }
}