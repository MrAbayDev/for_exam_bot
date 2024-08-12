<?php
declare(strict_types=1);
use ForExamBot\Router;
$router = new Router();
if($router->isTelegramUpdate()){
    require 'routes/telegram.php';
}else{
    require 'routes/web.php';
}