<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

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
    public function boot(Request $request)
    {
        $url = $request->url();
        $segments = explode('/', rtrim($url, '/'));
        $lastSegment = end($segments);
        $step = intval($lastSegment);

        view()->share('step', $step);
    }
}
