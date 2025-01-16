<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProviderSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Delis',
                'city_id' => 1,
            ],
        ];

        $this->db->table('provider')->insertBatch($data);
    }
}
