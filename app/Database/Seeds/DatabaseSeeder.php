<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('UserSeeder');
        $this->call('UserPermissionSeeder');
        $this->call('CitySeeder');
        $this->call('IngredientCategorySeeder');
        $this->call('IngredientSeeder');
        $this->call('MealCategorySeeder');
        $this->call('MealSeeder');
        $this->call('MealIngredientSeeder');
        $this->call('ProviderSeeder');
    }
}
