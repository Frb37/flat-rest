<?php

namespace Tests\Support\Database;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Models\MealCategoryModel;

class MealCategoryModelTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected $migrate = true;
    protected $seed = 'App\Database\Seeds\MealCategorySeeder';

    protected function setUp(): void
    { // Gets triggered before executing any test unit function
        parent::setUp();
        // Truncate the table before each test
        $this->db->table('meal_category')->truncate();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        // Truncate the tables before each test
        $this->db->table('meal_category')->truncate();
    }

    public function testCreateIngredientCategory()
    {
        $model = new MealCategoryModel();
        $data = [
            'name' => 'snack',
        ];
        $result = $model->createMealCategory($data);
        $this->assertTrue($result>0); // Checks if created user ID is greater than 0

        // Checks if user was successfully created in database
        $this->seeInDatabase('meal_category', ['name' => 'snack']);
    }
}