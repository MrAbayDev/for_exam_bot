<?php
declare(strict_types=1);

use ForExamBot\Info;
use ForExamBot\Router;
$addText = new Info();
if(isset($_POST['text'])){
    $addText->addInfo($_POST['text']);
    header('Location: /');
}
Router::get('/', fn() => require 'public/home.php');
Router::get('/', fn() => require 'public/getInfo.php');
