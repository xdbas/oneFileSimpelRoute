<?php
session_start();
error_reporting(-1);

chdir(__DIR__);
define('BASE', realpath('.').DIRECTORY_SEPARATOR);


$uri = trim(str_replace($_SERVER['SCRIPT_NAME'], '', $_SERVER['PHP_SELF']), '/');
$segments = strpos($uri, '/') !== false
                ? explode('/', $uri)
                : array(0=>$uri);

print_r($segments);