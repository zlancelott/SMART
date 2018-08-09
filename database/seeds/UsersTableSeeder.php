<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class)->create([
            'name' => 'Super Admin',
            'email' => 'super@app.com',
            'profile' => config('profiles.superadmin')
        ]);

        factory(App\Models\User::class)->create([
            'name' => 'Admin',
            'email' => 'admin@app.com',
            'profile' => config('profiles.admin')
        ]);

        factory(App\Models\User::class)->create([
            'name' => 'Operador',
            'email' => 'operador@app.com',
            'profile' => config('profiles.operator')
        ]);
    }
}
