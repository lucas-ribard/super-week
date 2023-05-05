<?php
namespace App\Controller;

use App\Model\BookModel;
use App\Model\UserModel;


class BookController
{

    public function findAll()
    {
        $BookModel = new BookModel;
        $list_Books = $BookModel->findAll();
        //replace user id by the autor username
        $list_Books = $this->replaceAuthor($list_Books);
        return json_encode($list_Books);

    }
    public function writeBook()
    {
        $BookModel = new BookModel;
        $BookModel->writeBook();
    }

    public function SeeBookInfo($id)
    {
        $BookModel = new BookModel;
        $list_Books = $BookModel->SeeBookInfo($id);
        //replace user id by the autor username
        $list_Books = $this->replaceAuthor($list_Books);
        return json_encode($list_Books);

    }

    //replace user id by the autor username
    public function replaceAuthor($list_Books)
    {

        foreach ($list_Books as &$Book) {

            //si le livre n'a pas d'auteur
            if ($Book['id_user'] == 0) {

                array_pop($Book);
                $Book += ["autor" => 'Auteur Anonyme'];

            } else {
                $UserModel = new Usermodel;
                $AutorUsername = $UserModel->FindUserFromId($Book['id_user']);
                array_pop($Book);
                $Book += ["autor" => $AutorUsername['username']];
            }
        }

        return $list_Books;
    }
}