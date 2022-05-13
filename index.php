<?php
use \App\DB\MYSQLConnection;
use \App\app;
use \App\Controller\AddressController;
use \App\Core\Request;
use \App\Core\Route;
use \App\DB\QueryBuilder;
// require "App/DB/DBConnection.php";
// require "App/app.php";
// require "App/DB/queryBuilder.php";
// require "App/Core/request.php";
// require "App/Core/route.php";
// require "App/Controller/AddressController.php";

require "vendor/autoload.php";
class Address
{
    public $id;
    public $first_name;
    public $last_name;
    public $mobile;
    public $telephone;
    public $title;
    public $company;
    public $email;
    
}

App::set('config',require "config.php");

$connect = MYSQLConnection::connect(App::get('config')['DB']);

QueryBuilder::make($connect);

Route::make()
->get('',[AddressController::class,'index'])
->get('address/add',[AddressController::class,'add'])
->post('address/create',[AddressController::class,'create'])
->get('address/delete',[AddressController::class,'delete'])
->get('address/view',[AddressController::class,'view'])
->post('address/update',[AddressController::class,'update'])
->get('address/search',[AddressController::class,'search'])
->resolve(Request::uri(),Request::method());


// $route = new Route;
// $route->get('',[AddressController::class,'index']);
// $route->resolve(Request::uri(),Request::method());

//QueryBuilder::create("addresses_book",['first_name'=>'mohammad','last_name' => 'ashour', 'mobile' => '12677123']);
//QueryBuilder::update("addresses_book",1,["first_name"=>"AHMED"]);
//QueryBuilder::delete("addresses_book",3);
// $result = QueryBuilder::get("addresses_book",["first_name"=>"AHMED","last_name"=>"ashour"]);
// echo "<pre>";
// print_r($result);
// echo "</pre>";