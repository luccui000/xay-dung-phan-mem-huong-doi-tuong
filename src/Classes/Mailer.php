<?php

namespace Luccui\Classes;

use Luccui\Exceptions\MethodNotFoundException;
use Luccui\Exceptions\PropertyNotFoundException;
use PHPMailer\PHPMailer\PHPMailer;

class Mailer extends PHPMailer
{
    public function __construct(
        private array $config,
        $exceptions = null
    ){

        parent::__construct($exceptions);
        if($this->config['mailer'] == 'smtp') {
            $this->isSMTP();
        }
        $this->Host         = $this->config['host'];
        $this->SMTPAuth     = true;
        $this->Username     = $this->config['username'];
        $this->Password     = $this->config['password'];
        $this->Port         = $this->config['port'];
        $this->SMTPSecure   = $this->config['encryption'];
        $this->setLanguage('vi');
        $this->setFrom(
            $this->config['from_address'],
            $this->config['from_name'],
        );
    }
    public function addSubject(string $subject)
    {
        $this->Subject = $subject;
        return $this;
    }
    public function addBody(string $body)
    {
        $this->Body = $body;
        return $this;
    }
    public function addAltBody($alterBody)
    {
        $this->AltBody = $alterBody;
        return $this;
    }
    /**
     * @throws PropertyNotFoundException
     */
    public function __get($name)
    {
        if(property_exists($this, $name)) {
            $className = get_class($this);
            throw new PropertyNotFoundException("Class $className hasn't $name property");
        }
        return $this->$name;
    }
    /**
     * @throws MethodNotFoundException
     */
    public function __call(string $method, array $arguments)
    {
        if(!method_exists($this, $method)) {
            throw new MethodNotFoundException("Method {$method} not found");
        }
        call_user_func_array([$this, $method], $arguments);
        return $this;
    }
}
