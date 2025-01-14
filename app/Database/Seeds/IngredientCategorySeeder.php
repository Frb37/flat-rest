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
                'name' => 'staple'
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
                'name' => 'flours'
            ]
        ];
        $this->db->table('ingredient_category')->insertBatch($data);
    }
}
