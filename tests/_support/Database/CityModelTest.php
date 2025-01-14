<?php

namespace Tests\Support\Database;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Models\CityModel;

class CityModelTest extends CIUnitTestCase
{
    protected $migrate = true;
    protected $seed = 'App\Database\Seeds\CityModelTestSeeder';

    protected function setUp(): void
    { // Gets triggered before executing any test unit function
        parent::setUp();
        // Truncate the table before each test
        $this->db->table('city')->truncate();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        // Truncate the tables before each test
        $this->db->table('city')->truncate();
    }

    public function testCreateCity()
    {
        $model = new CityModel();
        $data = [
            'name' => 'Pallet Town',
            'zipcode' => '66666',
        ];
        $result = $model->createCity($data);
        $this->assertTrue($result>0); // Checks if created user ID is greater than 0

        // Checks if user was successfully created in database
        $this->seeInDatabase('city', ['name' => 'Pallet Town']);
    }
}