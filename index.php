<?php

define('ROOT', '.' . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'app' . DIRECTORY_SEPARATOR);
define('VIEWS', ROOT . 'views' . DIRECTORY_SEPARATOR);
define('CORE', APP . 'core' . DIRECTORY_SEPARATOR);
define('CONTROLLERS', APP . 'controllers' . DIRECTORY_SEPARATOR);
define('MODELS', APP . 'models' . DIRECTORY_SEPARATOR);

require_once ROOT . 'App.php';

/**
 * console_log is a function that prints its arguments into the browser's console
 * Since it's defined here, it exists globally in the application
 */
function console_log()
{
    $args = func_get_args();

    print("<script>");
    foreach ($args as $arg) {
        print("console.log(" . json_encode($arg) . ");");
    }
    print("</script>");
}

$app = new App();
