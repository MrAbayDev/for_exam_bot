<?php
declare(strict_types=1);

use ForExamBot\Bot;
use ForExamBot\Info;
use ForExamBot\Router;
use ForExamBot\User;
$task = new Info();
$user = new User();
$bot = new Bot();
if(isset($_POST['text'])){
    $task->addInfo($_POST['text']);
    $users = $user->getAll();
    foreach($users as $user){
        $bot->sendMessage($user['chat_id'] , $_POST['text']);
    }
    header('Location: /');
}
Router::get('/', fn() => require 'public/home.php');
Router::get('/', fn() => require 'public/getInfo.php');
