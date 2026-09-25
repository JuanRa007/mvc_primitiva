<?php   

// Buscamos la última apuesta registrada en la base de datos.
$ultApuesta = ControladorBlog::ctrMostrarUltimaApuesta();
// echo '<pre>'; print_r($ultApuesta); echo '</pre>';

// Fecha apuesta
$fecha_UltApu = strtotime($ultApuesta['fecha']);
$fecha_UltApu = date( 'd/m/Y', $fecha_UltApu);

// Obtenemos el mes/año actual. TODO: nos llegará el mes/año seleccionado por el usuario.
$fecha_dia = 0;
$fecha_mes = date("n", time());
$fecha_ano = date("Y", time());

// Convertimos a dos de longitud.
$fecha_dia = (strlen($fecha_dia) < 2)  ? "0" . $fecha_dia : $fecha_dia;
$fecha_mes = (strlen($fecha_mes) < 2)  ? "0" . $fecha_mes : $fecha_mes;

// Obtenemos los datos del mes a procesar.
$calendario = ControladorCalendario::ctrObtenerCalendario($fecha_mes, $fecha_ano);

// Punteros mes anterior y mes posterior.
$ano_ant = $fecha_ano;
$mes_ant = $fecha_mes;
$mes_ant--;
if ($mes_ant < 1) {
  $mes_ant = 12;
  $ano_ant--;
}
$ano_pos = $fecha_ano;
$mes_pos = $fecha_mes;
$mes_pos++;
if ($mes_pos > 12) {
  $mes_pos = 1;
  $ano_pos++;
}

$enlace_mes_ant = "anteriores.php?messel=" . $mes_ant . "&anosel=" . $ano_ant;
$enlace_mes_pos = "anteriores.php?messel=" . $mes_pos . "&anosel=" . $ano_pos;




$temporal = '99';


?>

<!-- Nuestras apuestas -->
<section id="anteriores" class="bg-light pt-5 pb-5">
  <div class="container text-center pt-5">
    <div class="row">
      <div class="col">
        <div class="info-cabecera mb-5">
          <h1 class="text-dark pb-3">Historial de Apuestas</h1>
          <p>Última apuesta realizada: <?= $fecha_UltApu ?></p>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <!-- DIV.ROW.COL -->
    <table class="table-sm table-bordered table-striped tabla-centra text-center">
        <thead>
            <tr>
                <th colspan="7">
                    <span class="btn-group">
                        <a class="btn btn-outline-info" href=<?= $temporal; //$enlace_mes_ant; ?>><i class="fas fa-angle-left"></i></a>
                        <button type="button" class="btn btn-secondary"><?= $temporal; // obtener_nombre_mes_ano($fecha_mes, $fecha_ano); ?></button>
                        <a class="btn btn-outline-info" href=<?= $temporal; //$enlace_mes_pos; ?>><i class="fas fa-angle-right"></i></a>
                    </span>
                </th>
            </tr>
            <tr>
                <th>L</th>
                <th>M</th>
                <th>X</th>
                <th>J</th>
                <th>V</th>
                <th class="text-danger">S</th>
                <th class="text-danger">D</th>
            </tr>
        </thead>
        <tbody>


        </tbody>
    </table>
    
    <table class="table-sm table-bordered table-striped tabla-centra text-center mt-5">
      <tbody>
        <form action="anteriores.php" method="post">
          <tr>
            <td>
              <select name="messel" class="custom-select custom-select-sm">
                <?= $temporal; // obtener_select_meses($fecha_mes) ?>
              </select>
            </td>
            <td>
              <select name="anosel" class="custom-select custom-select-sm">
                <?= $temporal; // obtener_select_anos($fecha_ano); ?>
              </select>
            </td>
            <td>
              <button type="submit" class="btn btn-secondary btn-sm">IR AL MES</button>
            </td>
          </tr>
        </form>
      </tbody>
    </table>

    <section class="bg-light pt-5 pb-5">
      <div class="loader" id="loader"></div>
      <div id="premio"></div>
      <div>
        <table id="resultadia" class="table table-sm table-bordered table-striped table-hover text-center">
        </table>
      </div>
    </section>

  </div>
</section>