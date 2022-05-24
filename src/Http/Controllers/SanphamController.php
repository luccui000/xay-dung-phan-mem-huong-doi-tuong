<?php

namespace Luccui\Http\Controllers;


use Luccui\Core\Request;
use Luccui\Models\SanPham;

class SanphamController extends Controller
{
    public function index()
    {
        $sanphams = SanPham::all();

        return view('admin/sanpham/index.php', [
            'sanphams' => $sanphams
        ]);
    }
    public function create()
    {
        return view('admin/sanpham/create.php');
    }
    public function store()
    {
        $request = new Request();
        var_dump($request);
    }
}
