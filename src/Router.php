<?php
declare(strict_types=1);
namespace ForExamBot;

class Router
{
    public mixed $updates;
    public function __construct()
    {
        $this->updates = json_decode(file_get_contents('php://input'));
    }
    public function isTelegramUpdate(): bool
    {
        if (isset($this->updates->update_id)) {
            return true;
        }
        return false;
    }
    public static function post($path,$callback):void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && parse_url($_SERVER['REQUEST_URI'])['path'] === $path) {
            $callback();
        }
    }
    public static function get($path, $callback): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && parse_url($_SERVER['REQUEST_URI'])['path'] === $path) {
            $callback();
        }
    }
}