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
    require APP_PATH  . "app/config/loader.php";

    /**
     * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
     */
    $di = new \Phalcon\DI\FactoryDefault();

    /**
     * Read services
     */
    require APP_PATH . "app/config/services.php";

    /**
     * Handle the request
     */
    $application = new \Phalcon\Mvc\Application($di);

    echo $application->handle()->getContent();

} catch (\Exception $e) {
    echo $e->getMessage();
}
