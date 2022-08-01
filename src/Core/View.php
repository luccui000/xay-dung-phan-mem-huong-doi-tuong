<?php

namespace Luccui\Core;

use Luccui\Exceptions\ViewNotFoundException;

class View
{
    public function __construct(
        public string $viewPath,
        public array $params
    ) {
    }
    public static function make(string $viewPath, array $params)
    {
        return new static($viewPath, $params);
    }

    /**
     * @throws ViewNotFoundException
     */
    public function render($isHtml = false)
    {
        $fullPath = BASE_APP . "/resources/views/" . trim($this->viewPath, "/");
        if (!file_exists($fullPath))
            throw new ViewNotFoundException();
        extract($this->params);
        ob_start();
        include $fullPath;
        $content = ob_get_contents();
        ob_get_clean();
        if($isHtml)
            return $content;
        return TemplateEngine::run($content);
    }
}
