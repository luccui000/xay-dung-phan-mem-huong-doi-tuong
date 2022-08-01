<?php

namespace Luccui\Classes;

use Luccui\Helpers\Config;
use PHPMailer\PHPMailer\PHPMailer;

class Mailer extends PHPMailer
{
    public function __construct(
        $exceptions = null
    ){
        $config = app(Config::class)->mailer;
        parent::__construct($exceptions);
        if($config['mailer'] == 'smtp') {
            $this->isSMTP();
        }
        $this->Host         = $config['host'];
        $this->SMTPAuth     = true;
        $this->Username     = $config['username'];
        $this->Password     = $config['password'];
        $this->Port         = $config['port'];
        $this->SMTPSecure   = $config['encryption'];
        $this->setLanguage('vi');
        $this->setFrom(
            $config['from_address'],
            $config['from_name'],
        );
    }

    /**
     * @throws \PHPMailer\PHPMailer\Exception
     */
    public static function sendTo(string $to, string $subject, string $body, $isHtml = false)
    {
        $mailer = new static();
        $mailer->addAddress($to);
        $mailer->isHTML($isHtml);
        $mailer->Subject = $subject;
        $mailer->Body = $body;
        $mailer->setLanguage('vi');
        try {
            $mailer->send();
        } catch (\Exception $exception) {

        }
    }
}
