<form method="post">
    <input name="title" placeholder="Titre" required></input><br>
    <textarea name="content" rows="5" cols="33" required></textarea><br>
    <?php 
    if (isset($_SESSION['username'])){
        echo '<input name="id_user" value="'.$_SESSION['id'].'" hidden/>';
    }
    ?>
    <button type="submit">Envoyer</button>
</form>