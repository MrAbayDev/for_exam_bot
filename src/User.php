<?php

declare(strict_types=1);
namespace ForExamBot;
use PDO;

class User
{
    private PDO $pdo;
    public function __construct()
    {
        $this->pdo = DB::connect();
    }
    public function createUser(int $chatId): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO user_ids (chat_id) VALUES (:chatId)");
        $stmt->bindParam(':chatId', $chatId);
        $stmt->execute();
    }
    public function getUser(int $chatId):bool
    {
        $stmt = $this->pdo->prepare("SELECT chat_id FROM user_ids WHERE chat_id = :chatId");
        $stmt->bindParam(':chatId', $chatId);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result !== false;
    }
    public function getAll()
    {
        return $this->pdo->query("SELECT * FROM user_ids")->fetchAll(PDO::FETCH_ASSOC);
    }
}