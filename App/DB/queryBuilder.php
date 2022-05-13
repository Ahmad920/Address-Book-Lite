<?php
namespace App\DB;
//use \App\DB\MYSQLConnection;

//require "App/DB/DBConnection.php";

class QueryBuilder
{
    private static $connect;

    public static function make(\PDO $connect)
    {
        self::$connect = $connect;
    }

    public static function get($table,$search=[])
    {
        if(empty($search))
        {
            $query = "select * from $table";
            $result = self::execute($query);
        }
        else 
        {
            $where = implode("=? && ",array_keys($search))."=?";
            $query = "select * from $table where $where";
            //echo $query;
            $result = self::execute($query,array_values($search));
        }

        return $result->fetchAll(\PDO::FETCH_CLASS,'Address');
    }

    public static function like($table,$search=[])
    {
        
        $where = implode(" like ? and ",array_keys($search))." like ?";
        $query = "select * from $table where $where";
        $result = self::execute($query,array_values($search));
        return $result->fetchAll(\PDO::FETCH_CLASS,'Address');
    }

    public static function create($table, $data)
    {
        $fields = implode(', ',array_keys($data));
        $values = str_repeat("?,",count($data)-1)."?";
        $query = "INSERT INTO $table ($fields) VALUES ($values)";
        //die(var_dump($query));
        self::execute($query,array_values($data));
    }

    public static function update($table, $id, $data)
    {
        $fields = implode('= ?, ',array_keys($data))."= ?";
        $query = "update $table set $fields where id = $id";
        self::execute($query, array_values($data));
    }

    public static function delete($table , $id)
    {
        $query = "delete from $table where id = $id";
        self::execute($query);
    }

    public static function execute($query, $value = null)
    {
        $statement = self::$connect->prepare($query);
        //die(var_dump($query));
        $statement->execute($value);
        return $statement;
    }

    public static function search($table,$search=[])
    {
        $where = "first_name=? or last_name=? or mobile=? or email=? or title=? or company=? or telephone=?";
        $query = "select * from $table where ".$where;
        $result = self::execute($query,array_values($search));
        return $result->fetchAll(\PDO::FETCH_CLASS,'Address');
    }
}