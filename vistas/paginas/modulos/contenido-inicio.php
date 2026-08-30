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
    <div class="row row-cols-1 row-cols-md-2 pt-5">
      <div class="col mb-4">

        <!-- ======= INICIO ======= -->
        <div class="card text-black bg-light shadow">

          <img src="<?= $blog["dominio"]; ?>/vistas/img/b_primitiva.png" class="card-img-top" alt="Primitiva Fija Semanal">

          <div class="card-body">
              <h3 class="card-title">
                <span class="icon-PrimitivaAJ"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span></span>
                Primitiva Fija Semanal              </h3>
              <h6 class="card-subtitle mb-2 text-muted mb-4">
                Lunes, Jueves y Sábado              </h6>
              <hr />
              <div class="alert alert-success text-center" role="alert">
                Sorteo: <span class="badge">24/08/2026, 27/08/2026 y 29/08/2026</span>
              </div>
              <div class="d-flex justify-content-center">
                <ul class="list-inline text-monospace">
                  <li class="list-inline-item p-1 mb-1 bg-success rounded-circle shadow">03</li>
                  <li class="list-inline-item p-1 mb-1 bg-success rounded-circle shadow">13</li>
                  <li class="list-inline-item p-1 mb-1 bg-success rounded-circle shadow">23</li>
                  <li class="list-inline-item p-1 mb-1 bg-success rounded-circle shadow">32</li>
                  <li class="list-inline-item p-1 mb-1 bg-success rounded-circle shadow">33</li>
                  <li class="list-inline-item p-1 mb-1 bg-success rounded-circle shadow">43</li>
                  <li class="list-inline-item p-1 mb-1 bg-warning rounded-circle shadow">9</li>
                </ul>
              </div>
              <div class="d-flex justify-content-center">
                <ul class="list-inline text-monospace">
                  <li class="list-inline-item p-1 mb-1 bg-success rounded-circle shadow">09</li>
                  <li class="list-inline-item p-1 mb-1 bg-success rounded-circle shadow">17</li>
                  <li class="list-inline-item p-1 mb-1 bg-success rounded-circle shadow">19</li>
                  <li class="list-inline-item p-1 mb-1 bg-success rounded-circle shadow">29</li>
                  <li class="list-inline-item p-1 mb-1 bg-success rounded-circle shadow">39</li>
                  <li class="list-inline-item p-1 mb-1 bg-success rounded-circle shadow">49</li>
                  <li class="list-inline-item p-1 mb-1 bg-warning rounded-circle shadow">9</li>
                </ul>
              </div>
              <!-- Submensaje -->
              <p class="card-text">
                <small class="text-muted">Actualizado hace <?= $diferencia_dias ?> días.</small>
              </p>
            </div>
          </div>
        <!-- ======= FINAL ======= -->

      </div>
    </div>
  </div>
</section>
