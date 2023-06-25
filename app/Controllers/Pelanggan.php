<?php

namespace App\Controllers;

use App\Models\BarangModel;

class Pelanggan extends BaseController
{
  protected $BarangModel;

  public function __construct()
  {
    $this->BarangModel = new BarangModel();
    helper('number');
    helper('form');
  }

  public function layout_pelanggan()
  {
    $data = [
      'barang' => $this->BarangModel->get_barang(),
      'cart' => \Config\Services::cart(),
    ];

    return view('pelanggan/home_pelanggan', $data);
  }

  // crud shopping cart
  public function cek()
  {
    $cart = \Config\Services::cart();
    $response = $cart->contents();
    echo '<pre>';
    print_r($response);
    echo '</pre>';
  }

  // Insert shopping cart
  public function add()
  {
    $cart = \Config\Services::cart();
    $cart->insert(array(
      'id'      => $this->request->getPost('id'),
      'qty'     => 1,
      'price'   => $this->request->getPost('price'),
      'name'    => $this->request->getPost('name'),
      'options' => array(
        'gambar' => $this->request->getPost('gambar'),
        'ukuran' => $this->request->getPost('ukuran'),
        'motif' => $this->request->getPost('motif'),
      )
    ));
    session()->setFlashdata('pesan', 'Barang Berhasil Dimasukan Keranjang !!!');
    return redirect()->to(base_url('pelanggan'));
  }

  // Clear the shopping cart
  public function clear()
  {
    $cart = \Config\Services::cart();
    $cart->destroy();
  }

  public function cart()
  {
    $data = [
      'barang' => $this->BarangModel->get_barang(),
      'cart' => \Config\Services::cart(),
    ];

    return view('pelanggan/view_cart/index', $data);
  }

  public function delete($rowid)
  {
    $cart = \Config\Services::cart();
    $cart->remove($rowid);
    session()->setFlashdata('pesan', 'Barang Berhasil Di update !!!');
    return redirect()->to(base_url('pelanggan/cart'));
  }
}
