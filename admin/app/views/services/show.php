<?php require_once "../app/views/layouts/header.php"; ?>
<?php require_once "../app/views/layouts/sidebar.php"; ?>
<?php require_once "../app/views/layouts/navbar.php"; ?>

<div class="content">

    <div class="page-header">

        <div>
            <h2>Détails du service</h2>
            <p>Informations du service.</p>
        </div>

        <a href="index.php?url=services" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i>
            Retour
        </a>

    </div>

    <div class="table-card">

        <div class="text-center mb-4">

            <img
                src="uploads/services/<?= $service->getImage(); ?>"
                class="img-fluid rounded"
                style="max-width:300px;">

        </div>

        <table class="table">

            <tr>
                <th>ID</th>
                <td><?= $service->getId(); ?></td>
            </tr>

            <tr>
                <th>Nom</th>
                <td><?= htmlspecialchars($service->getNom()); ?></td>
            </tr>

            <tr>
                <th>Description</th>
                <td><?= nl2br(htmlspecialchars($service->getDescription())); ?></td>
            </tr>

            <tr>
                <th>Date d'ajout</th>
                <td><?= $service->getCreatedAt(); ?></td>
            </tr>

        </table>

    </div>

</div>

<?php require_once "../app/views/layouts/footer.php"; ?>