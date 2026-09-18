<?php

// Buscamos la última apuesta registrada en la base de datos.
$ultApuesta = ControladorBlog::ctrMostrarUltimaApuesta();
// echo '<pre>'; print_r($ultApuesta); echo '</pre>';

// Fecha apuesta
$fecha_apu = strtotime($ultApuesta['fecha']);
$fecha_apu = date( 'd/m/Y', $fecha_apu);

// Obtenemos los saldos de los participantes
$saldos_part = ControladorBlog::ctrMostrarSaldosParticipantes();

// Se tiene que añadir el total de los saldos (Cestillo).
$total = 0;
foreach ($saldos_part as $fila) {
    $total += $fila['total_aportado']; // Se va sumando cada importe al total
}
$saldos_part[] = array(
    "participante" => "Cestillo",
    "total_aportado" => $total,
    "ultima_fecha_aportacion" => date('Y-m-d',time()). " 00:00:00"
);
 // echo 'SALDOS<pre>'; print_r($saldos_part); echo '</pre>';

// Mínimo saldo permitido
$app_saldominimo=$blog["saldominimo"];
?>

<!-- Nuestras apuestas -->
<section id="saldos" class="bg-light pt-5">
  <div class="container text-center pt-5">
    <div class="row">
      <div class="col">
        <div class="info-cabecera mb-5">
          <h1 class="text-dark pb-3">Saldos Actuales</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="table-responsive">
          <table class="table table-striped table-bordered">
            <caption>Saldos actualizados a la fecha de <?= $fecha_apu ?>.</caption>
            <thead class="thead-dark">
              <tr class="aling-center">
                <th>Participante</th>
                <th>Saldo Actual</th>
                <th>Ùlt.Movim.</th>
              </tr>
            </thead>
            <tbody>

              <?php
              foreach ($saldos_part as $usuario) {

                $participante = $usuario["participante"];
                $saldo = number_format(sprintf("%01.2f", $usuario["total_aportado"]), 2, ',', '.');
                // 20241230--> Nuevo control de saldo mínimo.
                $saldo_flo = $usuario["total_aportado"];
                $fecha = strtotime($usuario["ultima_fecha_aportacion"]);
                $fecha = date( 'd/m/Y', $fecha);

                $clase = "";
                if ($participante == "BOTE") {
                  $clase = 'class="table-primary"';
                  $participante = "<strong>" . $participante . "</strong>";
                }
                if ($participante == "Cestillo") {
                  $clase = 'class="table-info"';
                  $participante = "<strong><em>" . $participante . "</em></strong>";
                }

                $clase_celda = "";
                // 20241230--> Nuevo control de saldo mínimo.
                if ($saldo_flo <= $app_saldominimo) {
                  $clase_celda = "table-danger";
                }

              ?>
                <tr <?= ($clase) ? $clase : "" ?>>
                  <td><?= $participante ?></td>
                  <td class="aling-right <?= ($clase_celda) ? $clase_celda : "" ?> "><?= $saldo ?></td>
                  <td class="aling-center"><?= $fecha ?></td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>