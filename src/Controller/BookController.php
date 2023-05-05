<?php 
namespace App\Controller;

use App\Model\BookModel;

class BookController{
    public function writeBook(){
        $BookModel = new BookModel;
        $BookModel->writeBook();
    }

}

