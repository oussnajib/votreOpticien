<?php

class MessageDAO
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function findAll(): array
    {
        $stmt = $this->db->query("SELECT * FROM contact ORDER BY date_envoi DESC");

        $messages = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $messages[] = new Message(
                $row["id"],
                $row["nom"],
                $row["email"],
                $row["telephone"],
                $row["message"],
                $row["date_envoi"]
            );
        }

        return $messages;
    }

    public function findById(int $id): ?Message
    {
        $stmt = $this->db->prepare("SELECT * FROM contact WHERE id = ?");
        $stmt->execute([$id]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new Message(
            $row["id"],
            $row["nom"],
            $row["email"],
            $row["telephone"],
            $row["message"],
            $row["date_envoi"]
        );
    }

    public function count(): int
    {
        return (int) $this->db->query("SELECT COUNT(*) FROM contact")->fetchColumn();
    }

    public function delete(int $id): bool
    {
    $stmt = $this->db->prepare("DELETE FROM contact WHERE id = ?");
    return $stmt->execute([$id]);
    }
}