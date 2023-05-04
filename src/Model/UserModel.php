<?php
namespace App\Model;

use PDO;

class UserModel
{

    public function findAll()
    {

        $bdd = new PDO('mysql:host=localhost;dbname=Super-Week', 'root', '');

        $sql = 'SELECT * FROM user ';

        $request = $bdd->prepare($sql);
        $request->execute();


        $list_users = $request->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($list_categ);
        return $list_users;

    }
    public function register()
    {
        //init bdd
        $bdd = new PDO('mysql:host=localhost;dbname=Super-Week', 'root', '');

        //check if user exist
        $sql = 'SELECT COUNT(username) FROM user WHERE username = :username';
        $request = $bdd->prepare($sql);
        $request->bindValue(':username', $_POST['username']);
        $request->execute();
        $UserTaken = $request->fetch(PDO::FETCH_ASSOC);

        //si l'user est disponible
        if ($UserTaken['COUNT(username)'] === 0) {
            //register user
            $sql = 'INSERT INTO `user`(`username`,`password`, `email`, `first_name`, `last_name`) VALUES (:username,:password,:email,:first_name,:last_name)';

            $request = $bdd->prepare($sql);

            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $request->bindValue(':username', $_POST['username']);
            $request->bindValue(':password', $password);
            $request->bindValue(':email', $_POST['email']);
            $request->bindValue(':first_name', $_POST['prenom']);
            $request->bindValue(':last_name', $_POST['nom']);

            return $request->execute();
        }
        else {
            return "Ce nom d'utilisateur est déja utilisé";
        }

    }
}