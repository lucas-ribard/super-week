<?php 
namespace App\Controller;

use App\Model\BookModel;
use App\Model\UserModel;


class BookController{

    public function findAll(){
        $BookModel = new BookModel;
        $list_Books = $BookModel->findAll();

        // & transforme l'array en référence plutot que de créer une nouvelle instance
        foreach ($list_Books as &$Book){

            //si le livre n'a pas d'auteur
           if ($Book['id_user'] == 0){

            array_pop($Book);
            $Book += [ "autor" => 'Auteur Anonyme' ];

           }
           
           else{
            $UserModel = new Usermodel;
            $AutorUsername = $UserModel->FindUserFromId($Book['id_user']);
            array_pop($Book);
            $Book += [ "autor" => $AutorUsername['username'] ];
           }
        }

        return json_encode($list_Books);
        
    }
    public function writeBook(){
        $BookModel = new BookModel;
        $BookModel->writeBook();
    }

}

