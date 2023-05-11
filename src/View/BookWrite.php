<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout de Livre</title>
</head>
<body>

<form method="post">
    <input name="title" placeholder="Titre" required></input><br>
    <textarea name="content" rows="5" cols="33" placeholder="Contenu du livre" required></textarea><br>
    <?php 
    if (isset($_SESSION['username'])){
        echo '<input name="id_user" value="'.$_SESSION['id'].'" hidden/>';
    }
    ?>
    <button type="submit">Envoyer</button>
</form>

</body>
</html>