<?php


use Luccui\Core\Router;
use Luccui\Http\Controllers\Api\DiaChiController;
use Luccui\Http\Controllers\Api\GiaoHangController;
use Luccui\Http\Controllers\Api\GiaTriController;
use Luccui\Http\Controllers\Api\GioHangController;
use Luccui\Http\Controllers\Api\UploadImageController;

Router::get('/api/gia-tri', [GiaTriController::class, 'index'], '/api/gia-tri');
Router::post('/api/san-pham/cap-nhat-gio-hang', [GioHangController::class, 'update'], '/api/san-pham/cap-nhat-gio-hang');
Router::get('/api/dia-chi/danh-sach-huyen', [DiaChiController::class, 'danhSachHuyen'], '/api/dia-chi/danh-sach-huyen');
Router::get('/api/dia-chi/danh-sach-xa', [DiaChiController::class, 'danhSachXa'], '/api/dia-chi/danh-sach-xa');
Router::post('/api/giao-hang/tinh-phi', [GiaoHangController::class, 'phiGiaoHang'], '/api/giao-hang/tinh-phi');
Router::post('/api/upload', [UploadImageController::class, 'upload'], '/api/upload');
