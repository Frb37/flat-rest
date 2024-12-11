<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        $data = [
            ['first_name' => 'admin', 'last_name' => 'admin', 'pseudo' => 'admin', 'password' => password_hash('admin', PASSWORD_DEFAULT), 'mail' => 'admin@admin.fr'],
        ];

        $this->db->table('user')->insertBatch($data);
    }
}
