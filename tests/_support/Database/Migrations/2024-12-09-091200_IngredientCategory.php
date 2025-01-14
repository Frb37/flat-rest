<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class IngredientCategory extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'name' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('ingredient_category');
    }

    public function down()
    {
        $this->forge->dropTable('ingredient_category');
    }
}
