<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'pseudo' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'mail' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'delivery_address' => [
                'type' => 'TEXT',
            ],
            'delivery_city_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'billing_address' => [
                'type' => 'TEXT',
            ],
            'billing_city_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'role_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('delivery_city_id', 'city', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('billing_city_id', 'city', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('role_id', 'role', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('User');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
