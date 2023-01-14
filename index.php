<?php

require __DIR__."/vendor/autoload.php";
require __DIR__."/app/resources/lang/pt-br.php";

use \App\Http\Router;



//INCLUSAO DE ROTAS
$objRouter = new Router(_URL);
include __DIR__.'/app/routes/site.php';
$objRouter->run()
          ->sendResponse();

/*
echo '<pre>';
print_r($objRouter);
echo '</pre>';
exit;
*/