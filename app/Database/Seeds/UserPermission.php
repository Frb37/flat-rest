<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserPermission extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'administrateur'],
            ['name' => 'utilisateur'],
            ['name' => 'employé'],
        ];

        $this->db->table('user_permission')->insertBatch($data);
    }
}
