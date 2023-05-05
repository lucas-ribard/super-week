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

    public function login(){
        $UserModel = new UserModel;
        return $UserModel->login();
        
    }

    public function seeUserInfo($id){
        $UserModel = new UserModel;
        return json_encode($UserModel->seeUserInfo($id)) ;
        
    }
}

