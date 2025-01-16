<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class IngredientCategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'staple'
            ],
            [
                'name' => 'spice'
            ],
            [
                'name' => 'herb'
            ],
            [
                'name' => 'sugar'
            ],
            [
                'name' => 'snack'
            ],
            [
                'name' => 'flour'
            ]
        ];
        $this->db->table('ingredient_category')->insertBatch($data);
    }
}
