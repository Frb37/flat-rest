<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class IngredientSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Phazon Rice',
                'quantity' => 30,
                'category_id' => 1,
                'provider_id' => 1,
            ]
        ];
        $this->db->table('ingredient')->insertBatch($data);
    }
}
