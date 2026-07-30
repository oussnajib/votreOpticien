<?php require_once "../app/views/layouts/header.php"; ?>
<?php require_once "../app/views/layouts/sidebar.php"; ?>
<?php require_once "../app/views/layouts/navbar.php"; ?>

<div class="content">

    <div class="page-header">

        <div>
            <h2>Ajouter un produit</h2>
            <p>Ajouter un nouveau produit au catalogue.</p>
        </div>

        <a href="index.php?url=products" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i>
            Retour
        </a>

    </div>

    <div class="table-card">

        <form action="index.php?url=products/store"
              method="POST"
              enctype="multipart/form-data">

            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text"
                       name="nom"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Catégorie</label>

                <select name="categorie" class="form-select" required>

                    <option value="">Choisir...</option>
                    <option>Lunettes de vue</option>
                    <option>Lunettes de soleil</option>
                    <option>Lentilles</option>

                </select>

            </div>

            <div class="mb-3">
                <label class="form-label">Prix</label>

                <input type="number"
                       step="0.01"
                       name="prix"
                       class="form-control"
                       required>

            </div>

            <div class="mb-4">

                <label class="form-label">Image</label>

                <input type="file"
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