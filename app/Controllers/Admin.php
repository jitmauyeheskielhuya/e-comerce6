<?php

namespace App\Controllers;

class Admin extends BaseController
{
  public function index()
  {
    return view('admin/home_admin');
  }

  public function produk()
  {
    return view('admin/produk/index');
  }

  public function create()
  {
    return view('admin/produk/create');
  }
}
