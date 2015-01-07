<?php

use Phalcon\DI\FactoryDefault\CLI as CliDI,
    Phalcon\CLI\Console as ConsoleApp;

define('VERSION', '1.0.0');

// Define path to application directory
define('APP_PATH', realpath(dirname('..')) . '/');

//Using the CLI factory default services container
$di = new CliDI();

$config = new Phalcon\Config\Adapter\Ini(APP_PATH . 'app/config/config.ini');

/**
 * Read loader
 */
require APP_PATH . "app/config/loaderCli.php";

/**
 * Read services
 */
require APP_PATH . "app/config/servicesCli.php";

//Create a console application
$console = new ConsoleApp();
$console->setDI($di);

/**
 * Process the console arguments
 */
$arguments = array();
foreach($argv as $k => $arg) {
    if($k == 1) {
        $arguments['task'] = $arg;
    } elseif($k == 2) {
        $arguments['action'] = $arg;
    } elseif($k >= 3) {
        $arguments['params'][] = $arg;
    }
}

// define global constants for the current task and action
define('CURRENT_TASK', (isset($argv[1]) ? $argv[1] : null));
define('CURRENT_ACTION', (isset($argv[2]) ? $argv[2] : null));

try {
    // handle incoming arguments
    $console->handle($arguments);
}
catch (\Phalcon\Exception $e) {
    echo $e->getMessage();
    exit(255);
}