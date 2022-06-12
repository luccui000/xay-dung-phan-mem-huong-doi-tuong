<?php

use Luccui\Http\Controllers\{Admin\DonHangController,
    Admin\PDFController,
    Admin\TrangChuController,
    Admin\SanphamController,
    ChiTietSanPhamController,
    DanhMucController,
    DanhMucSanPhamController,
    DanhSachSanPhamController,
    AdminController,
    GioHangController,
    HinhAnhController,
    HomeController,
    LienHeController,
    NhaCungCapController,
    TaiKhoanController,
    ThanhToanController,
    WishlistController};
use Luccui\Core\Router;


Router::get('/', [HomeController::class, 'index'], '/home');
Router::get('/san-pham/chi-tiet', [ChiTietSanPhamController::class, 'detail'], 'chi-tiet');
Router::get('/san-pham/tat-ca', [DanhSachSanPhamController::class, 'index'], '/san-pham/tat-ca');
Router::post('/san-pham/them-vao-gio-hang', [GioHangController::class, 'add'], '/san-pham/them-vao-gio-hang');
Router::post('/san-pham/cap-nhat-gio-hang', [GioHangController::class, 'update'], '/san-pham/cap-nhat-gio-hang');
Router::get('/san-pham/xoa-khoi-gio-hang', [GioHangController::class, 'delete'], '/san-pham/xoa-khoi-gio-hang');
Router::get('/san-pham/gio-hang', [GioHangController::class, 'cart'], '/san-pham/gio-hang');

Router::get('/san-pham/danh-muc', [DanhMucSanPhamController::class, 'show'], '/san-pham/danh-muc');

Router::get('/san-pham/danh-sach-yeu-thich', [WishlistController::class, 'index'], '/san-pham/danh-sach-yeu-thich');
Router::get('/san-pham/them-vao-yeu-thich', [WishlistController::class, 'add'], '/san-pham/them-vao-yeu-thich');
Router::post('/san-pham/xoa-khoi-yeu-thich', [WishlistController::class, 'remove'], '/san-pham/xoa-khoi-yeu-thich');

Router::get('/san-pham/thanh-toan', [ThanhToanController::class, 'checkout'], '/san-pham/thanh-toan');
Router::post('/san-pham/thanh-toan', [ThanhToanController::class, 'confirm'], '/san-pham/thanh-toan/store');
Router::get('/san-pham/thanh-toan/callback', [ThanhToanController::class, 'callback'], '/san-pham/thanh-toan/callback');

Router::get('/thanh-toan', [HomeController::class, 'checkout'], 'thanh-toan');
Router::get('/lien-he', [LienHeController::class, 'index'], 'lien-he');

Router::get('/dang-ky', [TaiKhoanController::class, 'formDangKy'], 'dang-ky');
Router::post('/dang-ky', [TaiKhoanController::class, 'DangKy'], 'luu-dang-ky');
Router::get('/dang-nhap', [TaiKhoanController::class, 'formDangNhap'], 'dang-nhap');
Router::post('/dang-nhap', [TaiKhoanController::class, 'DangNhap'], 'luu-dang-nhap');

Router::get('/admin', fn () => redirect('/admin/dang-nhap'));
Router::get('/admin/dang-nhap', [AdminController::class, 'formDangNhap'], '/admin/dang-nhap');
Router::post('/admin/dang-nhap', [TrangChuController::class, 'dangnhap'], '/post/admin/dang-nhap');
Router::get('/admin/trang-chu', [TrangChuController::class, 'index'], '/admin/trang-chu');
Router::get('/admin/danh-muc', [DanhMucController::class, 'index'], '/admin/danhmuc/index');
Router::get('/admin/san-pham', [SanphamController::class, 'index'], '/admin/sanpham');
Router::get('/admin/san-pham/create', [SanphamController::class, 'create'], '/admin/sanpham/create');
Router::post('/admin/san-pham/store', [SanphamController::class, 'store'], '/admin/sanpham/store');

Router::get('/admin/don-hang', [DonHangController::class, 'index'], '/admin/don-hang');
Router::get('/admin/don-hang/chi-tiet', [DonHangController::class, 'show'], '/admin/don-hang/chi-tiet');
Router::post('/admin/don-hang/in-hoa-don', [PDFController::class, 'inHoaDon'], '/admin/don-hang/in-hoa-don');
Router::post('/admin/don-hang/gui-hoa-don', [PDFController::class, 'guiHoaDon'], '/admin/don-hang/gui-hoa-don');

Router::get('/admin/nha-cung-cap', [NhaCungCapController::class, 'index'], '/admin/nhacungcap/index');
Router::get('/admin/hinh-anh', [HinhAnhController::class, 'index'], '/admin/hinhanh/index');

Router::post('/admin/hinh-anh/store', [HinhAnhController::class, 'store'], '/admin/hinhanh/store');
Router::get('/admin/login', [AdminController::class, 'login'], '/admin/login');
Router::get('/admin/create', [AdminController::class, 'create'], '/admin/create');
Router::post('/admin/store', [AdminController::class, 'store'], '/admin/store');

