<?php
use \App\DBConnection\MYSQLConnection;
use \App\app;
require "DBConnection.php";
require "C:/xampp/htdocs/address_book/App/app.php";

App::set('config',require "C:/xampp/htdocs/address_book/config.php");




try{
$connect = MYSQLConnection::connect(App::get('config')['DB']);
$query ="CREATE database addresses_book";
$statement = $connect->prepare($query);
$statement->execute();
echo "created";
}catch(\PDOException $e)
{
    die($e->getMessage());
}