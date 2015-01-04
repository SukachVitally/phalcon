<?php

error_reporting(E_ALL);

try {
    define('APP_PATH', realpath('..') . '/');

    /**
     * Read the configuration
     */
    $config = new Phalcon\Config\Adapter\Ini(APP_PATH . 'app/config/config.ini');

    /**
     * Read auto-loader
     */
    include APP_PATH  . "app/config/loader.php";

    /**
     * Read services
     */
    include APP_PATH . "app/config/services.php";

    /**
     * Handle the request
     */
    $application = new \Phalcon\Mvc\Application($di);

    echo $application->handle()->getContent();

} catch (\Exception $e) {
    echo $e->getMessage();
}
