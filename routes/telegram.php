<?php
declare(strict_types=1);

use ForExamBot\Bot;

$token = $_ENV['TOKEN'];

$bot = new Bot($token);

$update = json_decode(file_get_contents('php://input'), true);

if (isset($update['message'])) {
    $message = $update['message'];
    $chatId = $message['chat']['id'];
    $text = $message['text'];
    if ($text === "/start") {
        $bot->handlerStartCommand($chatId);
    }
}