<?php

namespace Luccui\Core;

class Request
{
    protected array $inputs = [];

    public function __construct()
    {
        if(count($_GET) > 0) {
            foreach ($_GET as $key => $value) {
                $this->inputs['query'][$key] = $value;
            }
        }
        if(count($_POST) > 0) {
            foreach ($_POST as $key => $value) {
                $this->inputs[$key] = $value;
            }
        }
        if(count($_FILES) > 0) {
            $this->inputs['file'] = [];
            foreach ($_FILES as $key => $value) {
                $this->inputs['file'][$key] = $value;
            }
        }
    }

    public function hasFile()
    {
        return count($_FILES) > 0;
    }
    public static function all($isArray = true)
    {
        $result = array_merge($_GET, $_POST);
        return json_decode(json_encode($result), $isArray);
    }
    public function has($key)
    {
        return array_key_exists($key, static::all());
    }
    public function __set($name, $value)
    {
        $this->inputs[$name] = $value;
    }
    public function __get($name)
    {
        if(!isset($this->inputs[$name]))
            return null;
        return $this->inputs[$name];
    }
}
