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

        // Check if $infoArray is empty
        if (empty($infoArray)) {
            $infoText = 'No information available.';
        } else {
            // Format the information
            $infoText = '';
            foreach ($infoArray as $info) {
                // Ensure the property exists before accessing it
                $infoText .= property_exists($info, 'info') ? $info->info . "\n" : 'No message available' . "\n";
            }
        }

        // Check if infoText is not empty
        if (trim($infoText) !== '') {
            // Send the message
            $response = $this->client->post('sendMessage', [
                'json' => [
                    'chat_id' => $chatId,
                    'text' => $infoText
                ]
            ]);

            // Check the response status code
            if ($response->getStatusCode() !== 200) {
                // Log the status code and response body if needed
                error_log("Failed to send message. Status code: " . $response->getStatusCode());
            }
        }
    }

}
