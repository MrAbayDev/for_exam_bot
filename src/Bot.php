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
        $information = new Info();
        $infoArray = $information->getInfo();

        if (empty($infoArray)) {
            $infoText = 'No information available.';
        } else {
            $infoText = '';
            foreach ($infoArray as $info) {
                $infoText .= property_exists($info, 'info') ? $info->info . "\n" : 'No message available' . "\n";
            }
        }


        if (trim($infoText) !== '') {
            $response = $this->client->post('sendMessage', [
                'json' => [
                    'chat_id' => $chatId,
                    'text' => $infoText
                ]
            ]);

            if ($response->getStatusCode() !== 200) {
                error_log("Failed to send message. Status code: " . $response->getStatusCode());
            }
        }
    }

}
