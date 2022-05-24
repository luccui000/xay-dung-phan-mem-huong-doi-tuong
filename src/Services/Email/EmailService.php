<?php

namespace Luccui\Services\Email;

class EmailService implements EmailGateway
{
    public function send($from, $to, $content)
    {
        echo "Sending email from {$from} to {$to} with content {$content} <br />";
    }
}
