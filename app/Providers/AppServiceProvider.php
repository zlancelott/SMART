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
            
            $event->menu->add([
                'text' => 'Operação',
                'url'  => '/operation',
                'icon' => 'home',
            ]);

            if (Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()) {

                $event->menu->add([
                    'text' => 'Usuários',
                    'url'  => '/user',
                    'icon' => 'users',
                ]);

                $event->menu->add([
                    'text' => 'Estações',
                    'url'  => '/station',
                    'icon' => 'bolt',
                ]);

                $event->menu->add([
                    'text' => 'Perfis',
                    'url'  => '/profile',
                    'icon' => 'male',
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
