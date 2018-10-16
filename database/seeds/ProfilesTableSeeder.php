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
        $this->command->info('Criando perfil de SUPER ADMINISTRADOR.');

        factory(App\Models\Profile::class)->create([
            'id' => 1,
            'name' => 'Super Administrador',
            'initials' => 'super',
            'description' => 'Tem acesso total ao sistema.'
        ]);

        $this->command->info('Criando perfil de ADMINISTRADOR.');

        factory(App\Models\Profile::class)->create([
            'id' => 2,
            'name' => 'Administrador',
            'initials' => 'admin',
            'description' => 'Tem acesso total ao sistema com exceção de algumas telas específicas de gerenciamento que somente o Super Admin possui.'
        ]);

        $this->command->info('Criando perfil de OPERADOR.');

        factory(App\Models\Profile::class)->create([
            'id' => 3,
            'name' => 'Operador',
            'initials' => 'operator',
            'description' => 'Tem acesso somente a algumas telas do sistema.'
        ]);
    }
}
