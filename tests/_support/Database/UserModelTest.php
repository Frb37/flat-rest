<?php

namespace Tests\Support\Database;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Models\UserModel;

class UserModelTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    protected $migrate = true;
    protected $seed = 'App\Database\Seeds\DatabaseSeeder';

    protected function setUp(): void
    { // Gets triggered before executing any test unit function
        parent::setUp();
        // Disable foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=0');

        // Truncate the table before each test
        $this->db->table('user')->truncate();

        // Re-enable foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=1');
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // Disable foreign key checks
        $this->db->query('SET_FOREIGN_KEY_CHECKS=0');

        // Truncate the tables before each test
        $this->db->table('user')->truncate();

        // Re-enable foreign key checks
        $this->db->query('SET_FOREIGN_KEY_CHECKS=0');
    }

    public function testCreateUser()
    {
        $model = new UserModel();
        $data = [
            'pseudo' => 'frb37',
            'email' => 'florianrobert@faibidon.fr',
            'password' => 'azerty123',
            'role_id' => 3,
        ];
        $result = $model->createUser($data);
        $this->assertTrue($result>0); // Checks if created user ID is greater than 0

        // Checks if user was successfully created in database
        $this->seeInDatabase('user', ['email' => 'florianrobert@faibidon.com']);
    }
}