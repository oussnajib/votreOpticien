<?php

class AdminDAO extends DAO
{

public function findByEmail(string $email): ?Admin{
    
    $sql = "SELECT * FROM admin WHERE email = :email";

    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':email', $email);
    $stmt->execute();

    $data = $stmt->fetch();

    if (!$data) {
        return null;
    }

    return new Admin(
        $data['id'],
        $data['nom'],
        $data['email'],
        $data['mot_de_passe']
    );
}

}