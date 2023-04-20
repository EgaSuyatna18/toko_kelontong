<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_barang' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_barang' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'stok' => [
                'type'       => 'INTEGER',
                'constraint' => '12',
            ]
        ]);
        $this->forge->addKey('id_barang', true);
        $this->forge->createTable('barang');
    }

    public function down()
    {
        $this->forge->dropTable('barang');
    }
}
