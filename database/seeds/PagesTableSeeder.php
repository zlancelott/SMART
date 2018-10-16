<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
