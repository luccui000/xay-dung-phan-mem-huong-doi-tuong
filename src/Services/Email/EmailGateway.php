<?php

namespace Luccui\Services\Email;

interface EmailGateway
{
    public function send($from, $to, $content);
}
