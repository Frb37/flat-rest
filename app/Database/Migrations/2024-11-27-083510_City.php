<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class City extends Migration
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
            'zipcode' => [
                'type'              => 'VARCHAR',
                'constraint'        => '10',
            ],
            'region' => [
                'type'              => 'INT',
                'constraint'        => 11,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('region', 'region', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('city');
    }

    public function down()
    {
        $this->forge->dropTable('city');
    }
}
