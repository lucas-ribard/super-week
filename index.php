<?php
//init altoRouter
require 'vendor/altorouter/altorouter/AltoRouter.php';
$router = new AltoRouter();
//set base 
$router->setBasePath('/super-week');

//Maps
$router->map( 'GET', '/', function() {
    echo 'hello';
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
