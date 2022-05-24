<?php

namespace Luccui\Core;

use Luccui\Classes\Container;
use Luccui\Classes\DB;
use Luccui\Exceptions\RouteNotFoundException;
use Luccui\Helpers\Config;
use Luccui\Services\Email\EmailService;
use Luccui\Services\Invoice\InvoiceService;
use Luccui\Services\PaymentGateway\PaymentGatewayInterface;
use Luccui\Services\PaymentGateway\VnPayGateway;

class Application
{
    public static Container $container;
    public Config $config;

    public function __construct(
        public Router $router,
        public string $requestUri,
        public string $requestMethod
    ) {
        $this->register();
        $this->boot();
        $this->config = new Config($_ENV);
    }

    public function boot()
    {
        static::$container->set('DB', fn() => DB::getInstance($this->config->db));
    }
    public function register()
    {
        static::$container = new Container();
        static::$container->set(Request::class, fn() => new Request());
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
            echo $this->router->resolve(
                $this->requestUri,
                $this->requestMethod
            );
        } catch (RouteNotFoundException) {
            echo View::make('errors/404.php', [])->render();
        }
    }
}
