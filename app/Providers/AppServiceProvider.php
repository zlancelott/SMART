<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {

            $event->menu->add('MENU PRINCIPAL');

            foreach (Auth::user()->getMenu() as $menu) {
                $event->menu->add([
                    'text' => ucfirst(explode('.', $menu)[0]),
                    'route'  => $menu
                ]);
            }

            $event->menu->add('PERFIL');

            $event->menu->add([
                'text' => 'Meu perfil',
                'url'  => '/my-profile',
                'icon' => 'user',
            ]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
