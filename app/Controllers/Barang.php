<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Barang extends BaseController
{
    function __construct() {
        $this->barangModel = new \App\Models\BarangModel();
        $this->detailBarangModel = new \App\Models\DetailBarangModel();
    }

    public function index()
    {
        return view('layout/up', ['title' => 'Barang'])
            .view('dashboard/barang', [
                'barangs' => $this->barangModel->select('*, barang.id_barang')->join('detail_barang', 'detail_barang.id_barang = barang.id_barang', 'left')->get()
                ])
            .view('layout/down');
    }

    function store() {
        $rules = [
            'nama_barang' => 'required|min_length[3]|max_length[50]',
            'stok' => 'required|min_length[1]|max_length[10000]'
        ];

        if($this->validate($rules)) {
            $data = [
                'nama_barang' => $this->request->getVar('nama_barang'),
                'stok' => $this->request->getVar('stok')
            ];

            $this->barangModel->save($data);

            session()->setFlashdata('notif', 'Berhasil menambah data.');
            return redirect()->to('/barang');
        }else {
            session()->setFlashdata('notif', 'Gagal menambah data!');
            return redirect()->to('/barang');
        }
    }

    function destroy() {
        $this->barangModel->where('id_barang', $this->request->getVar('id_barang'))->delete();
        session()->setFlashdata('notif', 'Berhasil menghapus data.');
        return redirect()->to('/barang');
    }

    function update() {
        $rules = [
            'nama_barang' => 'required|min_length[3]|max_length[50]',
            'stok' => 'required|min_length[1]|max_length[10000]'
        ];

        if($this->validate($rules)) {

            $this->barangModel->set('nama_barang', $this->request->getVar('nama_barang'))
                ->set('stok', $this->request->getVar('stok'))
                ->where('id_barang', $this->request->getVar('id_barang'))
                ->update();

            session()->setFlashdata('notif', 'Berhasil menambah data.');
            return redirect()->to('/barang');
        }else {
            session()->setFlashdata('notif', 'Gagal menambah data!');
            return redirect()->to('/barang');
        }
    }

    function detail() {
        $rules = [
            'harga' => 'required',
            'tanggal' => 'required'
        ];

        if($this->validate($rules)) {
            if($this->request->getVar('id')) {
                $this->detailBarangModel->set('harga', $this->request->getVar('harga'))
                ->set('tanggal', $this->request->getVar('tanggal'))
                ->where('id_detail_barang', $this->request->getVar('id'))
                ->update();

                session()->setFlashdata('notif', 'Berhasil mengubah data.');
                return redirect()->to('/barang');
            }else {
                $this->detailBarangModel->insert([
                    'id_barang' => $this->request->getVar('id_barang'),
                    'harga' => $this->request->getVar('harga'),
                    'tanggal' => $this->request->getVar('tanggal'),
                ]);

                session()->setFlashdata('notif', 'Berhasil menambah data.');
                return redirect()->to('/barang');
            }
        }else {
            session()->setFlashdata('notif', 'Gagal menambah/mengubah data!');
            return redirect()->to('/barang');
        }
    }
}
