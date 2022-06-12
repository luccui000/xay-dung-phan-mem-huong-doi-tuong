<?php

namespace Luccui\Http\Controllers\Admin;

use Luccui\Classes\LuccuiPrinter;
use Luccui\Classes\Mailer;
use Luccui\Core\Session;
use Luccui\Helpers\Config;
use Luccui\Models\ChiTietDonHang;
use Luccui\Models\DonHang;
use Luccui\Models\TaiKhoan;

class PDFController extends BaseController
{
    public function inHoaDon()
    {
        $donhang_id = $this->request->donhang_id ?? null;

        if($donhang_id) {
            $donhang = DonHang::findFirst($donhang_id);
            $ctdh = ChiTietDonHang::where('donhang_id', '=', $donhang_id)->get();
            $pdfHoaDon =$this->taoPDFHoaDon($donhang, $ctdh);

            $pdfHoaDon->render($donhang_id . date('dmyhis') . '.pdf', 'I');
        }
    }
    public function guiHoaDon()
    {
        $donhang_id = $this->request->donhang_id ?? null;
        if($donhang_id) {
            $donhang = DonHang::findFirst($donhang_id);
            $ctdh = ChiTietDonHang::where('donhang_id', '=', $donhang_id)->get();
            if($donhang) {
                $taikhoan = TaiKhoan::findFirst($donhang->nguoi_dat);
                if($taikhoan->email) {
                    try {
                        $pdfHoaDon =$this->taoPDFHoaDon($donhang, $ctdh);
                        $attachment = rtrim(BASE_APP, '/') .'/public/uploads/hoadons/' . $donhang_id . date('dmyhis') . '.pdf';
                        $pdfHoaDon->render($attachment, 'F');

                        $mailer = new Mailer(app(Config::class)->mailer, true);

                        $mailer->addAddress($taikhoan->email, $taikhoan->ho . ' '. $taikhoan->ten);
                        $mailer->addAttachment($attachment);
                        $mailer->addSubject("Hóa đơn thanh toán đơn hàng");
                        $mailer->addBody("Hóa đơn thanh toán đơn hàng ngày ". $donhang->ngay_dat);
                        $mailer->addAltBody("This is the body in plain text for non-HTML mail clients");

                        $mailer->send();
                        Session::back();
                    } catch (\Exception $exception) {
                        var_dump($exception);
                    }
                }
            }
        }
    }
    public function taoPDFHoaDon($donhang, $ctdh)
    {

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
        return $invoice;
    }
}
