<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrderRating extends Migration
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
            'customer_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'order_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'value' => [
                'type' => 'FLOAT',
                'constraint' => '11,2',
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('customer_id', 'user', 'id');
        $this->forge->addForeignKey('order_id', 'order', 'id');
        $this->forge->createTable('order_rating');
    }

    public function down()
    {
        $this->forge->dropTable('order_rating');
    }
}
