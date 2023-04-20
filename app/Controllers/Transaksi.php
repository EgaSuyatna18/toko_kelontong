<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Transaksi extends BaseController
{

    public function __construct() {
        $this->transaksiModel = new \App\Models\TransaksiModel();
        $this->detailTransaksiModel = new \App\Models\DetailTransaksiModel();
        $this->barangModel = new \App\Models\BarangModel();
    }

    public function index() {
        return view('layout/up', ['title' => 'Barang'])
            .view('dashboard/transaksi', [
                'transaksis' => $this->transaksiModel
                    ->select('*')
                    ->join('detail_transaksi', 'detail_transaksi.id_transaksi = transaksi.id_transaksi')
                    ->join('barang', 'transaksi.id_barang = barang.id_barang')
                    ->get()
                ])
            .view('layout/down');
    }

    public function store() {
        if($this->validate([
            'qty' => 'required',
            'harga' => 'required'
            ])) {
            $this->transaksiModel->save([
                'id_admin' => session()->get('id_admin'),
                'tanggal' => date('Y-m-d'),
                'id_barang' => $this->request->getVar('id_barang'),
                'total' => $this->request->getVar('harga') * $this->request->getVar('qty')
            ]);
            $this->detailTransaksiModel->save([
                'id_transaksi' => $this->transaksiModel->getInsertID(),
                'id_barang' => $this->request->getVar('id_barang'),
                'qty' => $this->request->getVar('qty'),
                'harga' => $this->request->getVar('harga'),
                'total' => $this->request->getVar('qty') * $this->request->getVar('harga')
            ]);
            $this->barangModel->decrement('stok', $this->request->getVar('qty'));
            session()->setFlashdata('notif', 'Berhasil menambah data.');
            return redirect()->to('/transaksi');
        }else {
            session()->setFlashdata('notif', 'Gagal menambah data!');
            return redirect()->to('/barang');
        }
    }
}
