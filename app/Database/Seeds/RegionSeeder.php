<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RegionSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Kanto'
            ],
            [
                'name' => 'Johto'
            ],
            [
                'name' => 'Hoenn'
            ],
            [
                'name' => 'Sinnoh'
            ],
            [
                'name' => 'Unova'
            ]
        ];
        $this->db->table('region')->insertBatch($data);
    }
}