<?php
declare(strict_types=1);

use ForExamBot\Bot;
use ForExamBot\Info;

$token = $_ENV['TOKEN'];

$bot = new Bot();
$info = new Info;

$update = json_decode(file_get_contents('php://input'), true);

if (isset($update['message'])) {
    $message = $update['message'];
    $chatId = $message['chat']['id'];
    $text = $message['text'];
    if ($text === "/start") {
        $bot->handlerStartCommand($chatId);
    }
}