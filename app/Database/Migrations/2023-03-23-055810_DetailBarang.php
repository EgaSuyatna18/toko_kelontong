<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailBarang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_detail_barang' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_barang' => [
                'type'       => 'INTEGER',
                'constraint' => '12',
            ],
            'harga' => [
                'type'       => 'INTEGER',
                'constraint' => '12',
            ],
            'tanggal' => [
                'type'       => 'DATE',
            ]
        ]);
        $this->forge->addKey('id_detail_barang', true);
        $this->forge->createTable('detail_barang');
    }

    public function down()
    {
        $this->forge->dropTable('detail_barang');
    }
}
