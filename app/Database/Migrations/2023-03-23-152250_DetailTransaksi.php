<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailTransaksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_detail_transaksi' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_transaksi' => [
                'type'       => 'INT',
                'constraint' => '12',
            ],
            'id_barang' => [
                'type'       => 'INT',
                'constraint' => '12',
            ],
            'qty' => [
                'type'       => 'INT',
                'constraint' => '12',
            ],
            'harga' => [
                'type'       => 'INT',
                'constraint' => '12',
            ],
            'total' => [
                'type'       => 'INT',
                'constraint' => '12',
            ]
        ]);
        $this->forge->addKey('id_detail_transaksi', true);
        $this->forge->createTable('detail_transaksi');
    }

    public function down()
    {
        $this->forge->dropTable('detail_transaksi');
    }
}
