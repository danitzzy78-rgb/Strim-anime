<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['id' => 1, 'name' => 'admin',  'created_at' => date('Y-m-d H:i:s')],
            ['id' => 2, 'name' => 'editor', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 3, 'name' => 'user',   'created_at' => date('Y-m-d H:i:s')],
        ];

        // insertBatch dipakai supaya id konsisten (1=admin, 2=editor, 3=user)
        $this->db->table('roles')->insertBatch($data);
    }
}
