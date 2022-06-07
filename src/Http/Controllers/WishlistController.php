<?php

namespace Luccui\Http\Controllers;

use Luccui\Classes\Wishlist;
use Luccui\Core\Session;
use Luccui\Models\SanPham;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = app(Wishlist::class)->getItems();
        $sanphamIds = [];
        foreach ($wishlists as $items) {
            foreach ($items as $item) {
                $sanphamIds[] = $item['id'];
            }
        }
        $sanphams = SanPham::whereIn('id', array_values($sanphamIds))->get();
        return view('client/sanpham/wishlist.php', [
            'sanphams' => $sanphams
        ]);
    }
    public function add()
    {
        $sanpham = SanPham::findFirst($this->request->query['id']);

        if($sanpham) {
            app(Wishlist::class)->add($sanpham->id);
        }
        Session::back();
    }
    public function remove()
    {
        app(Wishlist::class)->remove($this->request->sanpham_id);
        Session::back();
    }
}
