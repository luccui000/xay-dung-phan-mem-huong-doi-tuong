<?php

namespace Unit;

require_once "vendor/autoload.php";
use Dotenv\Dotenv;
use Luccui\Helpers\Config;
use Luccui\Services\GiaoHang\GiaoHangNhanh;
use PHPUnit\Framework\TestCase;

class GiaoHangNhanhTest extends TestCase
{
    private GiaoHangNhanh $ghn;

    protected function setUp(): void
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
        $dotenv->load();
        $this->ghn = new GiaoHangNhanh(new Config($_ENV));
    }

    /** @test */
    public function it_tinh_phi()
    {
        $result = $this->ghn->tinhPhi(141213, 2255, 50, 20, 200, 20);
        var_dump($result);
        $this->assertArrayHasKey('total', $result);
    }

    /** @test */
    public function it_lay_dich_vu()
    {
         $result = $this->ghn->layDichVu(2255);
         $this->assertIsArray($result);
    }
}
