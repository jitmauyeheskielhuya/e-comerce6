<?php

namespace App\Controllers;

class Pengrajin extends BaseController
{
  public function index()
  {
    return view('pengrajin/home_pengrajin');
  }

  public function produk()
  {
    return view('pengrajin/produk/index');
  }

  public function detail_produk()
  {
    return view('pengrajin/detail_produk/index');
  }

  public function pemesanan_produk()
  {
    return view('pengrajin/pemesanan_produk/index');
  }

  public function perkembangan_ikm()
  {
    return view('pengrajin/perkembangan_ikm/index');
  }

  
}
