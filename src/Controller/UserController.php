<?php 
namespace App\Controller;

use App\Model\UserModel;

class UserController{
    public function list(){
        $UserModel = new UserModel;
        $UserModel = json_encode($UserModel->findAll());
        return $UserModel;

    }

    public function register(){
        $UserModel = new UserModel;
        return $UserModel->register();
        
    }
}