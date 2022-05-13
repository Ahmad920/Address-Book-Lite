<?php
namespace App;

class app
{
    private static $entities =[];

    public static function get($key,$default= null)
    {
        return self::$entities[$key] ?? $default;
    }

    public static function set($key,$value)
    {
        self::$entities[$key] = $value;
    }
}