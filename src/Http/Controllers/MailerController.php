<?php

namespace Luccui\Http\Controllers;

use Luccui\Classes\Mailer;
use Luccui\Core\View;
use Luccui\Http\Controllers\Admin\BaseController;
use Luccui\Models\ChiTietDonHang;
use Luccui\Models\DonHang;

class MailerController extends BaseController
{
    public function index()
    {
        $logo = assets('public/client/images/logo.png');
        $seller = new \stdClass();
        $seller->name = 'Minh Lực';
        $seller->address = '126 Nguyễn Thiện Thành';
        $seller->phone = '03999xxxx';

        $madonhang = 'YHISAAF';
        $donhang = DonHang::where('ma_don_hang', '=', $madonhang)->first();
        $chitietdonhang = ChiTietDonHang::where('donhang_id', '=', $donhang->id)->get();

        $html = View::make('mail/template.php', [
            'logo' => $logo,
            'seller' => $seller,
            'invoice' => $donhang,
            'detail' => $chitietdonhang
        ])->render(true);

        Mailer::sendTo('luccui@gmail.com', 'test', $html, true);
    }
}
