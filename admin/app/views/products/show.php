<?php require_once "../app/views/layouts/header.php"; ?>
<?php require_once "../app/views/layouts/sidebar.php"; ?>
<?php require_once "../app/views/layouts/navbar.php"; ?>

<div class="content">

    <div class="page-header">

        <div>
            <h2>Détails du produit</h2>
            <p>Consultez les informations du produit.</p>
        </div>

        <a href="index.php?url=products" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i>
            Retour
        </a>

    </div>

    <div class="table-card">

        <div class="row">

            <!-- Image -->
            <div class="col-md-4 text-center">

                <img
                    src="uploads/products/<?= htmlspecialchars($product->getImage()); ?>"
                    alt="<?= htmlspecialchars($product->getNom()); ?>"
                    class="img-fluid rounded shadow-sm"
                    style="max-height:320px; object-fit:cover;">

            </div>

            <!-- Informations -->
            <div class="col-md-8">

                <table class="table table-bordered">

                    <tr>
                        <th style="width:200px;">ID</th>
                        <td><?= $product->getId(); ?></td>
                    </tr>

                    <tr>
                        <th>Nom</th>
                        <td><?= htmlspecialchars($product->getNom()); ?></td>
                    </tr>

                    <tr>
                        <th>Prix</th>
                        <td><?= number_format($product->getPrix(), 2); ?> DH</td>
                    </tr>

                    <tr>
                        <th>Catégorie</th>
                        <td><?= htmlspecialchars($product->getCategorie()); ?></td>
                    </tr>

                    <tr>
                        <th>Image</th>
                        <td><?= htmlspecialchars($product->getImage()); ?></td>
                    </tr>

                    <tr>
                        <th>Date d'ajout</th>
                        <td><?= $product->getCreatedAt(); ?></td>
                    </tr>

                </table>

                <div class="mt-4">

                    <a href="index.php?url=products/edit&id=<?= $product->getId(); ?>"
                       class="btn btn-warning">

                        <i class="bi bi-pencil-square"></i>
                        Modifier

                    </a>

                    <a href="index.php?url=products"
                       class="btn btn-secondary">

                        <i class="bi bi-arrow-left"></i>
                        Retour à la liste

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

<?php require_once "../app/views/layouts/footer.php"; ?>