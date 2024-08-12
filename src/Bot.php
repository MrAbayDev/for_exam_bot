<?php
declare(strict_types=1);
namespace ForExamBot;

use GuzzleHttp\Client;

class Bot {
    private string $api;
    public Client $client;

    public function __construct(string $token) {
        $this->api = 'https://api.telegram.org/bot' . $token . '/';
        $this->client = new Client(['base_uri' => $this->api]);
    }

    public function handlerStartCommand(int $chatId): void {
        $this->client->post('sendMessage', [
            'json' => [
                'chat_id' => $chatId,
                'text' => 'Welcome to ForExamBot!'
            ]
        ]);
    }
}
