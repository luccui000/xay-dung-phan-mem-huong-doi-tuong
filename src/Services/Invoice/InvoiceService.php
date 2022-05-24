<?php

namespace Luccui\Services\Invoice;

use Luccui\Services\Email\EmailService;
use Luccui\Services\PaymentGateway\PaymentGatewayInterface;

class InvoiceService
{
    public function __construct(
        public PaymentGatewayInterface $paypalGateway,
        public EmailService $emailService
    )
    {
    }
    public function handle()
    {
        $this->paypalGateway->charge(100);
        $this->emailService->send("luccui@gmail.com", "gmail@luccui.com", "Invoice");
        echo "Done";
    }
}
