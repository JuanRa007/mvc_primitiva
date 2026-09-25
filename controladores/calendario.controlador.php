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

        $apuestasmes = [];
        $apuestasmes = ModeloCalendario::ctrMostrarApuestasMes($diaini , $diafin );

        echo '<br><br><br>APUESTAS MES<pre>'.print_r($apuestasmes).'</pre>';
















        return $dias_calendario;

    }
    
}