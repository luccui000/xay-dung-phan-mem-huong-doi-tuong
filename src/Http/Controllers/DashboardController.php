<?php

namespace Luccui\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin/dashboard/index.php', [
            'name' => 'Luc Cui'
        ]);
    }
}
