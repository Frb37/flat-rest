<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MealIngredient extends Migration
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
            'ingredient_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'quantity' => [
                'type' => 'TEXT'
            ],
            'meal_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('ingredient_id', 'ingredient', 'id');
        $this->forge->addForeignKey('meal_id', 'meal', 'id');
        $this->forge->createTable('meal_ingredient');
    }

    public function down()
    {
        $this->forge->dropTable('meal_ingredient');
    }
}
