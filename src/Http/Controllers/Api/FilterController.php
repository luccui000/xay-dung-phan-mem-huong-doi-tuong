<?php

namespace Luccui\Http\Controllers\Api;

use Carbon\Carbon;
use Luccui\Core\Request;
use Luccui\Models\DonHang;

class FilterController
{
    public function index()
    {
        $request = app(Request::class);
        $from = Carbon::createFromFormat('Y-m-d',$request->get('from'));
        $to = Carbon::createFromFormat('Y-m-d',$request->get('to'));

        // $donhangs = DonHang::whereBetween('ngay_dat', [$from, $to])->get();
        // dd(DonHang::whereDate('ngay_dat', '2022/03/06')->get());
        $i = 0;
        for($date = $from; $date->lte($to); $date->addDay()) {
            $dateranges['label'][$i] = $date->format('d/m/Y');
            $doanhThu = DonHang::whereDate('ngay_dat', '=', $date->format('Y/m/d'))->sum('tong_tien');
            $dateranges['data'][$i] = $doanhThu;
            $i++;
        }

        echo json_encode([
            'data' => $dateranges['data'],
            'label' => $dateranges['label']
        ]);
    }
}
