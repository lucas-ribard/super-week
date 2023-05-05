<?php
namespace App\Model;

use PDO;

class BookModel
{

    public function findAll()
    {

        $bdd = new PDO('mysql:host=localhost;dbname=Super-Week', 'root', '');

        $sql = 'SELECT * FROM book ';

        $request = $bdd->prepare($sql);
        $request->execute();

        $list_Books = $request->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($list_categ);
        return $list_Books;

    }
    public function writeBook()
    {
        //init bdd
        $bdd = new PDO('mysql:host=localhost;dbname=Super-Week', 'root', '');

        //check if user exist
        $sql = 'SELECT COUNT(title) FROM book WHERE title = :title';
        $request = $bdd->prepare($sql);
        $request->bindValue(':title', $_POST['title']);
        $request->execute();
        $UserTaken = $request->fetch(PDO::FETCH_ASSOC);

        //si l'user est disponible
        if ($UserTaken['COUNT(title)'] === 0) {
            //register user
            $sql = 'INSERT INTO `book`(`title`,`content`, `id_user`) VALUES (:title,:content,:id_user)';

            $request = $bdd->prepare($sql);

            
            $request->bindValue(':title', $_POST['title']);
            $request->bindValue(':content', $_POST['content']);
            if (isset($_POST['id_user'])){
                $request->bindValue(':id_user', $_POST['id_user']);
            }else{
                $request->bindValue(':id_user', 0);
            }
            return $request->execute();
        }
        else {
            echo "Ce Titre est déja utilisé<br>";
            echo '<a href="/super-week/books/write"> Retour à books/write</a>';
        }

    }

    public function SeeBookInfo($id)
    {

        $bdd = new PDO('mysql:host=localhost;dbname=Super-Week', 'root', '');

        $sql = 'SELECT * FROM book where id = :id';

        $request = $bdd->prepare($sql);
        $request->bindValue(':id', $id);
        $request->execute();

        $list_Books = $request->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($list_categ);
        return $list_Books;

    }

}

