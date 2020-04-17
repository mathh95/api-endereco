<?php

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$config['db']['host']   = "localhost";
$config['db']['user']   = "root";
$config['db']['pass']   = "";
$config['db']['dbname'] = "estado_cidade";
$config['db']['charset'] = "utf8mb4";

$config['logger']['name'] = "slim-app";
$config['logger']['level'] = Monolog\Logger::DEBUG;
$config['logger']['path'] = '../logs/app.log';