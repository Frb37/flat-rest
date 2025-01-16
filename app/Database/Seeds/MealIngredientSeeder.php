<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MealIngredientSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'ingredient_id' => 1,
                'quantity' => '150 g',
                'meal_id' => 1,
            ]
        ];

        $this->db->table('meal_ingredient')->insertBatch($data);
    }
}
