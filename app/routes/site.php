<?php
use \App\Http\Response;
use \App\Controller\Site;
use \App\Controller\Login;


// Definição de Rotas
$objRouter->get('/',[
    function(){
        return new Response(200,Site\Home::getHome());
    }
]);

$objRouter->get('/login',[
    function(){
        //return new Response(200,Site\Home::getHome());
        return new Response(200,Login::getLogin());
    }
]);


// Definição de Rotas
$objRouter->get('/logout',[
    function(){
        return new Response(200,Site\Home::getHome());
    }
]);

// Definição de Rotas
$objRouter->get('/entity/{idEntity}/{acao}',[
    function($idEntity, $acao){
        return new Response(200,'Entitdade: '.$idEntity.' - '.$acao);
    }
]);
