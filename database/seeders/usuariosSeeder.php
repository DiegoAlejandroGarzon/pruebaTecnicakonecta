<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class usuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'=>'administrador',
            'email'=>'administrador@admin.com',
            'password'=>Hash::make('12345678'),
        ]);
        $user->assignRole('administrador');
    }
}
