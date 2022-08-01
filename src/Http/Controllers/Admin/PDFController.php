<?php

namespace Luccui\Http\Controllers\Admin;

use Luccui\Classes\LuccuiPrinter;
use Luccui\Classes\Mailer;
use Luccui\Core\Session;
use Luccui\Core\View;
use Luccui\Helpers\Config;
use Luccui\Models\ChiTietDonHang;
use Luccui\Models\DonHang;
use Luccui\Models\TaiKhoan;
use function Symfony\Component\String\s;

class PDFController extends BaseController
{
    public function inHoaDon()
    {
        $donhang_id = $this->request->donhang_id ?? null;

        if($donhang_id) {
            $donhang = DonHang::findFirst($donhang_id);
            $ctdh = ChiTietDonHang::where('donhang_id', '=', $donhang_id)->get();
            $pdfHoaDon =$this->taoPDFHoaDon($donhang, $ctdh);
            header('Content-Type: application/x-download');
            header('Content-Disposition: attachment; filename="'. $donhang_id . date('dmyhis') . '.pdf');
            header('Cache-Control: private, max-age=0, must-revalidate');
            header('Pragma: public');
            echo $pdfHoaDon->render($donhang_id . date('dmyhis') . '.pdf', 'S');
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
                        $logo = assets('public/client/images/logo.png');
                        $seller = new \stdClass();
                        $seller->name = 'Minh Lực';
                        $seller->address = '126 Nguyễn Thiện Thành';
                        $seller->phone = '03999xxxx';

                        $html = View::make('mail/template.php', [
                            'logo' => $logo,
                            'seller' => $seller,
                            'invoice' => $donhang,
                            'detail' => $ctdh
                        ])->render(true);

                        Mailer::sendTo('luccui@gmail.com', 'test', $html, true);
//                        Mailer::sendTo('luccui2k@gmail.com', 'Demo', $html, true);
                        Session::set('sent_email', 'Gửi email thành công');
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
        $invoice->setType("Hóa đơn bán hàng");
        $invoice->setReference("INV-55033645");
        $invoice->setDate(date('M dS ,Y', strtotime($donhang->ngay_dat)));
        $invoice->setTime(date('h:i:s A',time()));
        $invoice->setDue(date('M dS ,Y',strtotime('+3 months')));    // Due Date
        $invoice->setFrom(array("XDPMHDT","XDPMHDT","126 Nguyễn Thiện Thành"));
        $invoice->setTo(array(
            $donhang->ho_nguoi_dat . " " . $donhang->ten_nguoi_dat,
            $donhang->dia_chi,
            $donhang->so_dien_thoai
        ));

        foreach ($ctdh as $item) {
            $invoice->addItem($item->ten_san_pham,
                "",
                $item->so_luong,
                0,
                $item->gia,
                0,
                $item->thanh_tien);
        }
        $invoice->addTotal("Tam tin", vnmoney($donhang->thanh_tien, false));
        $invoice->addTotal("Phi VC", vnmoney($donhang->phi_giao_hang, false));
        $invoice->addTotal("Tong tien", vnmoney($donhang->tong_tien, false),true);

        if($donhang->trang_thai == DonHang::DA_HOAN_THANH)
            $invoice->addBadge("Đã thanh toán");
        else
            $invoice->addBadge("Chua thanh toan", "#dc3545");

        return $invoice;
    }
}
