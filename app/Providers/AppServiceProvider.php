<?php

namespace App\Providers;

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
        view()->share('new_menu', AppServiceProvider::makeMenu(\App\Models\Menu::all()));
    }

    private function makeMenu($menu) {
        $new_menu = [];


        for ($i=0; $i < sizeof($menu); $i++) {
            if (!$i) {
                $new_menu[$i] = ['category' => $menu[$i]['category'], 'title' => [$menu[$i]['title']]];
            } else {
                $status = 0;
                for ($b=0; $b < sizeof($new_menu); $b++) {
                    if ($new_menu[$b]['category'] == $menu[$i]['category']) {
                        $new_menu[$b]['title'][sizeof($new_menu[$b]['title'])] = $menu[$i]['title'];
                        $status = 1;
                        break;
                    }
                }
                if (!$status) {
                    $new_menu[sizeof($new_menu)] = ['category' => $menu[$i]['category'], 'title' => [$menu[$i]['title']]];
                }
            }

        }

        return $new_menu;
    }
}
// 3
