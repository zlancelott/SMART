<?php

use Illuminate\Database\Seeder;
use App\Models\Page;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::query()->delete();

        $this->command->info('Criando permissões para seção de PÁGINAS.');

        factory(App\Models\Page::class)->create([
            'id' => 1,
            'name' => 'Page index',
            'route' => 'page.index'
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 1,
            'profile_id' => 1, // SUPER ADMIN
            'view' => 1,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
        ]);

        factory(App\Models\Page::class)->create([
            'id' => 2,
            'name' => 'Page create',
            'route' => 'page.create'
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 2,
            'profile_id' => 1, // SUPER ADMIN
            'view' => 0,
            'create' => 1,
            'edit' => 0,
            'delete' => 0,
        ]);

        factory(App\Models\Page::class)->create([
            'id' => 3,
            'name' => 'Page edit',
            'route' => 'page.edit'
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 3,
            'profile_id' => 1, // SUPER ADMIN
            'view' => 0,
            'create' => 0,
            'edit' => 1,
            'delete' => 0,
        ]);

        factory(App\Models\Page::class)->create([
            'id' => 4,
            'name' => 'Page delete',
            'route' => 'page.delete'
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 4,
            'profile_id' => 1, // SUPER ADMIN
            'view' => 0,
            'create' => 0,
            'edit' => 0,
            'delete' => 1,
        ]);

        factory(App\Models\Page::class)->create([
            'id' => 5,
            'name' => 'Page update',
            'route' => 'page.update'
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 5,
            'profile_id' => 1, // SUPER ADMIN
            'view' => 0,
            'create' => 0,
            'edit' => 1,
            'delete' => 0,
        ]);

        factory(App\Models\Page::class)->create([
            'id' => 6,
            'name' => 'Page store',
            'route' => 'page.store'
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 6,
            'profile_id' => 1, // SUPER ADMIN
            'view' => 0,
            'create' => 1,
            'edit' => 0,
            'delete' => 0,
        ]);

        factory(App\Models\Page::class)->create([
            'id' => 7,
            'name' => 'Page destroy',
            'route' => 'page.destroy'
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 7,
            'profile_id' => 1, // SUPER ADMIN
            'view' => 0,
            'create' => 0,
            'edit' => 0,
            'delete' => 1,
        ]);

        // ----------------------------------------------------

        $this->command->info('Criando permissões para seção de USUÁRIOS.');

        factory(App\Models\Page::class)->create([
            'id' => 8,
            'name' => 'User index',
            'route' => 'user.index'
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 8,
            'profile_id' => 1, // SUPER ADMIN
            'view' => 1,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 8,
            'profile_id' => 2, // ADMIN
            'view' => 1,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
        ]);

        factory(App\Models\Page::class)->create([
            'id' => 9,
            'name' => 'User create',
            'route' => 'user.create'
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 9,
            'profile_id' => 1, // SUPER ADMIN
            'view' => 0,
            'create' => 1,
            'edit' => 0,
            'delete' => 0,
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 9,
            'profile_id' => 2, // ADMIN
            'view' => 0,
            'create' => 1,
            'edit' => 0,
            'delete' => 0,
        ]);

        factory(App\Models\Page::class)->create([
            'id' => 10,
            'name' => 'User edit',
            'route' => 'user.edit'
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 10,
            'profile_id' => 1, // SUPER ADMIN
            'view' => 0,
            'create' => 0,
            'edit' => 1,
            'delete' => 0,
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 10,
            'profile_id' => 2, // ADMIN
            'view' => 0,
            'create' => 0,
            'edit' => 1,
            'delete' => 0,
        ]);

        factory(App\Models\Page::class)->create([
            'id' => 11,
            'name' => 'User delete',
            'route' => 'user.delete'
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 11,
            'profile_id' => 1, // SUPER ADMIN
            'view' => 0,
            'create' => 0,
            'edit' => 0,
            'delete' => 1,
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 11,
            'profile_id' => 2, // ADMIN
            'view' => 0,
            'create' => 0,
            'edit' => 0,
            'delete' => 1,
        ]);

        factory(App\Models\Page::class)->create([
            'id' => 12,
            'name' => 'User update',
            'route' => 'user.update'
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 12,
            'profile_id' => 1, // SUPER ADMIN
            'view' => 0,
            'create' => 0,
            'edit' => 1,
            'delete' => 0,
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 12,
            'profile_id' => 2, // ADMIN
            'view' => 0,
            'create' => 0,
            'edit' => 1,
            'delete' => 0,
        ]);

        factory(App\Models\Page::class)->create([
            'id' => 13,
            'name' => 'User store',
            'route' => 'user.store'
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 13,
            'profile_id' => 1, // SUPER ADMIN
            'view' => 0,
            'create' => 1,
            'edit' => 0,
            'delete' => 0,
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 13,
            'profile_id' => 2, // ADMIN
            'view' => 0,
            'create' => 1,
            'edit' => 0,
            'delete' => 0,
        ]);

        factory(App\Models\Page::class)->create([
            'id' => 14,
            'name' => 'User destroy',
            'route' => 'user.destroy'
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 14,
            'profile_id' => 1, // SUPER ADMIN
            'view' => 0,
            'create' => 0,
            'edit' => 0,
            'delete' => 1,
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 14,
            'profile_id' => 2, // ADMIN
            'view' => 0,
            'create' => 0,
            'edit' => 0,
            'delete' => 1,
        ]);

        // ----------------------------------------------------

        $this->command->info('Criando permissões para seção de PERFIS.');

        factory(App\Models\Page::class)->create([
            'id' => 15,
            'name' => 'Profile index',
            'route' => 'profile.index'
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 15,
            'profile_id' => 1, // SUPER ADMIN
            'view' => 1,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
        ]);

        // ----------------------------------------------------

        $this->command->info('Criando permissões para seção de ESTAÇÕES.');

        factory(App\Models\Page::class)->create([
            'id' => 16,
            'name' => 'Station index',
            'route' => 'station.index'
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 16,
            'profile_id' => 1, // SUPER ADMIN
            'view' => 1,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 16,
            'profile_id' => 2, // ADMIN
            'view' => 1,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
        ]);

        factory(App\Models\Page::class)->create([
            'id' => 17,
            'name' => 'Station create',
            'route' => 'station.create'
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 17,
            'profile_id' => 1, // SUPER ADMIN
            'view' => 0,
            'create' => 1,
            'edit' => 0,
            'delete' => 0,
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 17,
            'profile_id' => 2, // ADMIN
            'view' => 0,
            'create' => 1,
            'edit' => 0,
            'delete' => 0,
        ]);

        factory(App\Models\Page::class)->create([
            'id' => 18,
            'name' => 'Station edit',
            'route' => 'station.edit'
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 18,
            'profile_id' => 1, // SUPER ADMIN
            'view' => 0,
            'create' => 0,
            'edit' => 1,
            'delete' => 0,
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 18,
            'profile_id' => 2, // ADMIN
            'view' => 0,
            'create' => 0,
            'edit' => 1,
            'delete' => 0,
        ]);

        factory(App\Models\Page::class)->create([
            'id' => 19,
            'name' => 'Station delete',
            'route' => 'station.delete'
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 19,
            'profile_id' => 1, // SUPER ADMIN
            'view' => 0,
            'create' => 0,
            'edit' => 0,
            'delete' => 1,
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 19,
            'profile_id' => 2, // ADMIN
            'view' => 0,
            'create' => 0,
            'edit' => 0,
            'delete' => 1,
        ]);

        factory(App\Models\Page::class)->create([
            'id' => 20,
            'name' => 'Station update',
            'route' => 'station.update'
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 20,
            'profile_id' => 1, // SUPER ADMIN
            'view' => 0,
            'create' => 0,
            'edit' => 1,
            'delete' => 0,
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 20,
            'profile_id' => 2, // ADMIN
            'view' => 0,
            'create' => 0,
            'edit' => 1,
            'delete' => 0,
        ]);

        factory(App\Models\Page::class)->create([
            'id' => 21,
            'name' => 'Station store',
            'route' => 'station.store'
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 21,
            'profile_id' => 1, // SUPER ADMIN
            'view' => 0,
            'create' => 1,
            'edit' => 0,
            'delete' => 0,
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 21,
            'profile_id' => 2, // ADMIN
            'view' => 0,
            'create' => 1,
            'edit' => 0,
            'delete' => 0,
        ]);

        factory(App\Models\Page::class)->create([
            'id' => 22,
            'name' => 'Station destroy',
            'route' => 'station.destroy'
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 22,
            'profile_id' => 1, // SUPER ADMIN
            'view' => 0,
            'create' => 0,
            'edit' => 0,
            'delete' => 1,
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 22,
            'profile_id' => 2, // ADMIN
            'view' => 0,
            'create' => 0,
            'edit' => 0,
            'delete' => 1,
        ]);

        // ----------------------------------------------------

        $this->command->info('Criando permissões para seção de OPERAÇÃO.');

        factory(App\Models\Page::class)->create([
            'id' => 24,
            'name' => 'Operation index',
            'route' => 'operation.index'
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 24,
            'profile_id' => 1, // SUPER ADMIN
            'view' => 1,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 24,
            'profile_id' => 2, // ADMIN
            'view' => 1,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
        ]);

        DB::table('page_profile')->insert([
            'page_id' => 24,
            'profile_id' => 3, // OPERADOR
            'view' => 1,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
        ]);
    }
}
