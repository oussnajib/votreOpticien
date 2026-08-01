<?php require_once "../app/views/layouts/header.php"; ?>
<?php require_once "../app/views/layouts/sidebar.php"; ?>
<?php require_once "../app/views/layouts/navbar.php"; ?>

<div class="content">

    <div class="page-header">

        <div>
            <h2>Gestion des services</h2>
            <p>Consultez et gérez les services proposés.</p>
        </div>

        <a href="index.php?url=services/create" class="btn btn-success">
            <i class="bi bi-plus-circle"></i>
            Ajouter
        </a>

    </div>

    <div class="table-card">

        <div class="table-toolbar">

            <input
                type="text"
                class="form-control"
                placeholder="Rechercher un service...">

        </div>

        <table class="table align-middle table-hover">

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>

            </thead>

            <tbody>

            <?php foreach($services as $service): ?>

                <tr>

                    <td><?= $service->getId(); ?></td>

                    <td>

                        <img
                            src="uploads/services/<?= $service->getImage(); ?>"
                            width="60"
                            class="rounded">

                    </td>

                    <td><?= htmlspecialchars($service->getNom()); ?></td>

                    <td>

                        <?= htmlspecialchars(substr($service->getDescription(),0,60)); ?>...

                    </td>

                    <td>

                        <a href="index.php?url=services/show&id=<?= $service->getId(); ?>"
                           class="btn btn-primary btn-sm">

                            <i class="bi bi-eye"></i>

                        </a>

                        <a href="index.php?url=services/edit&id=<?= $service->getId(); ?>"
                           class="btn btn-warning btn-sm">

                            <i class="bi bi-pencil"></i>

                        </a>

                        <a href="index.php?url=services/delete&id=<?= $service->getId(); ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Supprimer ce service ?')">

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