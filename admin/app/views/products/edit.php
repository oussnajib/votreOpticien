<?php require_once "../app/views/layouts/header.php"; ?>
<?php require_once "../app/views/layouts/sidebar.php"; ?>
<?php require_once "../app/views/layouts/navbar.php"; ?>

<div class="content">

    <div class="page-header">
        <div>
            <h2>Modifier le produit</h2>
            <p>Modifier les informations du produit.</p>
        </div>

        <a href="index.php?url=products" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i>
            Retour
        </a>
    </div>

    <div class="table-card">

        <form action="index.php?url=products/update"
              method="POST"
              enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?= $product->getId(); ?>">

            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text"
                       name="nom"
                       class="form-control"
                       value="<?= htmlspecialchars($product->getNom()); ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Catégorie</label>

                <select name="categorie" class="form-select">

                    <option <?= $product->getCategorie() == "Lunettes de vue" ? "selected" : "" ?>>
                        Lunettes de vue
                    </option>

                    <option <?= $product->getCategorie() == "Lunettes de soleil" ? "selected" : "" ?>>
                        Lunettes de soleil
                    </option>

                    <option <?= $product->getCategorie() == "Lentilles" ? "selected" : "" ?>>
                        Lentilles
                    </option>

                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Prix</label>

                <input type="number"
                       step="0.01"
                       name="prix"
                       class="form-control"
                       value="<?= $product->getPrix(); ?>">
            </div>

            <div class="mb-4">
                <label class="form-label">Nouvelle image (facultatif)</label>

                <input type="file"
                       name="image"
                       class="form-control">
            </div>

            <button class="btn btn-success">
                <i class="bi bi-check-circle"></i>
                Enregistrer
            </button>

        </form>

    </div>

</div>

<?php require_once "../app/views/layouts/footer.php"; ?>