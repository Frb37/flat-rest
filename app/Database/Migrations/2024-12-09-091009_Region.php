<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Region extends Migration
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
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('region');
    }

    public function down()
    {
        $this->forge->dropTable('region');
    }
}
