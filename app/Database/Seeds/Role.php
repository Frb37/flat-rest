<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Role extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'administrateur'],
            ['name' => 'utilisateur'],
            ['name' => 'employé'],
        ];

        $this->db->table('role')->insertBatch($data);
    }
}
