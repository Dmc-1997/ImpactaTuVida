<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Iohan',
            'email' => 'soporte@impactatuvida.co',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
            'email_verified_at' => date("Y-m-d H:i:s"),
        ]);
        User::create([
            'name' => 'Jef',
            'email' => 'admin@impactatuvida.co',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
            'email_verified_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
