<?php require_once "../app/views/layouts/header.php"; ?>
<?php require_once "../app/views/layouts/sidebar.php"; ?>
<?php require_once "../app/views/layouts/navbar.php"; ?>

<div class="content">

    <div class="page-header">

        <div>
            <h2>Gestion des rendez-vous</h2>
            <p>Consultez et gérez les rendez-vous des clients.</p>
        </div>


    </div>


    <div class="table-card">

        <div class="table-toolbar">

            <input
                type="text"
                class="form-control"
                placeholder="Rechercher un client...">

        </div>

        <table class="table align-middle table-hover">

            <thead>

                <tr>

                    <th>ID</th>
                    <th>Client</th>
                    <th>Service</th>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Actions</th>

                </tr>

            </thead>

            <tbody>

            <?php foreach($appointments as $appointment): ?>

                <tr>

                    <td><?= $appointment->getId(); ?></td>

                    <td>
                        <?= $appointment->getPrenom(); ?>
                        <?= $appointment->getNom(); ?>
                    </td>

                    <td><?= $appointment->getService(); ?></td>

                    <td><?= $appointment->getDateRdv(); ?></td>

                    <td><?= substr($appointment->getHeure(),0,5); ?></td>

                    <td>

                        <a href="index.php?url=appointments/show&id=<?= $appointment->getId(); ?>"
                            class="btn btn-sm btn-primary">

                            <i class="bi bi-eye"></i>

                        </a>

                        <a href="index.php?url=appointments/edit&id=<?= $appointment->getId(); ?>"
                            class="btn btn-sm btn-warning">

                            <i class="bi bi-pencil"></i>
                            
                        </a>

                        <a href="index.php?url=appointments/delete&id=<?= $appointment->getId(); ?>"
                            class="btn btn-sm btn-danger"
                            onclick="return confirm('Voulez-vous vraiment supprimer ce rendez-vous ?');">

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