<?php require_once "../app/views/layouts/header.php"; ?>
<?php require_once "../app/views/layouts/sidebar.php"; ?>
<?php require_once "../app/views/layouts/navbar.php"; ?>

<div class="content">

    <div class="page-header">

        <div>
            <h2>Modifier un service</h2>
            <p>Mettre à jour les informations du service.</p>
        </div>

        <a href="index.php?url=services" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i>
            Retour
        </a>

    </div>

    <div class="table-card">

        <form action="index.php?url=services/update" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?= $service->getId(); ?>">

            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input
                    type="text"
                    name="nom"
                    class="form-control"
                    value="<?= htmlspecialchars($service->getNom()); ?>"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea
                    name="description"
                    rows="5"
                    class="form-control"
                    required><?= htmlspecialchars($service->getDescription()); ?></textarea>
            </div>

            <div class="mb-3">

                <label class="form-label">Image actuelle</label>

                <br>

                <img
                    src="uploads/services/<?= htmlspecialchars($service->getImage()); ?>"
                    class="rounded mb-3"
                    width="180">

            </div>

            <div class="mb-4">
                <label class="form-label">Nouvelle image (facultatif)</label>
                <input
                    type="file"
                    name="image"
                    class="form-control"
                    accept="image/*">
            </div>

            <button class="btn btn-warning">
                <i class="bi bi-pencil-square"></i>
                Mettre à jour
            </button>

        </form>

    </div>

</div>

<?php require_once "../app/views/layouts/footer.php"; ?>