<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_transaksi' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_admin' => [
                'type'       => 'INT',
                'constraint' => '12',
            ],
            'id_barang' => [
                'type'       => 'INT',
                'constraint' => '12',
            ],
            'tanggal' => [
                'type'       => 'DATE',
            ],
            'total' => [
                'type'       => 'INT',
                'constraint' => '12',
            ],
        ]);
        $this->forge->addKey('id_transaksi', true);
        $this->forge->createTable('transaksi');
    }

    public function down()
    {
        $this->forge->dropTable('transaksi');
    }
}
