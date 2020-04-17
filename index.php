<?php

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');

use \Slim\App;
require 'vendor/autoload.php';
require 'config/config.php';


$app = new \Slim\App(['settings' => $config]);

$container = $app->getContainer();


$container['db'] = function ($c) {
    $db = $c['settings']['db'];
    $pdo = new PDO('mysql:host=' . $db['host'] . ';dbname=' . $db['dbname'],
        $db['user'], $db['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};

$container['logger'] = function($c) {
    $logger = new \Monolog\Logger('my_logger');
    $file_handler = new \Monolog\Handler\StreamHandler('../logs/app.log');
    $logger->pushHandler($file_handler);
    return $logger;
};

require_once 'src/Routes/routes.php';

$app->run();