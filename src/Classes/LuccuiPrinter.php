<?php

namespace Luccui\Classes;

use Konekt\PdfInvoice\InvoicePrinter;

class LuccuiPrinter extends InvoicePrinter
{
    public function __construct($size = self::INVOICE_SIZE_A4, $currency = '', $language = 'vi')
    {
        parent::__construct($size, $currency, $language);
    }
    public function price($price)
    {
        return vnmoney($price, false);
    }
}
