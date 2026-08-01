<?php require_once "../app/views/layouts/header.php"; ?>
<?php require_once "../app/views/layouts/sidebar.php"; ?>
<?php require_once "../app/views/layouts/navbar.php"; ?>

<div class="content">

    <div class="page-header">

        <div>
            <h2>Gestion des messages</h2>
            <p>Consultez les messages envoyés depuis le formulaire de contact.</p>
        </div>

    </div>

    <div class="table-card">

        <div class="table-toolbar">

            <input
                type="text"
                class="form-control"
                placeholder="Rechercher un message...">

        </div>

        <table class="table table-hover align-middle">

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>

            </thead>

            <tbody>

            <?php foreach($messages as $message): ?>

                <tr>

                    <td><?= $message->getId(); ?></td>

                    <td><?= htmlspecialchars($message->getNom()); ?></td>

                    <td><?= htmlspecialchars($message->getEmail()); ?></td>

                    <td><?= htmlspecialchars($message->getTelephone()); ?></td>

                    <td><?= $message->getDateEnvoi(); ?></td>

                    <td>

                        <a href="index.php?url=messages/show&id=<?= $message->getId(); ?>"
                           class="btn btn-sm btn-primary">

                            <i class="bi bi-eye"></i>

                        </a>

                        <a href="index.php?url=messages/delete&id=<?= $message->getId(); ?>"
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Voulez-vous supprimer ce message ?');">

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