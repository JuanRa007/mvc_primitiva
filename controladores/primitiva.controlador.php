<?php


class ControladorPrimitiva{

    // Propiedades de la clase
     public array $mis_apuestas = [];
     public string $reg_fecha;
     public string $reg_numfijo;
     public string $reg_numfijor;
     public string $reg_numvari;
     public string $reg_numvarir;
     public string $reg_euromillon;
     public string $reg_euroruno;
     public string $reg_eurordos;
     public string $reg_otros;
     public string $reg_euromillon1;
     public string $reg_euroruno1;
     public string $reg_eurordos1;
     public string $reg_numvari1;
     public string $reg_numvari1r;
     public string $reg_premio;
     public string $reg_marvie;
     public string $reg_primitresdias;
     public string $reg_primivaritresdias;


    // Constructor de la clase
     public function __construct() {
        // Inicializar propiedades de la clase
        $this->mis_apuestas = [];
        $this->reg_fecha = '';
        $this->reg_numfijo = '';
        $this->reg_numfijor = '';
        $this->reg_numvari = '';
        $this->reg_numvarir = '';
        $this->reg_euromillon = '';
        $this->reg_euroruno = '';
        $this->reg_eurordos = '';
        $this->reg_otros = '';
        $this->reg_euromillon1 = '';
        $this->reg_euroruno1 = '';
        $this->reg_eurordos1 = '';
        $this->reg_numvari1 = '';
        $this->reg_numvari1r = '';
        $this->reg_premio = '';
        $this->reg_marvie = '';
        $this->reg_primitresdias = '';
        $this->reg_primivaritresdias = '';
    }

    // Devuelve un array con las fechas de los sorteos según el tipo de apuesta y la fecha indicada.
    private function obtener_fecha_sorteo(string $tipo, string $fecha) {

        // Inicializar variables.
        $fechas_proceso = [];
        $diasumres = 0;
        $opesumres = "";

        // Obtenemos el día de la semana: 1 (lunes) a 7 (domingo)
        $diasemana = date("N", strtotime($fecha));

        // En función del tipo enviado.
        switch ($tipo) {
            case 'juesab':
                if ($diasemana < 4) {
                    // Incrementamos el día hasta ser jueves.
                    $diasumres = (4 - $diasemana);
                    $opesumres = "+";
                } elseif ($diasemana > 4) {
                    // Decrementamos el día hasta ser jueves.
                    $diasumres = ($diasemana - 4);
                    $opesumres = "-";
                }

                if ($diasumres) {
                    $fecha_new = date("d/m/Y", strtotime($fecha . $opesumres . $diasumres . " days"));
                } else {
                    $fecha_new = strtotime($fecha);
                    $fecha_new = date( 'd/m/Y', $fecha_new);
                }
                $fechas_proceso[] = $fecha_new;

                // Ahora el sábado siguiente.
                $diasumres += 2;
                $opesumres = "+";
                $fecha_new = date("d/m/Y", strtotime($fecha . $opesumres . $diasumres . " days"));
                $fechas_proceso[] = $fecha_new;
                break;

            case 'lunsab':
                if ($diasemana > 1) {
                    // Decrementamos el día hasta ser lunes.
                    $diasumres = $diasemana;
                    $opesumres = "-";
                }

                if ($diasumres) {
                    $fecha_new = date("d/m/Y", strtotime($fecha . $opesumres . $diasumres . " days"));
                } else {
                    $fecha_new = strtotime($fecha);
                    $fecha_new = date( 'd/m/Y', $fecha_new);
                }
                $fechas_proceso[] = $fecha_new;

                // Ahora el Jueves.
                $diasumres += 3;
                $opesumres = "+";
                $fecha_new = date("d/m/Y", strtotime($fecha . $opesumres . $diasumres . " days"));
                $fechas_proceso[] = $fecha_new;

                // Ahora el sábado siguiente.
                $diasumres += 2;
                $opesumres = "+";
                $fecha_new = date("d/m/Y", strtotime($fecha . $opesumres . $diasumres . " days"));
                $fechas_proceso[] = $fecha_new;
                break;

            default:
                break;
        }

        return $fechas_proceso;

    }


    // Devuelve un array con los números de la apuesta según el tipo de apuesta y la fecha indicada.
    private function obtener_numeros_sorteo(string $numeros) {

        // Inicializar variables.
        $num_sorteo = [];

        // Como separador de las apuestas está el carécter "/"
        $series_num = explode("/", $numeros);

        foreach ($series_num as $serie) {

            $num_sorteo[] = explode("-", trim($serie));
    
        }

        return $num_sorteo;

    }


    // Devuelve un array con las apuestas en la PRIMITIVA FIJA SEMANAL.
    public function prepara_primtiva_fija(){

        // Incializar variable a devolver.
        $apuesta_fija = [];
        $imp_premio = 0;

        // Impporte del premio        
        $imp_premio = number_format(sprintf("%01.2f", $this->reg_premio), 2, ',', '.');

        // Buscar el jueves y sábado de la fecha indicada, o lunes, jueves y sábado.
        if($this->reg_primitresdias){
            $fecha_juesab = $this->obtener_fecha_sorteo("lunsab", $this->reg_fecha);
            $fecha_juesab_lit = "Lunes, Jueves y Sábado";
        }else{
            $fecha_juesab = $this->obtener_fecha_sorteo("juesab", $this->reg_fecha);
            $fecha_juesab_lit = "Jueves y Sábado";
        }   
    
        // Obtener apuestas.
        $num_sorteo = $this->obtener_numeros_sorteo($this->reg_numfijo);
        $reintegros = [$this->reg_numfijor, $this->reg_numfijor];

        $apuesta_fija[] = [
            'titulo'     => "Primitiva Fija Semanal",
            'subtitulo'  => $fecha_juesab_lit,
            'color'      => "success",
            'fechas'     => $fecha_juesab,
            'imagen'     => "b_primitiva.png",
            'icono'      => "icon-PrimitivaAJ",
            'numeros'    => $num_sorteo,
            'reintegros' => $reintegros,
            'premio'     => $imp_premio
        ];

        return $apuesta_fija;

    }



    
}