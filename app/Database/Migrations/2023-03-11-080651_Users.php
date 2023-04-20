<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_admin' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '12',
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ]
        ]);
        $this->forge->addKey('id_admin', true);
        $this->forge->createTable('admin');
    }

    public function down()
    {
        $this->forge->dropTable('admin');
    }
}
