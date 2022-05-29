<?php


use Luccui\Core\Router;
use Luccui\Http\Controllers\Api\GiaTriController;

Router::get('/api/gia-tri', [GiaTriController::class, 'index'], '/api/gia-tri');
