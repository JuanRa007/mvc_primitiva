<?php

$ultApuesta = ControladorBlog::ctrMostrarApuesta();
// echo '<pre>'; print_r($ultApuesta); echo '</pre>';

// Fecha apunte
$fecha_apu = strtotime($ultApuesta['fecha']);
$fecha_apu = date( 'd/m/Y', $fecha_apu);

// Diferencia de días
$fecha_actual = date('Y-m-d');
$diferencia_dias = ModeloPrimitiva::funcFechaDiferencia($ultApuesta['fecha'], $fecha_actual);

// Descomponemos el resgitro de apuestas según sus resultados.
$detaApuestas = modeloPrimitiva::funcSeparaApuestas($ultApuesta);
// echo '<pre>'; print_r($detaApuestas); echo '</pre>';

// Buscamos la existencia de algún aviso de interés.
$tituloAvisos = "";
$subtituloAvisos = "";
foreach ($detaApuestas as $tipo_apuesta => $mi_apuesta) {
  if ($tipo_apuesta == 'aviso') {
    $tituloAvisos = $mi_apuesta[0]['titulo'];
    $subtituloAvisos = $mi_apuesta[0]['subtitulo'];
  }
}
?>

<section id="apuestas" class="bg-light pb-5">
  <div class="container text-center pt-5">
    <div class="row">
      <div class="col">
        <div class="info-cabecera mb-5">
          <h1 class="text-dark pb-3">
            Apuestas Semanal
          </h1>
          <p>Datos actualizados a fecha: <?= $fecha_apu ?></p>
        </div>
      </div>
    </div>
  </div>

  <div class="container">

    <!-- Avisos de interés -->
    <?php if ($tituloAvisos) { ?>
      <div class="jumbotron">
          <h1 class="display-6">AVISO:</h1>
          <hr class="my-4">
          <p class="h2 text-center"><?= $tituloAvisos ?></p>
          <p class="h3"><?= $subtituloAvisos ?></p>
      </div>
    <?php
    }
    ?>

    <div class="row row-cols-1 row-cols-md-2 pt-5">

      <?php
      foreach ($detaApuestas as $tipo_apuesta => $mi_apuesta) { 
        
        $apuesta = $mi_apuesta[0];

        // Los avisos no se procesan.
        if ($tipo_apuesta == 'aviso') {
          continue;
        }
        // Los desconocidos se vuelcan a la consola.
        if ($tipo_apuesta == 'desconocido') {
          $desconocido = "";
          $desconocido = '<script>';
          $desconocido .= 'console.log("DESCONOCIDO:");';
          $desconocido .= 'console.log("Título: "' . $apuesta["titulo"] . ');';
          $desconocido .= 'console.log("Subtítulo: ["' . $apuesta["subtitulo"] . ');';
          $desconocido .= '</script>';
          continue;
        }
        ?>

      <div class="col mb-4">
        <div class="card text-black bg-light shadow">
          <img src="<?= $blog["dominio"]; ?>/vistas/img/<?= $apuesta["imagen"] ?>" class="card-img-top" alt="<?= $apuesta["titulo"] ?>">
          <div class="card-body">
              <h3 class="card-title">
                <span class="<?= $apuesta["icono"] ?>"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span></span>
                <?= $apuesta["titulo"] ?>
              </h3>
              <h6 class="card-subtitle mb-2 text-muted mb-4">
                <?= $apuesta["subtitulo"] ?>
              </h6>
              <hr />
              <div class="alert alert-success text-center" role="alert">
                Sorteo: <span class="badge"><?= ModeloPrimitiva::funcGeneraTextoFecha($apuesta["fechas"],$tipo_apuesta) ?></span>
              </div>

              <?php 
              //
              // Presentación Para DÉCIMOS: Navidad, Once.
              //
              if ($tipo_apuesta == 'lotnavidad' || $tipo_apuesta == 'laonce') {

                echo 'SERIA<pre>'; print_r($apuesta); echo '</pre>';


                // TODO: Presentación para DÉCIMOS.
                // Obtenemos la serie y la fracción.
                $serie_fracc = ""; // explode('-', $apuesta["reintegros"]);

                
                $decimo_frontal = ""; // $decimo_frontal = obtener_nombre_fichero_decimo($apuesta["nom_fich"], $tipo_apuesta, true, false);
                $decimo_trasera = ""; // $decimo_trasera = obtener_nombre_fichero_decimo($apuesta["nom_fich"], $tipo_apuesta, false, false);
              ?>
              <!-- Inicio Contenido de la tarjeta: DÉCIMO 
                <div class="alert text-center">
                  <h1><?= $apuesta["numeros"] ?></h1>
                  <h5>Serie: <span class="badge"><?= $serie_fracc[0] ?></span></h5>
                  <?php if ($tipo_apuesta !== 'laonce') {
                  ?>
                    <h5>Fracción: <span class="badge"><?= $serie_fracc[1] ?></span></h5>
                  <?php } ?>
                </div>
                <div class="d-flex justify-content-center">
                  <a href="<?= $decimo_frontal ?>" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
                    <img src="<?= $decimo_frontal ?>" class="img-fluid" alt="">
                  </a>
                  <a href="<?= $decimo_trasera ?>" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
                    <img src="<?= $decimo_trasera ?>" class="img-fluid" alt="">
                  </a>
                </div>
              Fin Contenido de la tarjeta: DÉCIMO -->
              <?php
              } else {
                /* Inicio Contenido de la tarjeta: números */
                $ind_rei = 0;
                $numeros_sorteo = $apuesta["numeros"];
                $reintegros_sorteo = $apuesta["reintegros"];
                foreach ($numeros_sorteo as $indice => $numeros){
              ?>
                  <div class="d-flex justify-content-center">
                    <ul class="list-inline text-monospace">
                      <?php
                      foreach ($numeros as $i => $num) {
                      ?>
                        <li class="list-inline-item p-1 mb-1 <?= "bg-" . $apuesta["color"] ?> rounded-circle shadow"><?= $num ?></li>
                      <?php
                      }
                      if (strpos($reintegros_sorteo[$ind_rei], "-") > 0) {
                        $rei_parcial = explode("-", $reintegros_sorteo[$ind_rei]);
                      ?>
                        <li class="list-inline-item p-1 mb-1 bg-warning rounded-circle shadow"><?= $rei_parcial[0]; ?></li>
                        <li class="list-inline-item p-1 mb-1 bg-warning rounded-circle shadow"><?= $rei_parcial[1]; ?></li>
                      <?php
                      } else {
                      ?>
                        <li class="list-inline-item p-1 mb-1 bg-warning rounded-circle shadow"><?= $reintegros_sorteo[$ind_rei] ?></li>
                      <?php
                      }
                      ?>
                    </ul>
                  </div>
              <?php
                  $ind_rei += 1;
                }
                /* Fin Contenido de la tarjeta: números */
              }   // if ($tipo_apuesta) 
              ?>
              <p class="card-text">
                <small class="text-muted">Actualizado hace <?= $diferencia_dias ?>.</small>
              </p>
            </div>
          </div>
        </div>
        <!-- ======= FINAL ======= -->
      <?php
      }
      ?>
      <!-- ======= FINAL ======= -->

    </div>
  </div>
</section>