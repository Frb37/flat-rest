<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserPermission extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'administrateur', 'slug' => 'administrateur'],
            ['name' => 'utilisateur', 'slug' => 'utilisateur'],
            ['name' => 'employé', 'slug' => 'employe'],
        ];

        $this->db->table('user_permission')->insertBatch($data);
    }
}
