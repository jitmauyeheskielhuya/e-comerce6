<?php

namespace App\Controllers;

class Pengrajin extends BaseController
{
  public function index()
  {
    return view('pengrajin/home_pengrajin');
  }
}
