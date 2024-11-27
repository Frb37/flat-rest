<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Meal extends Migration
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
           'name' => [
               'type' => 'VARCHAR',
               'constraint' => 255,
           ],
           'category_id' => [
               'type' => 'INT',
               'constraint' => 11,
               'unsigned' => true,
           ],
           'price' => [
               'type' => 'FLOAT',
               'constraint' => '11,2',
           ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('category_id', 'meal_category', 'id');
        $this->forge->createTable('meal');
    }

    public function down()
    {
        $this->forge->dropTable('meal');
    }
}
