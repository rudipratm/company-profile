<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class ProdukController extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Daftar Produk"
        ];
        return view('admin/produk/index', $data);
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
            'slug_kategori' => $slug
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
