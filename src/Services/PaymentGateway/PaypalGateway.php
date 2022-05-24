<?php

namespace Luccui\Services\PaymentGateway;

class PaypalGateway implements PaymentGatewayInterface
{
    public function charge($amount)
    {
        echo "Charging {$amount} <br />";
    }
}
