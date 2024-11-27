<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StockMove extends Migration
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
            'move' => [
                'type' => 'VARCHAR',
                'null' => true,
            ],
            'stock' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'type' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'entity_id' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('type', 'stock_move_type', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('stock_move');
    }

    public function down()
    {
        $this->forge->dropTable('stock_move');
    }
}
