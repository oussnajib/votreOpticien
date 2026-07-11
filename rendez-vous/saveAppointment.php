<?php
    include_once "../configs/connexion.php";

// Vérifier que la requête est en POST
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die("Accès interdit.");
}

// Récupération des données
$service = trim($_POST["service"]);
$sous_service = trim($_POST["sous_service"]);
$date = trim($_POST["date"]);
$heure = trim($_POST["heure"]);
$prenom = trim($_POST["prenom"]);
$nom = trim($_POST["nom"]);
$email = trim($_POST["email"]);
$telephone = trim($_POST["telephone"]);
$message = trim($_POST["message"]);

// Vérifier que tous les champs obligatoires sont remplis
if (
    empty($service) ||
    empty($sous_service) ||
    empty($date) ||
    empty($heure) ||
    empty($prenom) ||
    empty($nom) ||
    empty($email) ||
    empty($telephone)
) {
    die("Veuillez remplir tous les champs.");
}

// Vérifier si le créneau est déjà réservé
$sql = $pdo->prepare("
    SELECT *
    FROM rendezvous
    WHERE date_rdv = ?
    AND heure = ?
");

$sql->execute([$date, $heure]);

if ($sql->rowCount() > 0) {
    die("Ce créneau est déjà réservé.");
}

// Enregistrer le rendez-vous
$sql = $pdo->prepare("
    INSERT INTO rendezvous
    (
        service,
        sous_service,
        date_rdv,
        heure,
        prenom,
        nom,
        email,
        telephone,
        message
    )
    VALUES
    (?, ?, ?, ?, ?, ?, ?, ?, ?)
");



$result = $sql->execute([
    $service,
    $sous_service,
    $date,
    $heure,
    $prenom,
    $nom,
    $email,
    $telephone,
    $message
]);

if ($result) {
    echo "success";
    exit(); 
} else {
    echo "error";
}



?>