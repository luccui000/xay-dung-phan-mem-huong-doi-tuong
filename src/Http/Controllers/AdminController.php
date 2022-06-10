<?php

namespace Luccui\Http\Controllers;

use Luccui\Classes\Invoice;
use Luccui\Classes\InvoiceList;
use Luccui\Core\Request;

class AdminController
{
    public function formDangNhap()
    {
        return view("/admin/auth/login.php");
    }
    public function index()
    {
        $invoicesList = new InvoiceList([
            new Invoice(1, "Luc 1", 12.1),
            new Invoice(2, "Luc 2", 11),
            new Invoice(3, "Luc 3", 10.8)
        ]);

        return view("/admin/index.php", [
            'invoices' => $invoicesList
        ]);
    }
    public function create()
    {
        return "<form action='/admin/store' method='POST'>
                <label>Email</label>
                <input name='email' >
            </form>";
    }
    public function store()
    {
        $request = new Request();
        var_dump($request->has('email'));
    }
}
