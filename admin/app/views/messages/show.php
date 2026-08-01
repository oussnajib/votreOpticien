<?php require_once "../app/views/layouts/header.php"; ?>
<?php require_once "../app/views/layouts/sidebar.php"; ?>
<?php require_once "../app/views/layouts/navbar.php"; ?>

<div class="content">

    <div class="page-header">

        <div>
            <h2>Détails du message</h2>
            <p>Consultez le message envoyé par le client.</p>
        </div>

        <a href="index.php?url=messages" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i>
            Retour
        </a>

    </div>

    <div class="table-card">

        <table class="table table-bordered">

            <tr>
                <th style="width:220px;">ID</th>
                <td><?= $message->getId(); ?></td>
            </tr>

            <tr>
                <th>Nom</th>
                <td><?= htmlspecialchars($message->getNom()); ?></td>
            </tr>

            <tr>
                <th>Email</th>
                <td><?= htmlspecialchars($message->getEmail()); ?></td>
            </tr>

            <tr>
                <th>Téléphone</th>
                <td><?= htmlspecialchars($message->getTelephone()); ?></td>
            </tr>

            <tr>
                <th>Date d'envoi</th>
                <td><?= $message->getDateEnvoi(); ?></td>
            </tr>

            <tr>
                <th>Message</th>
                <td style="white-space: pre-line;">
                    <?= htmlspecialchars($message->getMessage()); ?>
                </td>
            </tr>

        </table>

        <div class="mt-4">

            <a href="index.php?url=messages"
               class="btn btn-secondary">

                <i class="bi bi-arrow-left"></i>
                Retour à la liste

            </a>

            <a href="index.php?url=messages/delete&id=<?= $message->getId(); ?>"
               class="btn btn-danger"
               onclick="return confirm('Voulez-vous supprimer ce message ?');">

                <i class="bi bi-trash"></i>
                Supprimer

            </a>

        </div>

    </div>

</div>

<?php require_once "../app/views/layouts/footer.php"; ?>