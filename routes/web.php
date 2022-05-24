<?php

use Luccui\Http\Controllers\{DanhMucController,
    DashboardController,
    AdminController,
    HomeController,
    NhaCungCapController,
    SanphamController};
use Luccui\Core\Router;

$router = new Router();
$router
    ->get('/', [HomeController::class, 'index'], '/home')
    ->get('/chi-tiet', [HomeController::class, 'detail'], 'chi-tiet')
    ->get('/thanh-toan', [HomeController::class, 'checkout'], 'thanh-toan')
    ->get('/admin', [AdminController::class, 'index'], '/admin')
    ->get('/admin/dashboard', [DashboardController::class, 'index'], '/admin/dashboard/index')
    ->get('/admin/danhmuc', [DanhMucController::class, 'index'], '/admin/danhmuc/index')
    ->get('/admin/sanpham', [SanphamController::class, 'index'], 'admin/sanpham/index')
    ->get('/admin/sanpham/create', [SanphamController::class, 'create'], 'admin/sanpham/create')
    ->post('/admin/sanpham/store', [SanphamController::class, 'store'], 'admin/sanpham/store')
    ->get('/admin/nhacungcap', [NhaCungCapController::class, 'index'], 'admin/nhacungcap/index')
    ->get('/admin/login', [AdminController::class, 'login'], 'admin/login')
    ->get('/admin/create', [AdminController::class, 'create'], 'admin/create')
    ->post('/admin/store', [AdminController::class, 'store'], 'admin/store');

return $router;

