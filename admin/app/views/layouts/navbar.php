<nav class="topbar">

    <div class="topbar-left">

        <div class="search-box">

            <i class="bi bi-search"></i>

            <input
                type="text"
                placeholder="Rechercher...">

        </div>

    </div>

    <div class="topbar-right">

        <button class="icon-btn">

            <i class="bi bi-bell"></i>

        </button>

        <div class="profile">

            <div class="profile-avatar">

                <?= strtoupper(substr(Session::get('admin_nom'),0,1)); ?>

            </div>

            <div class="profile-info">

                <strong><?= Session::get('admin_nom'); ?></strong>

                <small>Administrateur</small>

            </div>

        </div>

    </div>

</nav>