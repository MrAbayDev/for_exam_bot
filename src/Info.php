<?php
declare(strict_types=1);

namespace ForExamBot;
use PDO;
use PDOException;

class Info
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = DB::connect();
    }

    public function addInfo(string $info): array
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO info (text) VALUES (:info)");
            $stmt->bindParam(':info', $info);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function getInfo(): array
    {
        $stmt = $this->pdo->query("SELECT text FROM info ORDER BY id DESC LIMIT 1;");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM info");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
