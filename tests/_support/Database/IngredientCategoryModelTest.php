<?php

namespace Tests\Support\Database;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Models\IngredientCategoryModel;

class IngredientCategoryModelTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    protected $migrate = true;
    protected $seed = 'App\Database\Seeds\IngredientCategorySeeder';

    protected function setUp(): void
    { // Gets triggered before executing any test unit function
        parent::setUp();

        // Disable foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=0');

        // Truncate the table before each test
        $this->db->table('ingredient_category')->truncate();

        // Re-enable foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=1');
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // Disable foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=0');

        // Truncate the tables before each test
        $this->db->table('ingredient_category')->truncate();

        // Re-enable foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=1');
    }

    public function testCreateIngredientCategory()
    {
        $model = new IngredientCategoryModel();
        $data = [
            'name' => 'spice',
        ];
        $result = $model->createIngredientCategory($data);
        $this->assertTrue($result>0); // Checks if created user ID is greater than 0

        // Checks if user was successfully created in database
        $this->seeInDatabase('ingredient_category', ['name' => 'spice']);
    }
}