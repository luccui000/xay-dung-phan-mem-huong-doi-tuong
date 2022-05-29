<?php

use Luccui\Http\Controllers\{DanhMucController,
    DashboardController,
    AdminController,
    HomeController,
    NhaCungCapController,
    SanphamController};
use Luccui\Core\Router;

Router::get('/', [HomeController::class, 'index'], '/home');
Router::get('/san-pham/chi-tiet', [HomeController::class, 'detail'], 'chi-tiet');
Router::get('/thanh-toan', [HomeController::class, 'checkout'], 'thanh-toan');
Router::get('/admin', [AdminController::class, 'index'], '/admin');
Router::get('/admin/dashboard', [DashboardController::class, 'index'], '/admin/dashboard/index');
Router::get('/admin/danhmuc', [DanhMucController::class, 'index'], '/admin/danhmuc/index');
Router::get('/admin/sanpham', [SanphamController::class, 'index'], 'admin/sanpham/index');
Router::get('/admin/sanpham/create', [SanphamController::class, 'create'], 'admin/sanpham/create');
Router::post('/admin/sanpham/store', [SanphamController::class, 'store'], 'admin/sanpham/store');
Router::get('/admin/nhacungcap', [NhaCungCapController::class, 'index'], 'admin/nhacungcap/index');
Router::get('/admin/login', [AdminController::class, 'login'], 'admin/login');
Router::get('/admin/create', [AdminController::class, 'create'], 'admin/create');
Router::post('/admin/store', [AdminController::class, 'store'], 'admin/store');

