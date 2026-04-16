<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Antrian;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create([
            'name'  => 'admin',
            'guard_name' => 'web'
        ]);
        $pasienRole = Role::create([
            'name'  => 'pasien',
            'guard_name' => 'web'
        ]);

        $admin = User::create([
            'name'      => 'Admin',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('1234')
        ]);
        $admin->assignRole($adminRole);

        $pasien = User::create([
            'name'      => 'Pasien',
            'email'     => 'pasien@gmail.com',
            'password'  => bcrypt('1234')
        ]);
        $pasien->assignRole($pasienRole);
    }
}
