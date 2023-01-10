<?php

require __DIR__."/vendor/autoload.php";
require __DIR__."/app/resources/lang/pt-br.php";

use \App\Http\Router;
use \App\Http\Response;
use \App\Controller\Site\Home;

define('URL', 'http://localhost/api');


$objRouter = new Router(URL);



// Definição de Rotas
$objRouter->get('/',[
    function(){
        return new Response(200,Home::getHome());
    }
]);

$objRouter->run()->sendResponse();
/*
echo '<pre>';
print_r($objRouter);
echo '</pre>';
exit;
*/
