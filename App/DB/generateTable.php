<?php
use \App\DB\MYSQLConnection;
use \App\app;
require "DBConnection.php";
require "C:/xampp/htdocs/address_book/App/app.php";

App::set('config',require "C:/xampp/htdocs/address_book/config.php");




try{
$connect = MYSQLConnection::connect(App::get('config')['DB']);
$query ="CREATE table addresses_book(
         id int primary key not null auto_increment,
         first_name varchar(200) not null,
         last_name varchar(200) not null,
         mobile int not null unique,
         email varchar(200) null,
         comapny varchar(200) null,
         telephone int null
)";
$statement = $connect->prepare($query);
$statement->execute();
echo "created";
}catch(\PDOException $e)
{
    die($e->getMessage());
}