<?php
declare(strict_types=1);

use ForExamBot\User;
use ForExamBot\Bot;
use ForExamBot\Info;

$bot = new Bot();
$info = new Info;
$user = new User();

$update = json_decode(file_get_contents('php://input'), true);

if (isset($update['message'])) {
    $message = $update['message'];
    $chatId = $message['chat']['id'];
    $text = $message['text'];
    if ($text === "/start") {
        $bot->handlerStartCommand($chatId);
        $getUser = $user->getUser($chatId);
        if (!$getUser) {
            $user->createUser($chatId);
        }
    }
}