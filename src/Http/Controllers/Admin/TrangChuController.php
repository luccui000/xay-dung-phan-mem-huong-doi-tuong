<?php

namespace Luccui\Http\Controllers\Admin;


use Carbon\Carbon;
use Luccui\Models\DonHang;
use Luccui\Models\SanPham;
use Luccui\Models\TaiKhoan;

class TrangChuController extends BaseController
{
    const MONTH_IN_YEAR = 12;

    public function index()
    {

        $prevMonth = TaiKhoan::whereMonth('ngay_tao', '=', Carbon::now()->subMonth(1))->count();
        $currMonth = TaiKhoan::whereMonth('ngay_tao', '=', Carbon::now())->get()->count();
//

        if($prevMonth == 0) {
            $percent_user = $currMonth * 100;
        } else {
            $percent_user = floatval($currMonth * 100 / $prevMonth);
        }
        $productCounter = SanPham::count();
        $prevMonthOrderCompleted = DonHang::where('trang_thai', '=', DonHang::DA_XAC_NHAN)
            ->whereMonth('ngay_dat', '=', Carbon::now()->subMonth(1))
            ->count();
        $currMonthOrderCompleted = DonHang::where('trang_thai', '=', DonHang::DA_XAC_NHAN)
                ->whereMonth('ngay_dat', '=', Carbon::now())
                ->count();

        if($prevMonthOrderCompleted == 0) {
            $percent_order = $currMonthOrderCompleted * 100;
        } else {
            $percent_order = floatval($currMonthOrderCompleted * 100 / $prevMonthOrderCompleted);
        }
        $tong_doanh_thu = DonHang::where('trang_thai', '=', DonHang::DA_XAC_NHAN)
            ->whereMonth('ngay_dat', '=', Carbon::now())
            ->sum('tong_tien');

        $orderPending = DonHang::where('trang_thai', '=', DonHang::DANG_CHO_XAC_NHAN)
            ->count();
        $orderChartDataSet = [];
        for($i = 1; $i <= self::MONTH_IN_YEAR; $i++) {
            $orderChartDataSet[] = DonHang::whereMonth('ngay_dat', '=', $i)->sum('tong_tien');
        }
//        $orderPrice = DonHang::groupBy('created_at')->get();

//        dd($orderPrice);
        $donhangs = DonHang::orderBy('ngay_dat', 'desc')->limit(5)->get();
//        var_dump($donhangs);
        return view('admin/trangchu/index.php', [
            'current_user_counter' => $currMonth,
            'previous_user_counter' => $prevMonth,
            'precent_user' => $percent_user,
            'product_counter' => $productCounter,
            'current_order_complete_counter' => $currMonthOrderCompleted,
            'previous_order_complete_counter' => $prevMonthOrderCompleted,
            'percent_order' => $percent_order,
            'tong_doanh_thu' => $tong_doanh_thu,
            'order_pending'=> $orderPending,
            'order_chart_dataset' => $orderChartDataSet,
            'donhangs' => $donhangs
        ]);
    }
}
