<?php

$_urlBase = "http://MC_CONSTRUCION_SW.test/";
$host = '127.0.0.1';
$namedb = 'dbsistema';
$userdb = 'root';
$passwordb = '';

function get_UrlBase($arg1)
{
    return $GLOBALS['_urlBase'] . $arg1;
}

function get_views($arg1)
{
    return $GLOBALS['_urlBase'] . 'views/' . $arg1;
}

function get_models($arg1)
{
    return $GLOBALS['_urlBase'] . 'models/' . $arg1;
}
function get_controllers($arg1)
{
    return $GLOBALS['_urlBase'] . 'controllers/' . $arg1;
}
?>
