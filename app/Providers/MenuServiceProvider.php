<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $authVerticalMenuJson = file_get_contents(base_path('resources/menu/authVerticalMenu.json'));
        $authVerticalMenuData = json_decode($authVerticalMenuJson);

        $guestVerticalMenuJson = file_get_contents(base_path('resources/menu/guestVerticalMenu.json'));
        $guestVerticalMenuData = json_decode($guestVerticalMenuJson);

        // Share all menuData to all the views
        \View::share('menuData', [$authVerticalMenuData, $guestVerticalMenuData]);
    }
}
