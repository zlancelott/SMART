<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Criando usuário do SUPER ADMINISTRADOR.');

        factory(App\Models\User::class)->create([
            'id' => 1,
            'name' => 'Super Administrador',
            'email' => 'super@app.com'
        ]);

        DB::table('profile_user')->insert([
            'user_id' => 1,
            'profile_id' => 1
        ]);

        $this->command->info('Criando usuário do ADMINISTRADOR.');

        factory(App\Models\User::class)->create([
            'id' => 2,
            'name' => 'Administrador',
            'email' => 'admin@app.com'
        ]);

        DB::table('profile_user')->insert([
            'user_id' => 2,
            'profile_id' => 2
        ]);

        $this->command->info('Criando usuário do OPERADOR.');

        factory(App\Models\User::class)->create([
            'id' => 3,
            'name' => 'Operador',
            'email' => 'operador@app.com'
        ]);

        DB::table('profile_user')->insert([
            'user_id' => 3,
            'profile_id' => 3
        ]);
    }
}
