<?php

namespace Luccui\Http\Controllers;

use Luccui\Core\Request;

class ThanhToanController
{
    public function checkout()
    {
        return view('client/sanpham/thanh-toan.php');
    }
}
