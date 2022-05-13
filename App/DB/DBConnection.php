<?php
namespace App\DB;

class MYSQLConnection
{
    private static $connect;
    public static function connect($config)
    {
        try{
        self::$connect = self::$connect?: new \PDO("mysql:host={$config['host']};dbname={$config['name']}",$config['user'],$config['password']);
        //echo "connected";
        return self::$connect;
        }catch(\PDOException $e){
            die($e->getMessage());
        }
    }
}