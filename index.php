<?php
require __DIR__ . '/vendor/autoload.php';
$router = new AltoRouter();
use App\Controller\UserController;
//set base 
$router->setBasePath('/super-week');

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

$router->map('GET', '/users/test', function () {
    

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