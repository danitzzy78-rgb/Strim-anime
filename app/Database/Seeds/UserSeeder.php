<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'role_id'   => 1, // admin
            'name'      => 'Administrator',
            'email'     => 'admin@anime-stream.test',
            'password'  => password_hash('admin123', PASSWORD_DEFAULT), // GANTI setelah seeding pertama!
            'is_active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $this->db->table('users')->insert($data);
    }
}
