<?php require_once "../app/views/layouts/header.php"; ?>
<?php require_once "../app/views/layouts/sidebar.php"; ?>
<?php require_once "../app/views/layouts/navbar.php"; ?>

<div class="content">

    <div class="page-header">

        <div>
            <h2>Ajouter un service</h2>
            <p>Créer un nouveau service.</p>
        </div>

        <a href="index.php?url=services" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i>
            Retour
        </a>

    </div>

    <div class="table-card">

        <form action="index.php?url=services/store"
              method="POST"
              enctype="multipart/form-data">

            <div class="mb-3">
                <label class="form-label">Nom du service</label>
                <input
                    type="text"
                    name="nom"
                    class="form-control"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea
                    name="description"
                    rows="5"
                    class="form-control"
                    required></textarea>
            </div>

            <div class="mb-4">
                <label class="form-label">Image</label>
                <input
                    type="file"
                    name="image"
                    class="form-control"
                    accept="image/*"
                    required>
            </div>

            <button class="btn btn-success">
                <i class="bi bi-check-circle"></i>
                Enregistrer
            </button>

        </form>

    </div>

</div>

<?php require_once "../app/views/layouts/footer.php"; ?>