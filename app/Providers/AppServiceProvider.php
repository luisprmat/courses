<?php

namespace App\Providers;

use App\Models\Lesson;
use App\Observers\LessonObserver;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Request;
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
        Lesson::observe(LessonObserver::class);

        Blade::if('routeIs', function($route, $params = []) {
            return Request::url() == route($route, $params);
        });
    }
}
