<?php

namespace Tests\Support\Database;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Models\RegionModel;

class RegionModelTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    protected $migrate = true;
    protected $seed = 'App\Database\Seeds\RegionSeeder';

    protected function setUp(): void
    { // Gets triggered before executing any test unit function
        parent::setUp();
        // Truncate the table before each test
        $this->db->table('region')->truncate();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        // Truncate the tables before each test
        $this->db->table('region')->truncate();
    }

    public function testCreateRegion()
    {
        $model = new RegionModel();
        $data = [
            'name' => 'Phaaze',
        ];
        $result = $model->createRegion($data);
        $this->assertTrue($result>0); // Checks if created user ID is greater than 0

        // Checks if user was successfully created in database
        $this->seeInDatabase('region', ['name' => 'Phaaze']);
    }
}