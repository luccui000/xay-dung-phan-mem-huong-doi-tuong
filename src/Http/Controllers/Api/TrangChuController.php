<?php

namespace Luccui\Http\Controllers\Api;

use Luccui\Http\Controllers\Admin\BaseController;
use Luccui\Models\DonHang;

class TrangChuController extends BaseController
{
    const MONTH_IN_YEAR = 12;

    public function chartDonHang()
    {
        $orderChartDataSet = [];
        for($i = 1; $i <= self::MONTH_IN_YEAR; $i++) {
            $orderChartDataSet['T' . $i] = DonHang::whereMonth('ngay_dat', '=', $i)->sum('tong_tien');
        }
        $orderSuccess = [];
        for($i = 1; $i <= self::MONTH_IN_YEAR; $i++) {
            $orderSuccess['T' . $i] = DonHang::whereMonth('ngay_dat', '=', $i)
                ->where('trang_thai', '=', DonHang::DA_HOAN_THANH)
                ->sum('tong_tien');
        }
        return json_encode([
            'data' => [
                'tat_ca' => $orderChartDataSet,
                'hoan_thanh' =>  $orderSuccess
            ],
            'code' => 200,
            'message' => 'Lay du lieu thanh cong'
        ]);
    }
    public function themmoi()
    {
        var_dump($this->request);
    }
}
