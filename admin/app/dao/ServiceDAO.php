<?php

class ServiceDAO
{
    private PDO $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function findAll(): array
    {
        $sql = "SELECT * FROM services ORDER BY id DESC";
        $stmt = $this->db->query($sql);

        $services = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $services[] = new Service(
                $row["id"],
                $row["nom"],
                $row["description"],
                $row["image"],
                $row["created_at"]
            );
        }

        return $services;
    }

    public function findById(int $id): ?Service
    {
        $sql = "SELECT * FROM services WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new Service(
            $row["id"],
            $row["nom"],
            $row["description"],
            $row["image"],
            $row["created_at"]
        );
    }

    public function count(): int
    {
        return (int) $this->db
            ->query("SELECT COUNT(*) FROM services")
            ->fetchColumn();
    }

    public function create(Service $service): bool
    {
        $sql = "INSERT INTO services (nom, description, image)
                VALUES (?, ?, ?)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $service->getNom(),
            $service->getDescription(),
            $service->getImage()
        ]);
    }

    public function update(Service $service): bool
    {
        $sql = "UPDATE services
                SET nom = ?, description = ?, image = ?
                WHERE id = ?";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $service->getNom(),
            $service->getDescription(),
            $service->getImage(),
            $service->getId()
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM services WHERE id = ?");
        return $stmt->execute([$id]);
    }
}