<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $this->barangModel = new \App\Models\BarangModel();
        return view('layout/up', [
            'title' => 'Dashboard',
            'terlaris' => $this->barangModel->query('select barang.*, sum(detail_transaksi.qty) as terjual from barang inner join transaksi on transaksi.id_barang = barang.id_barang inner join detail_transaksi on detail_transaksi.id_transaksi = transaksi.id_transaksi group by barang.id_barang order by sum(detail_transaksi.qty) desc limit 1')->getResult()
            ]) 
            .view('dashboard/index')
            .view('layout/down');
    }
}
