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
}