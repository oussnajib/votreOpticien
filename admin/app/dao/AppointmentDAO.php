<?php

class AppointmentDAO
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function findAll(): array
    {
        $sql = "SELECT *
                FROM rendezvous
                ORDER BY date_rdv DESC, heure DESC";

        $stmt = $this->db->query($sql);

        $appointments = [];

        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $appointments[] = new Appointment(
                $row["id"],
                $row["service"],
                $row["sous_service"],
                $row["date_rdv"],
                $row["heure"],
                $row["prenom"],
                $row["nom"],
                $row["email"],
                $row["telephone"],
                $row["message"],
                $row["created_at"]
            );
        }

        return $appointments;
    }

    public function findById(int $id): ?Appointment
    {
    $sql = "SELECT * FROM rendezvous WHERE id = ?";

    $stmt = $this->db->prepare($sql);
    $stmt->execute([$id]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        return null;
    }

    return new Appointment(
        $row["id"],
        $row["service"],
        $row["sous_service"],
        $row["date_rdv"],
        $row["heure"],
        $row["prenom"],
        $row["nom"],
        $row["email"],
        $row["telephone"],
        $row["message"],
        $row["created_at"]
    );
    }

    public function count(): int
    {
    $sql = "SELECT COUNT(*) FROM rendezvous";

    $stmt = $this->db->query($sql);

    return (int) $stmt->fetchColumn();
    }

    public function update(Appointment $appointment): bool
    {
    $sql = "UPDATE rendezvous
            SET
                service = ?,
                sous_service = ?,
                date_rdv = ?,
                heure = ?,
                prenom = ?,
                nom = ?,
                email = ?,
                telephone = ?,
                message = ?
            WHERE id = ?";

    $stmt = $this->db->prepare($sql);

    return $stmt->execute([
        $appointment->getService(),
        $appointment->getSousService(),
        $appointment->getDateRdv(),
        $appointment->getHeure(),
        $appointment->getPrenom(),
        $appointment->getNom(),
        $appointment->getEmail(),
        $appointment->getTelephone(),
        $appointment->getMessage(),
        $appointment->getId()
    ]);
    }
    
    public function delete(int $id): bool
    {
    $sql = "DELETE FROM rendezvous WHERE id = ?";

    $stmt = $this->db->prepare($sql);

    return $stmt->execute([$id]);
    }
    
}