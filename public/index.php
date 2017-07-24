<?php

use Interop\Container\ContainerInterface;
use Zend\Expressive\Application;

// Delegate static file requests back to the PHP built-in webserver
if (php_sapi_name() === 'cli-server'
    && is_file(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))
) {
    return false;
}

chdir(dirname(__DIR__));

define('APPLICATION_PATH', __DIR__ . '/..');

require APPLICATION_PATH . '/vendor/autoload.php';

/**
 * Self-called anonymous function that creates its own scope and keep the global namespace clean.
 */
call_user_func(function () {
    /** @var ContainerInterface $container */
    $container = require APPLICATION_PATH . '/config/container.php';

    /** @var Application $app */
    $app = $container->get(Application::class);

    // Import programmatic/declarative middleware pipeline and routing
    // configuration statements
    require APPLICATION_PATH . '/config/pipeline.php';
    require APPLICATION_PATH . '/config/routes.php';

    $app->run();
});
