<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'pseudo'        => 'admin',
                'email'         => 'admin@admin.fr',
                'password'      => password_hash('admin', PASSWORD_DEFAULT),
                'role_id' => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'pseudo'      => 'alice',
                'email'         => 'alice@example.com',
                'password'      => password_hash('password123', PASSWORD_DEFAULT),
                'role_id' => 3,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'pseudo'      => 'bob',
                'email'         => 'bob@example.com',
                'password'      => password_hash('password123', PASSWORD_DEFAULT),
                'role_id' => 2,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'pseudo'      => 'charlie',
                'email'         => 'charlie@example.com',
                'password'      => password_hash('password123', PASSWORD_DEFAULT),
                'role_id' => 3,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'pseudo'      => 'dave',
                'email'         => 'dave@example.com',
                'password'      => password_hash('password123', PASSWORD_DEFAULT),
                'role_id' => 3,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'pseudo'      => 'eve',
                'email'         => 'eve@example.com',
                'password'      => password_hash('password123', PASSWORD_DEFAULT),
                'role_id' => 2,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'pseudo'      => 'frank',
                'email'         => 'frank@example.com',
                'password'      => password_hash('password123', PASSWORD_DEFAULT),
                'role_id' => 3,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'pseudo'      => 'grace',
                'email'         => 'grace@example.com',
                'password'      => password_hash('password123', PASSWORD_DEFAULT),
                'role_id' => 2,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'pseudo'      => 'heidi',
                'email'         => 'heidi@example.com',
                'password'      => password_hash('password123', PASSWORD_DEFAULT),
                'role_id' => 2,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'pseudo'      => 'ivan',
                'email'         => 'ivan@example.com',
                'password'      => password_hash('password123', PASSWORD_DEFAULT),
                'role_id' => 3,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'pseudo'      => 'judy',
                'email'         => 'judy@example.com',
                'password'      => password_hash('password123', PASSWORD_DEFAULT),
                'role_id' => 3,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'pseudo'      => 'kate',
                'email'         => 'kate@example.com',
                'password'      => password_hash('password123', PASSWORD_DEFAULT),
                'role_id' => 2,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'pseudo'      => 'leo',
                'email'         => 'leo@example.com',
                'password'      => password_hash('password123', PASSWORD_DEFAULT),
                'role_id' => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'pseudo'      => 'mia',
                'email'         => 'mia@example.com',
                'password'      => password_hash('password123', PASSWORD_DEFAULT),
                'role_id' => 2,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'pseudo'      => 'nina',
                'email'         => 'nina@example.com',
                'password'      => password_hash('password123', PASSWORD_DEFAULT),
                'role_id' => 2,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'pseudo'      => 'oscar',
                'email'         => 'oscar@example.com',
                'password'      => password_hash('password123', PASSWORD_DEFAULT),
                'role_id' => 3,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'pseudo'      => 'pat',
                'email'         => 'pat@example.com',
                'password'      => password_hash('password123', PASSWORD_DEFAULT),
                'role_id' => 3,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'pseudo'      => 'quinn',
                'email'         => 'quinn@example.com',
                'password'      => password_hash('password123', PASSWORD_DEFAULT),
                'role_id' => 2,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'pseudo'      => 'ruth',
                'email'         => 'ruth@example.com',
                'password'      => password_hash('password123', PASSWORD_DEFAULT),
                'role_id' => 3,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'pseudo'      => 'sam',
                'email'         => 'sam@example.com',
                'password'      => password_hash('password123', PASSWORD_DEFAULT),
                'role_id' => 2,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'pseudo'      => 'tina',
                'email'         => 'tina@example.com',
                'password'      => password_hash('password123', PASSWORD_DEFAULT),
                'role_id' => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
        ];
        $this->db->table('user')->insertBatch($data);
    }
}
