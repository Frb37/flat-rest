<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Media extends Migration
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
            'file_path' => [
                'type'              => 'TEXT',
                'null'              => false,
            ],
            'entity_id' => [
                'type'              => 'INT',
                'unsigned'          => true,
                'null'              => false,
            ],
            'entity_type' => [
                'type'              => 'ENUM',
                'constraint'        => ['user', 'meal', 'provider'],
                'default'           => 'user',
            ],
            'created_at' => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('media');
    }

    public function down()
    {
        $this->forge->dropTable('media');
    }
}
