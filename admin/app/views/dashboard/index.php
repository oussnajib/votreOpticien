<?php require_once "../app/views/layouts/header.php"; ?>

<?php require_once "../app/views/layouts/sidebar.php"; ?>

<?php require_once "../app/views/layouts/navbar.php"; ?>

<div class="content">

    <h2>Bonjour <?= Session::get("admin_nom"); ?> 👋</h2>

    <p>Bienvenue dans votre panneau d'administration.</p>

    <div class="row g-4 mt-4">

        <div class="col-xl-3 col-md-6">

        <div class="stat-card">

            <div class="stat-left">

                <div class="stat-icon success">

                    <i class="bi bi-calendar-check"></i>

                </div>

            </div>

            <div class="stat-right">

                <h2><?= $totalAppointments ?></h2>

                <span>Rendez-vous</span>

            </div>

        </div>

        </div>

        <div class="col-xl-3 col-md-6">

        <div class="stat-card">

            <div class="stat-left">

                <div class="stat-icon primary">

                    <i class="bi bi-eyeglasses"></i>

                </div>

            </div>

            <div class="stat-right">

                <h2><?= $productsCount ?></h2>

                <span>Produits</span>

            </div>

        </div>

        </div>

        <div class="col-xl-3 col-md-6">

        <div class="stat-card">

            <div class="stat-left">

                <div class="stat-icon success">

                    <i class="bi bi-envelope"></i>

                </div>

            </div>

            <div class="stat-right">

                <h2>0</h2>

                <span>Messages</span>

            </div>

        </div>

        </div>

        <div class="col-xl-3 col-md-6">

            <div class="stat-card">

                <div class="stat-left">

                    <div class="stat-icon primary">

                        <i class="bi bi-journal-richtext"></i>

                    </div>

                </div>

                <div class="stat-right">

                    <h2>0</h2>

                    <span>Articles</span>

                </div>

            </div>

        </div>

    </div>
    
</div>

<?php require_once "../app/views/layouts/footer.php"; ?>