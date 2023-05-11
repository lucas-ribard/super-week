<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
</head>
<body>
    

<script defer src=index.js></script>
<?php

$AllUsers = $UserController->list();
$AllUsers = json_decode($AllUsers, true);

$AllBooks = $BookController->findAll();
$AllBooks = json_decode($AllBooks, true);

?>
<br>
<button id="BTusers" onclick="FetchContent('users')">tout les users</button>
<button id="BTusers" onclick="FetchContent('books')">tout les livres</button>
<br>


<select id="users">
    <?php
    foreach ($AllUsers as $user) {
        echo "<option value='" . $user['id'] . "'>" . $user['username'] . "</option>";
    }
    ?>
</select>
<button id="BTusers" onclick="FetchContentWithId('users')">Voir cet utilisateur</button>
<!-- foreach book -->
<select id="books">
<?php
    foreach ($AllBooks as $book) {
        echo "<option value='" . $book['id'] . "'>" . $book['title'] . "</option>";
    }
    ?>
</select>
<button id="BTusers" onclick="FetchContentWithId('books')">Voir ce Livre</button>

<main id='Main'>
</main>

</body>
</html>