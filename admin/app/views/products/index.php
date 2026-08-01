<?php require_once "../app/views/layouts/header.php"; ?>
<?php require_once "../app/views/layouts/sidebar.php"; ?>
<?php require_once "../app/views/layouts/navbar.php"; ?>

<div class="content">

    <div class="page-header">

        <div>
            <h2>Gestion des produits</h2>
            <p>Consultez et gérez les produits du site.</p>
        </div>

        <a href="index.php?url=products/create" class="btn btn-success">
            <i class="bi bi-plus-circle"></i>
            Ajouter un produit
        </a>

    </div>

    <div class="table-card">

        <table class="table table-hover align-middle">

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Catégorie</th>
                    <th>Prix</th>
                    <th>Actions</th>
                </tr>

            </thead>

            <tbody>

            <?php foreach ($products as $product): ?>

                <tr>

                    <td><?= $product->getId(); ?></td>

                    <td>
                        <img src="../uploads/products/<?= htmlspecialchars($product->getImage()); ?>"
                             width="60"
                             height="60"
                             style="object-fit:cover;border-radius:8px;">
                    </td>

                    <td><?= htmlspecialchars($product->getNom()); ?></td>

                    <td><?= htmlspecialchars($product->getCategorie()); ?></td>

                    <td><?= number_format($product->getPrix(), 2); ?> DH</td>

                    <td>

                        <a href="index.php?url=products/show&id=<?= $product->getId(); ?>"
                            class="btn btn-primary btn-sm">
                            <i class="bi bi-eye"></i>
                        </a>

                        <a href="index.php?url=products/edit&id=<?= $product->getId(); ?>"
                            class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i>
                        </a>

                        <a href="index.php?url=products/delete&id=<?= $product->getId(); ?>"
                            class="btn btn-sm btn-danger"
                            onclick="return confirm('Voulez-vous vraiment supprimer ce produit ?')">
                                <i class="bi bi-trash"></i>
                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>

<?php require_once "../app/views/layouts/footer.php"; ?>