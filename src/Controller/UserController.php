<?php 
namespace App\Controller;

use App\Model\UserModel;

class UserController{
    public function list(){
        $UserModel = new UserModel;
        $UserModel = json_encode($UserModel->findAll());
        return $UserModel;

    }
}