<?php 
namespace App\Controller;

use App\Model\UserModel;

class UserController{
    public function fill(){
        $UserModel = new UserModel;
        $UserModel->insert();
    }
}