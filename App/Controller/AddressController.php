<?php
namespace App\Controller;

use App\Core\Request;
use \App\DB\QueryBuilder; 
class AddressController 
{
    public function index()
    {
        $addresses = QueryBuilder::get("addresses_book");
        require "App/Resources/index.view.php";
    }

    public function add()
    {
        require "App/Resources/create.view.php";
    }
    public function search()
    {
        $addresses=[];
        $str = Request::get('search');
        $search = explode(' ',$str);
        if(count($search) == 2)
        {
            $data = ["first_name" => "%".$search[0]."%", "last_name" => "%".$search[1]."%"];
            $addresses = QueryBuilder::like("addresses_book", $data);
        }
        else{
            foreach($search as $item)
            {
                $data= array_fill(0,7,$item);
                $addresses = array_merge($addresses,QueryBuilder::search("addresses_book",$data));
            }
        }

        require "App/Resources/index.view.php";
    }

    public function create()
    {
        $data = [];
        empty($_POST['first_name']) ? :$data['first_name'] = $_POST['first_name'];
        empty($_POST['last_name']) ? : $data['last_name'] = $_POST['last_name'];
        empty($_POST['mobile']) ? : $data['mobile'] = $_POST['mobile'];
        empty($_POST['email']) ? : $data['email'] = $_POST['email'];
        empty($_POST['title']) ? : $data['title'] = $_POST['title'];
        empty($_POST['company']) ? : $data['company'] = $_POST['company'];
        empty($_POST['telephone']) ? : $data['telephone'] = $_POST['telephone'];
        //die(var_dump($data));
        //$data = !empty($t);
        QueryBuilder::create("addresses_book",$data);
        header("location:../");
    }

    public function update()
    {
        $id = Request::get('id');
        $data = [];
        empty($_POST['first_name']) ? :$data['first_name'] = $_POST['first_name'];
        empty($_POST['last_name']) ? : $data['last_name'] = $_POST['last_name'];
        empty($_POST['mobile']) ? : $data['mobile'] = $_POST['mobile'];
        empty($_POST['email']) ? : $data['email'] = $_POST['email'];
        empty($_POST['title']) ? : $data['title'] = $_POST['title'];
        empty($_POST['company']) ? : $data['company'] = $_POST['company'];
        empty($_POST['telephone']) ? : $data['telephone'] = $_POST['telephone'];
        QueryBuilder::update("addresses_book",$id,$data);
        header("location:../");
    }

    public function view()
    {
        $id = Request::get('id');
        $address = QueryBuilder::get("addresses_book",['id'=>$id]);
        require "App/Resources/edit.view.php";
    }

    public function delete()
    {
        $id = Request::get('id');
        QueryBuilder::delete('addresses_book',$id);
        header("location:../");
    }

}