<?php

namespace App\Controllers;

use \CodeIgniter\Controller;
use \App\Models\ProdukModel;
use App\Controllers\BaseController;
use App\Models\PembelianModel;
use App\Models\PemesananModel;
use App\Models\UsersModel;

class Pengrajin extends BaseController
{
  protected $ProdukModal;
  protected $pembelianModel;
  protected $pemesananModel;
  protected $userModel;
  
  public function __construct()
  {
    helper('form');
    $this->ProdukModal = new ProdukModel();
    $this->pembelianModel = new PembelianModel();
    $this->pemesananModel = new PemesananModel();
    $this->userModel = new UsersModel();
  }

  
  public function index()
  {
    return view('pengrajin/home_pengrajin');
  }

  public function produk()
  {
    $data = [
      'produk' => $this->ProdukModal->get_produk(),
    ];
    return view('pengrajin/produk/index', $data);
  }

  public function tambah_produk()
  {
    return view('pengrajin/produk/tambah');
  }

  public function save()
  {
    $validation = \Config\Services::validation();
    // mengambil file upload
    $image = $this->request->getFile('gambar_noken');
    // rendom file
    $name = $image->getRandomName();

    $data = [
      'harga_noken' => $this->request->getPost('harga_noken'),
      'ukuran_noken' => $this->request->getPost('ukuran_noken'),
      'motif_noken' => $this->request->getPost('motif_noken'),
      'jenis_noken' => $this->request->getPost('jenis_noken'),
      'berat_noken' => $this->request->getPost('berat_noken'),
      'id_pengrajin' => user()->id,
      'lokasi_penjualan' => $this->request->getPost('lokasi_penjualan'),
      'gambar_noken' => $name,
      'tgl_daftar' => $this->request->getPost('tgl_daftar'),
    ];

    if ($validation->run($data, 'produk') == false) {
      session()->setFlashdata('inputs', $this->request->getPost());
      session()->setFlashdata('errors', $validation->getErrors());
      return redirect()->to(base_url('produk/tambah'));
    } else {
      $image->move(ROOTPATH . 'public/gambar_noken', $name);
      $this->ProdukModal->tambah_produk($data);
      session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
      return redirect()->to(base_url('produk'));
    }
  }

  public function edit_produk($id_produk)
  {
    $data = [
      'produk' => $this->ProdukModal->edit_produk($id_produk),
    ];
    return view('pengrajin/produk/edit', $data);
  }

  public function update_produk($id_produk)
  {
    $validation = \Config\Services::validation();


    $data = [
      'harga_noken' => $this->request->getPost('harga_noken'),
      'ukuran_noken' => $this->request->getPost('ukuran_noken'),
      'motif_noken' => $this->request->getPost('motif_noken'),
      'jenis_noken' => $this->request->getPost('jenis_noken'),
      // 'nama_pengrajin' => $this->request->getPost('nama_pengrajin'),
      'lokasi_penjualan' => $this->request->getPost('lokasi_penjualan'),
      // 'gambar_noken' => $this->request->getPost('gambar_noken'),
      'tgl_daftar' => $this->request->getPost('tgl_daftar'),
    ];

    // mengambil file upload
    $image = $this->request->getFile('gambar_noken');
    // rendom file
    if ($image->getName() != '') {
      $name = $image->getRandomName();
      $image->move(ROOTPATH . 'public/gambar_noken', $name);
      $data['gambar_noken'] = $name;
    }

    $this->ProdukModal->update_produk($data, $id_produk);
    session()->setFlashdata('success', 'Data Berhasil Diupdate !!!');
    return redirect()->to(base_url('produk'));
  }



  public function detail_produk()
  {
    return view('pengrajin/detail_produk/index');
  }


  public function pemesanan_produk()
  {
    $data['pemesanan'] = $this->pemesananModel->getAll();

    return view('pengrajin/pemesanan_produk/index', $data);
  }

  public function perkembangan_ikm()
  {
    return view('pengrajin/perkembangan_ikm/index');
  }

  public function delete_produk($id_produk)
  {
    $this->ProdukModal->delete_produk($id_produk);
    session()->setFlashdata('success', 'Data Berhasil Dihapus !!!');
    return redirect()->to(base_url('produk'));
  }

  
}
