<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Order extends Migration
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
           'employee_id' => [
               'type' => 'INT',
               'constraint' => 11,
               'unsigned' => true,
           ],
           'meal_id' => [
               'type' => 'INT',
               'constraint' => 11,
               'unsigned' => true,
           ],
           'meal_quantity' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
           ],
           'received_at' => [
               'type' => 'DATETIME',
           ],
           'delivered_at' => [
                'type' => 'DATETIME',
           ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('customer_id', 'user', 'id');
        $this->forge->addForeignKey('employee_id', 'user', 'id');
        $this->forge->addForeignKey('meal_id', 'meal', 'id');

        $this->forge->createTable('order');
    }

    public function down()
    {
        $this->forge->dropTable('order');
    }
}
