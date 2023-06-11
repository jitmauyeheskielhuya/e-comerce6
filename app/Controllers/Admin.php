<?php

namespace App\Controllers;

class Admin extends BaseController
{
  public function index()
  {
    return view('admin/home_admin');
  }

  public function kriteria()
  {
    return view('admin/kriteria/index');
  }

  public function create_kriteria()
  {
    return view('admin/kriteria/create');
  }

  public function subkriteria()
  {
    return view('admin/subkriteria/index');
  }

  public function create_subkriteria()
  {
    return view('admin/subkriteria/create');
  }
}
