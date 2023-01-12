<?php

namespace Database\Seeders\Akun;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            "id_users" => "20230112",
            "nama" => "Administrator",
            "email" => "admin@gmail.com",
            "password" => bcrypt("password")
        ]);
    }
}
