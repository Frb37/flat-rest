<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MealCategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'starter'
            ],
            [
                'name' => 'main'
            ],
            [
                'name' => 'dessert'
            ],
            [
                'name' => 'sandwich'
            ],
            [
                'name' => 'snack'
            ],
            [
                'name' => 'drink'
            ]
        ];
        $this->db->table('meal_category')->insertBatch($data);
    }
}
