<?php

    define('APP_PATH', realpath('../../') . '/');

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
//    $application = new \Phalcon\Mvc\Application($di);
//    $di->get('assets'); die;
    var_dump(new \App\Assets\Manager); die;
    print_r($application->assets);

    $application->assets->createBowerPackages();