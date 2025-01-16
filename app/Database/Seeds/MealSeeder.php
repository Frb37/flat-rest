<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MealSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Phazon Hot Curry',
                'category_id' => 2,
                'price' => 690,
            ]
        ];

        $this->db->table('meal')->insertBatch($data);
    }
}
