<?php

namespace Luccui\Http\Controllers\Admin;

use Luccui\Classes\LuccuiPrinter;
use Luccui\Models\ChiTietDonHang;
use Luccui\Models\DonHang;

class PDFController extends BaseController
{
    public function inHoaDon()
    {
        $donhang_id = $this->request->donhang_id ?? null;

        if($donhang_id) {
            $donhang = DonHang::where('id', '=', $donhang_id)->first();
            $ctdh = ChiTietDonHang::where('donhang_id', '=', $donhang_id)->get();

            $invoice = new LuccuiPrinter();
            $invoice->setLogo("public/images/logo.png");
            $invoice->setColor("#007fff");
            $invoice->setType("Hoa don ban hang");
            $invoice->setReference("INV-55033645");
            $invoice->setDate(date('M dS ,Y',time()));
            $invoice->setTime(date('h:i:s A',time()));
            $invoice->setDue(date('M dS ,Y',strtotime('+3 months')));    // Due Date
            $invoice->setFrom(array("Seller Name","Sample Company Name","128 AA Juanita Ave","Glendora , CA 91740"));
            $invoice->setTo(array("Purchaser Name","Sample Company Name","128 AA Juanita Ave","Glendora , CA 91740"));

            foreach ($ctdh as $item) {
                $invoice->addItem(vietnam($item->ten_san_pham)->convert(),"",$item->so_luong,0,$item->gia,0,$item->thanh_tien);
            }
            $invoice->addTotal("Tam tin", vnmoney($donhang->thanh_tien, false));
            $invoice->addTotal("Phi VC", vnmoney($donhang->phi_giao_hang, false));
            $invoice->addTotal("Tong tien", vnmoney($donhang->tong_tien, false),true);

            if($donhang->trang_thai == DonHang::DA_HOAN_THANH)
                $invoice->addBadge("Da thanh toan");
            else
                $invoice->addBadge("Chua thanh toan", "#dc3545");

            $invoice->setFooternote("My Company Name Here");

            $invoice->render('example1.pdf','I');
        }
    }
}
