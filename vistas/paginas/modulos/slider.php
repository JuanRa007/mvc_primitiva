<?php

    // 1.- Para Pensar.
    $todas_frases = ControladorBlog::ctrObtenerFrases();
    $total_registros = count($todas_frases);
    $indice_frase = random_int(1, $total_registros);
    $frase = ControladorBlog::ctrObtenerUnaFrase('id_frases',$indice_frase);

    // 2.- Ultimo Premio.
    $ultPremio = ControladorBlog::ctrObtenerUltimoPremio();
    $formatoFecha = strtotime($ultPremio['fecha']);
    $formatoFecha = date( 'd/m/Y', $formatoFecha);

    // 3.- Total Premios en Año Actual
    $totalPremios = ControladorBlog::ctrObtenerTotalAnnoPremios();

    // 4.- Total BOTE
    $totalBote = ControladorBlog::ctrObtenerTotalBote();
    $totalFecha = strtotime($totalBote["totalfecha"]);
    $totalFecha = date( 'd/m/Y', $totalFecha);

?>

<section id="avisos">
  <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
        <!-- 1º Aviso -->
        <div class="carousel-item avisos-img-mensa active">
            <div class="container">
                <div class="carousel-caption text-right mb-5 text-white">
                    <h1 class="display-4">Para pensar</h1>
                    <p class="lead"><?php echo $frase["texto_frases"];  ?></p>
                    <p class="lead"><?php echo $frase["autor_frases"];  ?></p>
                </div>
            </div>
        </div>
        <!-- 2º Aviso -->
        <div class="carousel-item avisos-img-primitiva">
        <div class="container">
            <div class="carousel-caption text-right mb-5 text-white">
            <h1 class="display-4">Último premio</h1>
            <p class="lead">El pasado día <?= $formatoFecha ?> obtuvimos un premio de <strong><?= number_format(sprintf("%01.2f", $ultPremio['premio']), 2, ',', '.') ?>&euro;</strong></p>
            </div>
        </div>
        </div>
        <!-- 31 Aviso -->
        <div class="carousel-item avisos-img-loteria">
        <div class="container">
            <div class="carousel-caption text-right mb-5 text-white">
            <h1 class="display-4">Total Anual</h1>
            <p class="lead">Durante este año hemos obtenido <strong><?= number_format(sprintf("%01.2f", $totalPremios["totalpremios"]), 2, ',', '.') ?>&euro;</strong></p>
            </div>
        </div>
        </div>
        <!-- 4º Aviso -->
        <div class="carousel-item avisos-img-euromillones">
        <div class="container">
            <div class="carousel-caption text-right mb-5 text-white">
            <h1 class="display-4">Nuestro Bote</h1>
            <p class="lead">Nuestro bote a día <?= $totalFecha ?> asciende a <strong><?= number_format(sprintf("%01.2f", $totalBote["totalsaldo"]), 2, ',', '.') ?>&euro;</strong></p>
            </div>
        </div>
        </div>
    </div>
    <!-- Selectores laterales -->
    <a href="#myCarousel" data-slide="prev" class="carousel-control-prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a href="#myCarousel" data-slide="next" class="carousel-control-next">
        <span class="carousel-control-next-icon"></span>
    </a>
  </div>
</section>