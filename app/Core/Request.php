<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Request
{
    public static function uri()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = str_replace('php', '', $uri);
        return  trim($uri, '/');

    }

    public static function get($key, $default = null)
    {
        return $_GET[$key] ?? $_POST[$key] ?? $default;
    }

    public static function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}
