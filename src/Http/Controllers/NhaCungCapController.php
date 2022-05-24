<?php

namespace Luccui\Http\Controllers;

use Luccui\Models\NhaCungCap;

class NhaCungCapController extends Controller
{
    public function index()
    {
        $nhacungcaps  = NhaCungCap::all();

        return view('admin/nhacungcap/index.php', [
            'nhacungcaps' => $nhacungcaps
        ]);
    }
}
