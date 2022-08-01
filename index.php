<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-BNQ9ZTCBBN"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-BNQ9ZTCBBN');
</script>
<?php
session_start();

header("Content-type: text/html; charset=utf-8");

use Luccui\Classes\GlobalSearch;
use Luccui\Core\Application;

require_once "./vendor/autoload.php";
require_once "./src/helpers.php";
require_once "define.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once "./routes/web.php";
require_once "./routes/api.php";

//new GlobalSearch($_SERVER['REQUEST_URI']);

(new Application(
    $_SERVER['REQUEST_URI'] != "/" ?
        rtrim($_SERVER['REQUEST_URI'], '/') :
        $_SERVER['REQUEST_URI'],
    strtolower($_SERVER['REQUEST_METHOD'])
))->run();
