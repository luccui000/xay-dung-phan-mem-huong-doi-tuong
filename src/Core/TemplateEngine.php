<?php

namespace Luccui\Core;

class TemplateEngine
{
    public static function run($content)
    {
        $template = new static();
        $template->process($content);
        return eval("?> $content <?php");
    }
    public function process(&$content): void
    {
        preg_match_all("~{{\s*(.+?)\s*}}~is", $content, $matches);
        if(!empty($matches[1])) {
            foreach ($matches[1] as $key => $value) {
                $content = str_replace($matches[0][$key], "<?php echo htmlentities(". $value .") ?>", $content);
            }
        }
        preg_match_all("~{!\s*(.+?)\s*!}~is", $content, $matches);
        if(!empty($matches[1])) {
            foreach ($matches[1] as $key => $value) {
                $content = str_replace($matches[0][$key], "<?php echo ". $value ." ?>", $content);
            }
        }
    }
}
