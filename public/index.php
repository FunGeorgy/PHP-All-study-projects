<?php

include('/app/vendor/autoload.php');

$router = new App\Router\Router();

$router->addRoute('/login', new App\Modules\Controller\Login());
$router->addRoute('/registration', new App\Modules\Controller\Registration());
$router->addRoute('/', new App\Modules\Controller\Main());

$router->getRoute($_SERVER['REQUEST_URI'])->getPage();
