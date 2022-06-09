<?php

namespace Luccui\Classes;

class GlobalSearch
{
    protected array $blocklist = [
        'admin',
        'admin\/'
    ];

    public function __construct(string $url)
    {
        $this->search($url);
    }

    public function search($url = '')
    {
        $flag = 0;
        foreach ($this->blocklist as $blockItem) {
            $flag = preg_match("/$blockItem/", $url);
        }
        if($flag)
            return ;
        if(isset($_GET['q'])) {
            $q = $_GET['q'];
            var_dump($url);
        }
    }
}
