<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ingredient extends Migration
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
                'constraint'        => 255,
            ],
            'quantity' => [
                'type'              => 'INT',
                'constraint'        => 11,
            ],
            'category_id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
            ],
            'provider_id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('category_id', 'ingredient_category', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('provider_id', 'provider', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('ingredient');
    }

    public function down()
    {
        $this->forge->dropTable('ingredient');
    }
}
