<?php
session_start();
require_once "configs/connexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = htmlspecialchars($_POST["nom"]);
    $email = htmlspecialchars($_POST["email"]);
    $telephone = htmlspecialchars($_POST["telephone"]);
    $message = htmlspecialchars($_POST["message"]);

    $sql = "INSERT INTO contact (nom, email, telephone, message)
            VALUES (:nom, :email, :telephone, :message)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":nom" => $nom,
        ":email" => $email,
        ":telephone" => $telephone,
        ":message" => $message
    ]);

    $_SESSION["success"] = "Votre message a été envoyé avec succès.";
    header("Location: index.php#contact");
    exit();

} else {

    echo "Accès interdit.";

}