<?php

Class ControladorCalendario{


    static public function ctrObtenerCalendario(string $fecmes, string $fecano){

        // Días con sorteos en el mes buscado.
        $dias_sorteo = [];

        // Calendario completo con explicación de cada día.
        $dias_calendario = [];

        // Controlos principales.
        if (!$fecmes || $fecmes > 12 || $fecmes < 1) {
            $fecmes = date("n", time());
        }
        if (!$fecano || $fecano < 2000 || $fecano > 2100) {
            $fecano = date("Y", time());
        }

        // Obtenemos el día de inicio y fin del mes/año pasado por parámetros.
        $diaini = "01-" . $fecmes . "-" . $fecano . " 00:00:00";
        $diaini = date("d-m-Y",strtotime($diaini)) . " 00:00:00";

        $dia_fin_mes =  cal_days_in_month(CAL_GREGORIAN,$fecmes, $fecano);
        $diafin = $dia_fin_mes . "-" . $fecmes . "-" . $fecano . " 00:00:00";
        $diafin = date("d-m-Y",strtotime($diafin)) . " 00:00:00";

        // Obtenemos los días con sorteos del mes/año en tratamiento.
        $apuestasmes = [];
        $apuestasmes = ModeloCalendario::ctrMostrarApuestasMes($diaini , $diafin );
        foreach ($apuestasmes as $key => $value) {
            $dias_sorteo[] =  $value['dfecha'];
        }

        // Generamos el calendario.
        // Primer día del mes.
        $diasemana = date('N', strtotime($diaini));

        // echo '<br><br><br>DIA SEMANA: ['.$diasemana.']<br>';

        // Día de proceso.
        $dia_actual = 1;

        // Primera semana.
        for ($i = 1; $i <= 7; $i++) {
            if ($i < $diasemana) {
                $dias_calendario[] = [
                    'dia'    => "",
                    'hoy'    => "",
                    'enlace' => "",
                    'festivo' => ""
                ];
            } else {
                $tipo_dia = ControladorCalendario::obtener_tipo_dia($dia_actual, $fecmes, $fecano, $dias_sorteo);
                $dias_calendario[] = [
                    'dia'    => $dia_actual,
                    'hoy'    => ($tipo_dia == "hoy") ? $tipo_dia : "",
                    'enlace' => ($tipo_dia == "sorteo") ? $tipo_dia : "",
                    'festivo' => ($tipo_dia == "festivo") ? $tipo_dia : ""
                ];
                $dia_actual++;
            }
        }

        $dia_semana = 1;
        // Resto de semanas.
        while ($dia_actual <= $dia_fin_mes) {
            $tipo_dia = ControladorCalendario::obtener_tipo_dia($dia_actual, $fecmes, $fecano, $dias_sorteo);
            $dias_calendario[] = [
                'dia'    => $dia_actual,
                'hoy'    => ($tipo_dia == "hoy") ? $tipo_dia : "",
                'enlace' => ($tipo_dia == "sorteo") ? $tipo_dia : "",
                'festivo' => ($tipo_dia == "festivo") ? $tipo_dia : ""
            ];
            $dia_actual++;
            $dia_semana++;
            if ($dia_semana > 7) {
                $dia_semana = 1;
            }
        }

        // Terminamos los días.
        for ($i = $dia_semana; $i <= 7; $i++) {
            $dias_calendario[] = [
                'dia'    => "",
                'hoy'    => "",
                'enlace' => "",
                'festivo' => ""
            ];
        }

        return $dias_calendario;

    }
 
    // Determina el día si hay sorteo, es festivo, etc.
    static public function obtener_tipo_dia(string $dia_actual, string $mes_actual, string $ano_actual, array $dias_sorteo){

        // Inicializar.
        $mensa = "";

        // Día de hoy.
        $dia_hoy = date('d');
        $mes_hoy = date('m');
        $ano_hoy = date('Y');

        $fecha_mirar = mktime(12, 0, 0, $mes_actual, $dia_actual, $ano_actual);
        // Buscamos el tipo de día.
        if ($dia_actual == $dia_hoy && $mes_actual == $mes_hoy && $ano_actual == $ano_hoy) {
            $mensa = "hoy";
        } elseif (in_array($dia_actual, $dias_sorteo)) {
            $mensa = "sorteo";
        } elseif (date("N", $fecha_mirar) > 5) {
            $mensa = "festivo";
        } else {
            $mensa = "diario";
        }

        return $mensa;

    }

    // Devolvemos el literal del mes y año.
    static public function obtener_nombre_mes_ano(int $mes, int $ano){

        // Control
        $mes = intval($mes);
        if (!$mes || $mes === 0 || $mes > 12) {
            $mes = date("n", time());
        }
        // Mes
        $tex_mes = ControladorCalendario::obtener_nombre_mes($mes);
        if (!$ano || $ano === 0 || strlen($ano) < 4) {
            $ano = date("Y", time());
        }
        // Año
        $tex_ano = $ano;

        return $tex_mes . " - " . $tex_ano;

    }

    // Obtenemos el literal del mes.
    static public function obtener_nombre_mes(int $mes){
    
        // Meses
        $lit_meses = ['[ERROR]', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

        return $lit_meses[$mes];

    }

    // Obtenemos el literal del día de hoy.
    static public function obtener_nombre_dia(int $dia){
    
        // Días
        $lit_meses = array("Mon" => "lunes", "Tue" => "martes", "Wed" => "miércoles", "Thu" => "jueves", "Fri" => "viernes", "Sat" => "sábado", "Sun" => "domingo",);

        return $lit_meses[$dia];
    
    }
    
    // Devuelve los select para los meses del año.
    // Los valores sin la etiqueta "select".
    static public function obtener_select_meses(int $mes = 0){

        $valores = "";
        if ($mes === 0) {
            $mes = date("n", time());
        }

        for ($i = 1; $i < 13; $i++) {

            $valores .= '<option value="' . $i . '"';
            if ($mes == $i) {
            $valores .= ' selected';
            }
            $valores .= '>' . ControladorCalendario::obtener_nombre_mes($i) . '</option>';
        }

        return $valores;

    }

    // Devuelve los select para los años.
    // Los valores sin la etiqueta "select".
    static public function obtener_select_anos(int $ano, int $app_rangoanoini, int $app_rangoanofin){

    $valores = "";
    if ($ano === 0) {
        $ano = date("Y", time());
    }

    for ($i = $app_rangoanoini; $i <= $app_rangoanofin; $i++) {

        $valores .= '<option value="' . $i . '"';
        if ($ano == $i) {
        $valores .= ' selected';
        }
        $valores .= '>' . $i . '</option>';
    }

    return $valores;

}




}