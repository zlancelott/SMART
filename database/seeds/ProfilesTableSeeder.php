<?php

use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Profile::class)->create([
            'name' => 'Super Admin',
            'initials' => 'super',
            'description' => 'Tem acesso total ao sistema.'
        ]);

        factory(App\Models\Profile::class)->create([
            'name' => 'Admin',
            'initials' => 'admin',
            'description' => 'Tem acesso total ao sistema com exceção de algumas telas específicas de gerenciamento que somente o Super Admin possui.'
        ]);

        factory(App\Models\Profile::class)->create([
            'name' => 'Operador',
            'initials' => 'operator',
            'description' => 'Tem acesso somente a algumas telas do sistema.'
        ]);
    }
}
