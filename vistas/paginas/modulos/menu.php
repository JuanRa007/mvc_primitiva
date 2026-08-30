<!-- Menu Principal -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark p-0">
    <div class="container">
        <a href="index.php" class="navbar-brand p-0">
            <img class="col-logo" src="<?= $blog["dominio"]; ?>vistas/img/nuestrasapuestas-logo.svg" alt="Nuestras Apuestas" />
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a href="index.php" class="nav-link">Inicio</a>
                </li>
                <li class="nav-item ">
                    <a href="saldos.php" class="nav-link">Saldos</a>
                </li>
                <li class="nav-item ">
                    <a href="anteriores.php" class="nav-link">Historial</a>
                </li>
            </ul>
        </div>
    </div>
</nav>