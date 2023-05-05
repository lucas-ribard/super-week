<?php
use App\Controller\BookController;
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
echo '<a href="/super-week"> /super-week </a><br>';
echo '<a href="/super-week/users"> /super-week/users </a><br>';
echo '<a href="/super-week/users/register"> /super-week/users/register </a><br>';
echo '<a href="/super-week/users/login"> /super-week/users/login </a><br>';
echo '<a href="/super-week/users/logout">/super-week/users/logout </a><br>';
echo '<a href="/super-week/books">/super-week/books </a><br>';
echo '<a href="/super-week/books/write">/super-week/books/write </a><br><br>';
//Maps
$router->map('GET', '/', function () {
    echo 'Bienvenue sur l\'acceuil';
});

$router->map('GET', '/users', function () {
    $UserController = new UserController;
    $list_users=$UserController->list();
    echo $list_users;
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

$router->map('GET','/users/logout', function () {
    session_destroy();
    header("location:/super-week/");
});

$router->map('GET', '/users/[i:id]', function ($id) {
    $UserController = new UserController;
    echo $UserController->seeUserInfo($id);
});

$router->map('GET', '/books', function () {
    $BookController = new BookController;
    echo $BookController->findAll();
});

$router->map('GET', '/books/write', function () {
    require_once "src/View/BookWrite.php";
});

$router->map('POST', '/books/write', function () {
    $BookController = new BookController;
    $BookController->writeBook();
   
});

$router->map('GET', '/books/[i:id]', function ($id) {
    $BookController = new BookController;
    echo $BookController->SeeBookInfo($id);
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