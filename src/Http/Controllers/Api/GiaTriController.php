<?php

namespace Luccui\Http\Controllers\Api;

use Luccui\Core\Request;
use Luccui\Models\GiaTri;
use Luccui\Models\TuyChon;

class GiaTriController
{
    public function index()
    {
        $request = new Request();
        $s = $request->query['s'];
        $tuychons = TuyChon::where("ten_tuy_chon", "LIKE", "%{$s}%")
            ->first();
        $giatris = GiaTri::where('tuychon_id', '=', $tuychons->id)
            ->select(['ten_gia_tri'])
            ->get();
        $items = $giatris->map(function($item) {
           return $item->ten_gia_tri;
        });
        return json_encode($items);
    }
}
