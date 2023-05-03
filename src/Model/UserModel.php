<?php
namespace App\Model;
use PDO;

class UserModel{
    
    public function findAll(){
      
    $bdd = new PDO('mysql:host=localhost;dbname=Super-Week', 'root', '');
   
    $sql =  'SELECT * FROM user ';

    $request = $bdd->prepare($sql);
    $request->execute();
  

    $list_users = $request->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($list_categ);
    return $list_users;

    }
}