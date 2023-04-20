<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Laporan extends BaseController
{
    function __construct() {
        $this->transaksiModel = new \App\Models\TransaksiModel();
    }
    
    public function index()
    {
        return view('layout/up', ['title' => 'Barang'])
            .view('dashboard/laporan', [
                'transaksis' => $this->transaksiModel
                    ->select('*')
                    ->join('detail_transaksi', 'detail_transaksi.id_transaksi = transaksi.id_transaksi')
                    ->join('barang', 'transaksi.id_barang = barang.id_barang')
                    ->get()
                ])
            .view('layout/down');
    }
}
