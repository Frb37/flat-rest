<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MealIngredient extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ingredient_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'meal_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
        ]);

        $this->forge->addForeignKey('meal_id', 'meal', 'id');
        $this->forge->addForeignKey('ingredient_id', 'ingredient', 'id');
        $this->forge->addUniqueKey(['ingredient_id', 'meal_id'], 'meal_ingredient_id');
        $this->forge->createTable('meal_ingredient');
    }

    public function down()
    {
        $this->forge->dropTable('meal_ingredient');
    }
}
