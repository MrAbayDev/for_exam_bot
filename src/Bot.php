<?php
declare(strict_types=1);
namespace ForExamBot;

use GuzzleHttp\Client;
use ForExamBot\Info;

class Bot {
    private string $api;
    public Client $client;

    public function __construct() {
        $this->api = 'https://api.telegram.org/bot' . $_ENV['TOKEN'] . '/';
        $this->client = new Client(['base_uri' => $this->api]);
    }

    public function handlerStartCommand(int $chatId): void {
        $infoTx = new Info();
         $infoText = $infoTx->getInfo();

        $this->sendMessage($chatId,$infoText['text']);
    }

    public function sendMessage(int $chatId,  $text): void {
        try {
            $response = $this->client->post('sendMessage', [
                'json' => [
                    'chat_id' => $chatId,
                    'text' => $text
                ]
            ]);

            if ($response->getStatusCode() !== 200) {
                error_log("Failed to send message. Status code: " . $response->getStatusCode());
            }
        } catch (\Exception $e) {
            error_log("Error sending message: " . $e->getMessage());
        }
    }

}
