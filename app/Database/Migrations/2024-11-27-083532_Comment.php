<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Comment extends Migration
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
           'user_id' => [
               'type' => 'INT',
               'constraint' => 11,
               'unsigned' => true,
           ],
           'order_id' => [
               'type' => 'INT',
               'constraint' => 11,
               'unsigned' => true,
           ],
           'content' => [
               'type' => 'TEXT',
           ],
           'parent_id' => [
               'type' => 'INT',
               'constraint' => 11,
               'unsigned' => true,
           ],
           'created_at' => [
               'type' => 'DATETIME',
           ],
           'updated_at' => [
                'type' => 'DATETIME',
           ],
           'deleted_at' => [
               'type' => 'DATETIME',
           ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'user', 'id', 'CASCADE', 'RESTRICT');
        $this->forge->addForeignKey('order_id', 'order', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('parent_id', 'comment', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('comment');
    }

    public function down()
    {
        $this->forge->dropTable('comment');
    }
}
