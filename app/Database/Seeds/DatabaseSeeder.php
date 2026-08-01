<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Urutan penting: roles harus ada dulu sebelum users (foreign key)
        $this->call('App\Database\Seeds\RoleSeeder');
        $this->call('App\Database\Seeds\UserSeeder');
    }
}
