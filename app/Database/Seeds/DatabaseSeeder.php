<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('UserSeeder');
        $this->call('RegionSeeder');
        $this->call('CitySeeder');
        $this->call('ProviderSeeder');
        $this->call('IngredientCategorySeeder');
        $this->call('MealCategorySeeder');
        $this->call('MealSeeder');
        $this->call('IngredientSeeder');
        $this->call('MealIngredientSeeder');
    }
}
