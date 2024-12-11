<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableUser extends Migration
{
    public function up()
    {
        $field = [
            'mail' => [
                'name' => 'email',
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
        ];

        $this->forge->modifyColumn('user', $field);
    }

    public function down()
    {
        //
    }
}
