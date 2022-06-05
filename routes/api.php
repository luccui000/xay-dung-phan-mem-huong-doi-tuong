<?php


use Luccui\Core\Router;
use Luccui\Http\Controllers\Api\GiaTriController;
use Luccui\Http\Controllers\Api\GioHangController;

Router::get('/api/gia-tri', [GiaTriController::class, 'index'], '/api/gia-tri');
Router::post('/api/san-pham/cap-nhat-gio-hang', [GioHangController::class, 'update'], '/api/san-pham/cap-nhat-gio-hang');
