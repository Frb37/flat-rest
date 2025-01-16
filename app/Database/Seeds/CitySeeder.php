<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CitySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Prime City',
                'zipcode' => 6743,
                'region_id' => 13,
            ],
            [
                'name' => 'Red Sierra City',
                'zipcode' => 6815,
                'region_id' => 13,
            ],
            [
                'name' => 'Creambeach City',
                'zipcode' => 6413,
                'region_id' => 13,
            ],
            [
                'name' => 'Gleamleaf City',
                'zipcode' => 6020,
                'region_id' => 13,
            ],
            [
                'name' => 'Water Ring City',
                'zipcode' => 6915,
                'region_id' => 13,
            ],
            [
                'name' => 'Blue City',
                'zipcode' => 6697,
                'region_id' => 13,
            ],
            [
                'name' => 'Termini Town',
                'zipcode' => 7013,
                'region_id' => 13,
            ]
        ];
        $this->db->table('city')->insertBatch($data);
    }
}
