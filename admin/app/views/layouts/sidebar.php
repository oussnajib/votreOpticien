
<div class="sidebar">

    <div class="sidebar-header">

        <div class="logo">
            <i class="bi bi-eyeglasses"></i>
            <span>VotreOpticien</span>
        </div>

    </div>

    <div class="admin-info">

        <div class="avatar">
            <i class="bi bi-person-fill"></i>
        </div>

        <h6><?= Session::get('admin_nom') ?></h6>

        <small><?= Session::get('admin_email') ?></small>

    </div>

    <ul class="menu">

        <li>
            <a href="index.php?url=dashboard">
                <i class="bi bi-grid"></i>
                <span>Tableau de bord</span>
            </a>
        </li>

        <li>
            <a href="index.php?url=appointments">
                <i class="bi bi-calendar-check"></i>
                <span>Rendez-vous</span>
            </a>
        </li>

        <a href="index.php?url=products">
            <i class="bi bi-eyeglasses"></i>
            <span>Produits</span>
        </a>

        <li>
            <a href="#">
                <i class="bi bi-gear"></i>
                <span>Services</span>
            </a>
        </li>

        <li>
            <a href="#">
                <i class="bi bi-images"></i>
                <span>Galerie</span>
            </a>
        </li>

        <li>
            <a href="#">
                <i class="bi bi-journal-text"></i>
                <span>Blog</span>
            </a>
        </li>

        <li>
            <a href="#">
                <i class="bi bi-envelope"></i>
                <span>Messages</span>
            </a>
        </li>

    </ul>

    <div class="logout">

        <a href="index.php?url=logout">

            <i class="bi bi-box-arrow-right"></i>

            Déconnexion

        </a>

    </div>

</div>