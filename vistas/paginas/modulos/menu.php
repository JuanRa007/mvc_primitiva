<!-- Menu Principal -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark p-0">
    <div class="container">
        <a href="<?= $blog["dominio"].'inicio'; ?>" class="navbar-brand p-0">
            <img class="col-logo" src="<?= $blog['dominio'].$blog['logo']; ?>" alt="<?= $blog['titulo']; ?>" />
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?= ($app_pagina == "inicio") ? "active" : "" ?>">
                    <a href="<?= $blog["dominio"].'inicio'; ?>" class="nav-link">Inicio</a>
                </li>
                <li class="nav-item <?= ($app_pagina == "saldos") ? "active" : "" ?>">
                    <a href="<?= $blog["dominio"].'saldos'; ?>" class="nav-link">Saldos</a>
                </li>
                <li class="nav-item <?= ($app_pagina == "anteriores") ? "active" : "" ?>">
                    <a href="<?= $blog["dominio"].'anteriores'; ?>" class="nav-link">Historial</a>
                </li>
            </ul>
        </div>
    </div>
</nav>