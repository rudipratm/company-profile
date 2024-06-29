<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class ProdukController extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Daftar Produk",
            "daftar_produk" => $this->ProdukModel->orderBy('nama_produk', 'ASC')->findAll()
        ];
        return view('admin/produk/index', $data);
    }

    public function create()
    {
        $data = [
            "title" => "Tambah Produk",
            "kategori" => $this->KategoriModel->orderBy("nama_kategori", "ASC")->findAll(),
            "validation" => \Config\Services::validation()
        ];
        return view('admin/produk/create', $data);
    }

    public function storeProduk(){
        $validation = \Config\Services::validation();
        $rules = [
            'nama' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required'
        ];
        $data = $this->request->getPost(array_keys($rules));
        if (! $this->validateData($data, $rules)) {
            store_sweetalert('error','Gagal','Terdapat kolom yang kosong!');
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $nama = esc($this->request->getPost('nama'));
        $kategori = esc($this->request->getPost('kategori'));
        $deskripsi = esc($this->request->getPost('deskripsi'));
        $gambar = esc($this->request->getPost('gambar'));
        $slug = url_title($nama, '-', true);

        $data = [
            'slug_produk' => $slug,
            'kategori_slug' => $kategori,
            'nama_produk' => $nama,
            'deskripsi' => $deskripsi,
            'gambar_produk' => $gambar
        ];
        $this->ProdukModel->insert($data);
        
        store_sweetalert('success','Sukses','Berhasil menambah produk');
        return redirect('produk');
    }

    public function updateProduk($id_produk){
        $nama = esc($this->request->getPost('nama'));
        $kategori_slug = esc($this->request->getPost('kategori_slug'));
        $deskripsi = esc($this->request->getPost('deskripsi'));
        $gambar = esc($this->request->getPost('gambar'));
        $slug = url_title($nama, '-', true);

        $data = [
            'slug_produk' => $slug,
            'kategori_slug' => $kategori_slug,
            'nama_produk' => $nama,
            'deskripsi' => $deskripsi,
            'gambar_produk' => $gambar,
            'tanggal_ubah' => date('Y-m-d H:i:s')
        ];
        $this->ProdukModel->update($id_produk, $data);
        
        store_sweetalert('success','Sukses','Berhasil mengubah produk');
        return redirect('produk');
    }

    public function deleteProduk($id_produk){
        $this->ProdukModel->where('id_produk', $id_produk)->delete();
        
        store_sweetalert('success','Sukses','Berhasil menghapus produk');
        return redirect('produk');
    }

    public function kategori()
    {
        $data = [
            "title" => "Daftar Kategori Produk",
            "kategori_produk" => $this->KategoriModel->orderBy('nama_kategori', 'ASC')->findAll()
        ];
        return view('admin/produk/kategori', $data);
    }

    public function store(){
        $nama = esc($this->request->getPost('nama'));
        $slug = url_title($nama, '-', true);

        $data = [
            'nama_kategori' => $nama,
            'slug_kategori' => $slug
        ];
        $this->KategoriModel->insert($data);
        
        store_sweetalert('success','Sukses','Berhasil menambah kategori');
        return redirect('kategori');
    }

    public function update($id_kategori){
        $nama = esc($this->request->getPost('nama'));
        $slug = url_title($nama, '-', true);

        $data = [
            'nama_kategori' => $nama,
            'slug_kategori' => $slug,
            'tanggal_ubah' => date('Y-m-d H:i:s')
        ];
        $this->KategoriModel->update($id_kategori, $data);
        
        store_sweetalert('success','Sukses','Berhasil mengubah kategori');
        return redirect('kategori');
    }

    public function delete($id_kategori){
        $this->KategoriModel->where('id_kategori', $id_kategori)->delete();
        
        store_sweetalert('success','Sukses','Berhasil menghapus kategori');
        return redirect('kategori');
    }
}
