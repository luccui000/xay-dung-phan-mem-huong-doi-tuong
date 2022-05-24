<?php

namespace Luccui\Services\PaymentGateway;

interface PaymentGatewayInterface
{
    public function charge($amount);
}
