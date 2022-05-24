<?php

namespace Luccui\Services\PaymentGateway;

class VnPayGateway implements PaymentGatewayInterface
{
    public function charge($amount)
    {
        echo "VnPay Gateway charge <br />";
    }
}
