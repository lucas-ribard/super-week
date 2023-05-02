<?php
//init altoRouter
require 'vendor/altorouter/altorouter/AltoRouter.php';
$router = new AltoRouter();
//set base 
$router->setBasePath('/super-week');

//Maps
$router->map( 'GET', '/', function() {
    echo 'Bienvenue sur l\'acceuil';
});

$router->map( 'GET', '/users', function() {
    echo 'Bienvenu sur la liste des Utilisateurs';
});

$router->map( 'GET', '/users/1', function() {
    echo 'Bienvenu sur la page de l’utilisateur 1';
});


//match Router
$match = $router->match();
if( is_array($match) && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
?>
