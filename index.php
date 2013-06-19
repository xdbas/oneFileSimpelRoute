<?php
session_start();
error_reporting(-1);

chdir(__DIR__);
define('BASE', realpath('.').DIRECTORY_SEPARATOR);


$uri = trim(str_replace($_SERVER['SCRIPT_NAME'], '', $_SERVER['PHP_SELF']), '/');
$segments = strpos($uri, '/') !== false
                ? explode('/', $uri)
                : array(
                    0 => $uri
                );


/**
 * Example code
 */
$route = function ($segments) {

    /**
     * Here is it about all you wanna do, basically this closure gets executed
     * with the segment array as parameter. Here you can perform checks and
     * build your own custom routing code.
     *
     * For example you could make sure the first param is always the name of the
     * file without the php extension or you could match the first 2 params with
     * folders/filename and you could send through the rest of the segments for
     * params used in the request for instance: folder1/file1/id/55
     */

    /**
     * example route
     */

    /**
     * Only 1 segment? load php file
     */
    if (count($segments) == 1) {
        require_once BASE . $segments[0].'.php';
    }

    /**
     * More than one segment? indent into folder then load the file
     * the rest of the segments are parameters for the page
     */
    if (count($segments) > 1) {
        if (is_dir($segments[0])) {
            require_once $segments[0].'/'.$segments[1].'.php';
        }
    }
};

$route($segments);
