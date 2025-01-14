<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class IngredientCategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'spice'
            ],
            [
                'name' => 'topping'
            ],
            [
                'name' => 'appetizer'
            ],
            [
                'name' => 'main'
            ],
            [
                'name' => 'snack'
            ],
            [
                'name' => 'cold_drink'
            ]
        ];
        $this->db->table('ingredient_category')->insertBatch($data);
    }
}
