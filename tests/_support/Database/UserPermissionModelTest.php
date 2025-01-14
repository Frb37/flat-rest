<?php

namespace Tests\Support\Database;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Models\UserPermissionModel;
class UserPermissionModelTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    protected $migrate = true;
    protected $seed = 'App\Database\Seeds\UserPermissionSeeder';

    protected function setUp(): void
    { // Gets triggered before executing any test unit function
        parent::setUp();

        // Disable foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=0');

        // Truncate the table before each test
        $this->db->table('user_permission')->truncate();

        // Re-enable foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=1');
    }

    protected function tearDown(): void
    {
        // Disable foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=0');

        parent::tearDown();
        // Truncate the tables before each test
        $this->db->table('user_permission')->truncate();

        // Re-enable foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=1');
    }

    public function testCreateUserPermission()
    {
        $model = new UserPermissionModel();
        $data = [
            'name' => 'souverain',
        ];
        $result = $model->createPermission($data);
        $this->assertTrue($result>0); // Checks if created user ID is greater than 0

        // Checks if user was successfully created in database
        $this->seeInDatabase('user_permission', ['name' => 'souverain']);
    }
}