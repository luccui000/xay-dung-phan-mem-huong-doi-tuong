<?php

namespace Luccui\Core;

use Delight\Auth\Auth;
use Illuminate\Database\Capsule\Manager;
use Luccui\Classes\Cart;
use Luccui\Classes\Container;
use Luccui\Classes\Hash;
use Luccui\Classes\Mailer;
use Luccui\Classes\Wishlist;
use Luccui\Exceptions\RouteNotFoundException;
use Luccui\Helpers\Config;
use Luccui\Services\DiaChi\DiaChi;
use Luccui\Services\Email\EmailService;
use Luccui\Services\GiaoHang\GiaoHang;
use Luccui\Services\GiaoHang\GiaoHangInterface;
use Luccui\Services\GiaoHang\GiaoHangNhanh;
use Luccui\Services\Invoice\InvoiceService;
use Luccui\Services\PaymentGateway\PaymentGatewayInterface;
use Luccui\Services\PaymentGateway\VnPayGateway;
use Luccui\Services\ThanhToan\ThanhToanGateway;
use Luccui\Services\ThanhToan\VNPay;

class Application
{
    public static Container $container;
    public Config $config;

    public function __construct(
        public string $requestUri,
        public string $requestMethod
    ) {
        $this->boot();
        $this->register();
        $this->config = new Config($_ENV);
    }

    public function boot()
    {
        static::$container = new Container();
        static::$container->set(Config::class, fn() => new Config($_ENV));
        static::$container->set('DB', function($container) {
            return new Database(
                $container->get(Config::class)->db
            );
        });
    }
    public function register()
    {
        static::$container->set('Auth', function ($container) {
            return new Auth(
                $container->get('DB')->getConnection()->getPdo()
            );
        });
        static::$container->set('Hash', fn() => new Hash());
        static::$container->set(Request::class, fn() => new Request());
        static::$container->set(GiaoHangInterface::class, GiaoHangNhanh::class);
        static::$container->set(ThanhToanGateway::class, VNPay::class);
        static::$container->set(GiaoHang::class, function ($container) {
            return new GiaoHang(
                new GiaoHangNhanh($container->get(Config::class))
            );
        });
        static::$container->set(DiaChi::class, fn() => new DiaChi(app(Config::class)));
        static::$container->set(GiaoHangNhanh::class, fn() => new GiaoHangNhanh(app(Config::class)));
        static::$container->set(Cart::class, function () {
            return new Cart([
                'cartMaxItem'      => 0,
                'itemMaxQuantity'  => 99,
                'useCookie'        => true,
            ]);
        });
        static::$container->set(Wishlist::class, function () {
            return new Wishlist([
                'useCookie'        => true,
            ]);
        });
        static::$container->set(InvoiceService::class, function(Container $container) {
            return new InvoiceService(
                $container->get(PaymentGatewayInterface::class),
                $container->get(EmailService::class)
            );
        });
        static::$container->set(PaymentGatewayInterface::class, VnPayGateway::class);
    }
    public function run()
    {
        try {
            echo Router::resolve(
                $this->requestUri,
                $this->requestMethod
            );
        } catch (RouteNotFoundException) {
            echo View::make('errors/404.php', [])->render();
        }
    }
}
