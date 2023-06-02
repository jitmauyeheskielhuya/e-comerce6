<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        if (in_groups("admin")) {
            return redirect('admin');
        } elseif ((in_groups("pengrajin"))) {
            return redirect('pengrajin');
        }
        return  'user/index';
    }
}
