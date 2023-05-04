<?php
require __DIR__ . '/vendor/autoload.php';
$router = new AltoRouter();
use App\Controller\UserController;
//set base 
$router->setBasePath('/super-week');

//démare la sessions
session_start();
//si un user est connecté un message d'acceuils s'affiche
if (isset($_SESSION['username'])){
    echo 'Connecté en tant que '.$_SESSION['username'].'<br>';
}
echo '<a href="/super-week/users"> /super-week/users </a><br>';
echo '<a href="/super-week/users/register"> /super-week/users/register </a><br>';
echo '<a href="/super-week/users/login"> /super-week/users/login </a><br><br><br>';
//Maps
$router->map('GET', '/', function () {
    echo 'Bienvenue sur l\'acceuil';
});

$router->map('GET', '/users', function () {
    $UserController = new UserController;
    $list_users=$UserController->list();
    echo $list_users;
});

$router->map('GET', '/users/1', function () {
    echo 'Bienvenue sur la page de l’utilisateur 1';
});

$router->map('GET', '/users/register', function () {
    require_once "src/View/register.php";

});

$router->map('POST', '/users/register', function () {
    $UserController = new UserController;
    $UserController->register();
    header('location:/super-week/users');
});


$router->map('GET', '/users/login', function () {
    require_once "src/View/login.php";

});

$router->map('POST', '/users/login', function () {
    $UserController = new UserController;
    $UserController->login();
   
});




//match Router
$match = $router->match();
if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    // no route was matched
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
?>