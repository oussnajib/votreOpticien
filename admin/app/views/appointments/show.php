<?php require_once "../app/views/layouts/header.php"; ?>
<?php require_once "../app/views/layouts/sidebar.php"; ?>
<?php require_once "../app/views/layouts/navbar.php"; ?>

<div class="content">

    <h2>Détails du rendez-vous</h2>

    <hr>

    <p><strong>Nom :</strong> <?= $appointment->getNom(); ?></p>

    <p><strong>Prénom :</strong> <?= $appointment->getPrenom(); ?></p>

    <p><strong>Email :</strong> <?= $appointment->getEmail(); ?></p>

    <p><strong>Téléphone :</strong> <?= $appointment->getTelephone(); ?></p>

    <p><strong>Service :</strong> <?= $appointment->getService(); ?></p>

    <p><strong>Sous-service :</strong> <?= $appointment->getSousService(); ?></p>

    <p><strong>Date :</strong> <?= $appointment->getDateRdv(); ?></p>

    <p><strong>Heure :</strong> <?= substr($appointment->getHeure(), 0, 5); ?></p>

    <p><strong>Message :</strong></p>

    <div class="border rounded p-3 bg-light">
        <?= nl2br(htmlspecialchars($appointment->getMessage())); ?>
    </div>

    <br>

    <a href="index.php?url=appointments" class="btn btn-secondary">
        Retour
    </a>

</div>

<?php require_once "../app/views/layouts/footer.php"; ?>