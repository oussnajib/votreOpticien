<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - VotreOpticien Admin</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="<?= App::BASE_URL ?>assets/css/login.css">
</head>
<body>

    <div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card shadow">

                <div class="card-body p-4">

                    <h2 class="text-center mb-4">
                        Connexion
                    </h2>
                    <?php if (Session::has('error')) : ?>

                        <div class="alert alert-danger">

                            <?= Session::get('error'); ?>

                        </div>

                        <?php Session::remove('error'); ?>

                    <?php endif; ?>
                    
                    <form action="<?= App::BASE_URL ?>index.php?url=login" method="POST">

                        <input type="hidden" name="action" value="login">

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <label>Mot de passe</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <button class="btn btn-success w-100">
                            Se connecter
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

    </div>

</body>
</html>