<?php
declare(strict_types=1);

namespace ForExamBot;
use PDO;

class Info
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = DB::connect();
    }

    public function addInfo(string $info): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO `info` (`info`) VALUES (:info)");
        $stmt->bindParam(':info', $info);
        $stmt->execute();
    }

    public function getInfo(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM `info` ORDER BY `info` DESC LIMIT 1");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

}
