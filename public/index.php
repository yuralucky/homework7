<?php

require_once '../vendor/autoload.php';

require_once '../config/eloquent.php';
require_once '../config/blade.php';
require_once '../config/router.php';
require_once '../config/validator.php';


$responce = $router->dispatch($request);
echo $responce->getContent();
