<?php require_once "../app/views/layouts/header.php"; ?>
<?php require_once "../app/views/layouts/sidebar.php"; ?>
<?php require_once "../app/views/layouts/navbar.php"; ?>

<div class="content">

    <div class="page-header">

        <div>
            <h2>Modifier le rendez-vous</h2>
            <p>Modifiez les informations du rendez-vous.</p>
        </div>

        <a href="index.php?url=appointments" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i>
            Retour
        </a>

    </div>

    <div class="table-card">

        <form action="index.php?url=appointments/update" method="POST">

            <input type="hidden" name="id"
                   value="<?= $appointment->getId(); ?>">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Nom</label>

                    <input
                        type="text"
                        name="nom"
                        class="form-control"
                        value="<?= htmlspecialchars($appointment->getNom()); ?>"
                        required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Prénom</label>

                    <input
                        type="text"
                        name="prenom"
                        class="form-control"
                        value="<?= htmlspecialchars($appointment->getPrenom()); ?>"
                        required>
                </div>

            </div>

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label">Email</label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="<?= htmlspecialchars($appointment->getEmail()); ?>">

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">Téléphone</label>

                    <input
                        type="text"
                        name="telephone"
                        class="form-control"
                        value="<?= htmlspecialchars($appointment->getTelephone()); ?>">

                </div>

            </div>

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label">Service</label>

                    <input
                        type="text"
                        name="service"
                        class="form-control"
                        value="<?= htmlspecialchars($appointment->getService()); ?>">

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">Sous-service</label>

                    <input
                        type="text"
                        name="sous_service"
                        class="form-control"
                        value="<?= htmlspecialchars($appointment->getSousService()); ?>">

                </div>

            </div>

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label">Date</label>

                    <input
                        type="date"
                        name="date_rdv"
                        class="form-control"
                        value="<?= $appointment->getDateRdv(); ?>">

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">Heure</label>

                    <input
                        type="time"
                        name="heure"
                        class="form-control"
                        value="<?= substr($appointment->getHeure(),0,5); ?>">

                </div>

            </div>

            <div class="mb-4">

                <label class="form-label">Message</label>

                <textarea
                    name="message"
                    rows="5"
                    class="form-control"><?= htmlspecialchars($appointment->getMessage()); ?></textarea>

            </div>

            <button class="btn btn-success">

                <i class="bi bi-check-circle"></i>

                Enregistrer les modifications

            </button>

        </form>

    </div>

</div>

<?php require_once "../app/views/layouts/footer.php"; ?>