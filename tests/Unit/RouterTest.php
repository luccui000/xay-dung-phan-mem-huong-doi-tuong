<?php

namespace Unit;

use Luccui\Exceptions\RouteNotFoundException;
use Luccui\Helpers\Router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    private Router $router;

    public function setUp(): void
    {
        $this->router = new Router();
    }
    /** @test */
    public function it_register_a_new_route()
    {
        $this->router->register('get', '/users', ['UserController', 'index']);
        $expected = [
            'get' => [
                '/users' => ['UserController', 'index']
            ]
        ];
         return $this->assertEquals($expected, $this->router->getRoutes());
    }
    /** @test */
    public function it_register_a_new_get_route()
    {
        $this->router->get('/users', ['UserController', 'index']);
        $expected = [
            'get' => [
                '/users' => ['UserController', 'index']
            ]
        ];
        return $this->assertEquals($expected, $this->router->getRoutes());
    }
    /** @test */
    public function it_register_a_new_post_route()
    {
        $this->router->post('/users/store', ['UserController', 'store']);
        $expected = [
            'post' => [
                '/users/store' => ['UserController', 'store']
            ]
        ];
        return $this->assertEquals($expected, $this->router->getRoutes());
    }
    /**
     * @test
     * @dataProvider routeNotFound
     */
    public function it_throw_a_route_not_found_exception(
        string $requestUri,
        string $requestMethod
    ) {
        $class = new class {
            public function index()
            {

            }
        };
        $this->router->get('/user', [$class, 'index']);
        $this->expectException(RouteNotFoundException::class);
        $this->router->resolve($requestUri, $requestMethod);
    }
    public function routeNotFound()
    {
        return [
            [ 'foo' => 'bar']
        ];
    }
}
