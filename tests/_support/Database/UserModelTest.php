<?php

namespace Tests\Support\Database;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Models\UserModel;
class UserModelTest extends CIUnitTestCase
{
    use DatabaseTestTrait;
    protected $migrate = true;
    protected $seed = 'App\Database\Seeds\UserSeeder';

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
        // Disable foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=0');

        parent::tearDown();
        // Truncate the tables before each test
        $this->db->table('user')->truncate();

        // Re-enable foreign key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=1');
    }

    public function testCreateUser()
    {
        $model = new UserModel();
        $data = [
            'username' => 'foo',
            'email' => 'foo@bar.com',
            'password' => password_hash('password123', PASSWORD_DEFAULT),
            'first_name' => 'foo',
            'last_name' => 'bar',
            'permission_id' => 3,
        ];
        $result = $model->createUser($data);
        $this->assertTrue($result>0); // Checks if created user ID is greater than 0

        // Checks if user was successfully created in database
        $this->seeInDatabase('user', ['username' => 'foo']);
    }
}