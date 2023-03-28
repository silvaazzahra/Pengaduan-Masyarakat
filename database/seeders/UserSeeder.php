<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'nik' => '12345678',
                'fullname' => 'admin',
                'username' => 'adminn123',
                'email' => 'admin@mail.com',
                'nohp'=> '12345',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ],
            [
                'nik' => '0012345678',
                'fullname' => 'masyarakat',
                'username' => 'masyarakat',
                'email' => 'masyarakat@mail.com',
                'nohp'=> '0812345678',
                'password' => Hash::make('password'),
                'role' => 'masyarakat',
            ],
        ];

        User::insert($users);
    }
}
