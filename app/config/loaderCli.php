<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    array(
        APP_PATH . $config->application->tasksDir
    )
)->register();

$loader->registerNamespaces(
    array(
        'App\Assets' => APP_PATH . $config->application->assetsDir
    )
);
