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
     public bool $reg_euromillonEspecial;
     public string $reg_otrosTroceados;
     public array $reg_fechasApuOtros;
     public array $reg_numerosApuOtros;
     public array $reg_reintegros1ApuOtros;
     public array $reg_reintegros2ApuOtros;


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
        $this->reg_euromillonEspecial = false;
        $this->reg_otrosTroceados = '';
        $this->reg_fechasApuOtros = [];
        $this->reg_numerosApuOtros = [];
        $this->reg_reintegros1ApuOtros = [];
        $this->reg_reintegros2ApuOtros = [];
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

            case 'diamar':
                if ($diasemana < 2) {
                    // Incrementamos el día hasta ser martes.
                    $diasumres = (2 - $diasemana);
                    $opesumres = "+";
                } elseif ($diasemana > 2) {
                    // Decrementamos el día hasta ser martes.
                    $diasumres = ($diasemana - 2);
                    $opesumres = "-";
                }
                if ($diasumres) {
                    $fecha_new = date("d/m/Y", strtotime($fecha . $opesumres . $diasumres . " days"));
                } else {
                    $fecha_new = strtotime($fecha);
                    $fecha_new = date( 'd/m/Y', $fecha_new);
                }
                $fechas_proceso[] = $fecha_new;
                break;

            case 'diavie':
                if ($diasemana < 5) {
                    // Incrementamos el día hasta ser viernes.
                    $diasumres = (5 - $diasemana);
                    $opesumres = "+";
                } elseif ($diasemana > 5) {
                    // Decrementamos el día hasta ser viernes.
                    $diasumres = ($diasemana - 5);
                    $opesumres = "-";
                }
                if ($diasumres) {
                    $fecha_new = date("d/m/Y", strtotime($fecha . $opesumres . $diasumres . " days"));
                } else {
                    $fecha_new = strtotime($fecha);
                    $fecha_new = date( 'd/m/Y', $fecha_new);
                }
                $fechas_proceso[] = $fecha_new;
                break;

            case 'marvie':
                if ($diasemana < 2) {
                    // Incrementamos el día hasta ser martes.
                    $diasumres = (2 - $diasemana);
                    $opesumres = "+";
                } elseif ($diasemana > 2) {
                    // Decrementamos el día hasta ser martes.
                    $diasumres = ($diasemana - 2);
                    $opesumres = "-";
                }
                if ($diasumres) {
                    $fecha_new = date("d/m/Y", strtotime($fecha . $opesumres . $diasumres . " days"));
                } else {
                    $fecha_new = strtotime($fecha);
                    $fecha_new = date( 'd/m/Y', $fecha_new);    
                }
                $fechas_proceso[] = $fecha_new;

                // Ahora el viernes siguiente.
                $diasumres += 3;
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

    // Funcion para determinar fechas según MARVIE.
    private function obtener_valor_marvie(){

        // Inicializar variables.
        $tipo_fecha = "";

        switch ($this->reg_marvie) {
            case 'M':
                $tipo_fecha = "diamar";                 // "Martes"
                break;
            case 'V':
                $tipo_fecha = "diavie";                 // "Viernes"
                break;
            case 'T':
                $tipo_fecha = "marvie";                 // "Martes y Viernes"
                break;
            default:
                $tipo_fecha = "marvie";                 // "Martes y Viernes"
                break;
        }

        return $tipo_fecha;

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


    // Devuelve un array con las apuestas en la PRIMITIVA POSIBLE.
    public function prepara_primtiva_vari(){

        // Incializar variable a devolver.
        $apuesta_fija = [];

        // Viene el primer bloque de primitva especial.
        if($this->reg_numvari){

            // Buscar el jueves y sábado de la fecha indicada, o lunes, jueves y sábado.
            if($this->reg_primivaritresdias){
                $fecha_juesab = $this->obtener_fecha_sorteo("lunsab", $this->reg_fecha);
                $fecha_juesab_lit = "Lunes, Jueves y Sábado";
            }else{
                $fecha_juesab = $this->obtener_fecha_sorteo("juesab", $this->reg_fecha);
                $fecha_juesab_lit = "Jueves y Sábado";
            }   

            // Guardamos el reintegro.
            $reintegros[] = $this->reg_numvarir;

            // Puede haber otra apuesta en el campo correspondiente.
            if($this->reg_numvari1){
                $this->reg_numvari = $this->reg_numvari . " / " . $this->reg_numvari1;
                $reintegros[] = $this->reg_numvari1r;
            }

            $num_sorteo = $this->obtener_numeros_sorteo($this->reg_numvari);

            $apuesta_fija[] = [
            'titulo'     => "Primitiva Semanal",
            'subtitulo'  => $fecha_juesab_lit,
            'color'      => "success",
            'fechas'     => $fecha_juesab,
            'imagen'     => "b_primitiva.png",
            'icono'      => "icon-PrimitivaAJ",
            'numeros'    => $num_sorteo,
            'reintegros' => $reintegros,
            'premio'     => ""
            ];

        }

        return $apuesta_fija;
    
    }   
    
    // Devuelve un array con las apuestas en el EUROMILLÓN.
    public function prepara_euromillones_vari(){

        // Incializar variable a devolver.
        $apuesta_fija = [];
        $euromillon_pro = "";
        $reintegros = [];

        // Mensajes por defecto.
        $strtitulo = "Euromillones";
        $strsubtitulo = "Martes y Viernes";

        // Es una apuesta especial de Euromillón.
        if($this->reg_euromillonEspecial){
            $strtitulo = "Euromillones Especial";
            // Dependiendo del valor de MARVIE, el subtítulo cambia.
            if($this->reg_marvie == 'M'){
                $strsubtitulo = "Martes";
            }elseif($this->reg_marvie == 'V'){
                $strsubtitulo = "Viernes";
            }elseif($this->reg_marvie == 'T'){
                $strsubtitulo = "Martes y Viernes";
            }else{
                $strsubtitulo = "Martes y Viernes";
            }
        }

        // Controlar "marvie"
        $tipo_fecha = $this->obtener_valor_marvie();

        // Nos llegan dos apuestas de Euromillón.
        if($this->reg_euromillon or count($this->reg_numerosApuOtros)> 0){
            $fecha_marvie = $this->obtener_fecha_sorteo($tipo_fecha, $this->reg_fecha);


            // Comprobamos si es una apuesta múltiple.
            if (count($this->reg_numerosApuOtros)>0) {
                
                $euromillon_pro = "";
                for ($i=0; $i < count($this->reg_reintegros1ApuOtros) ; $i++) { 
                    $reintegros[] = $this->reg_reintegros1ApuOtros[$i] . " - " . $this->reg_reintegros2ApuOtros[$i];
                }
                for ($i=0; $i < count($this->reg_numerosApuOtros); $i++) { 
                    if ($i < 1) {
                        $euromillon_pro = $this->reg_numerosApuOtros[$i];
                    } else {
                        $euromillon_pro = $euromillon_pro . " / " . $this->reg_numerosApuOtros[$i];
                    }
                    
                }

            } else {

                $euromillon_pro =  $this->reg_euromillon;
                $euroruno = number_format($this->reg_euroruno, 0, ',', '.');
                if (strlen($euroruno) == 1) {
                    $euroruno = '0' . $euroruno;
                }
                $eurordos = number_format($this->reg_eurordos, 0, ',', '.');
                if (strlen($eurordos) == 1) {
                    $eurordos = '0' . $eurordos;
                }
                $reintegros[] = $euroruno . " - " . $eurordos;

                // Segundo grupo de apuestas de Euromillón.
                if($this->reg_euromillon1){
                    $euromillon_pro .= " / " . $this->reg_euromillon1;
                    $euroruno1 = number_format($this->reg_euroruno1, 0, ',', '.');
                    if (strlen($euroruno1) == 1) {
                        $euroruno1 = '0' . $euroruno1;
                    }
                    $eurordos1 = number_format($this->reg_eurordos1, 0, ',', '.');
                    if (strlen($eurordos1) == 1) {
                        $eurordos1 = '0' . $eurordos1;
                    }
                    $reintegros[] = $euroruno1 . " - " . $eurordos1;
                } 

            }

            $num_sorteo = $this->obtener_numeros_sorteo($euromillon_pro);

            $apuesta_fija[] = [
                'titulo'     => $strtitulo,
                'subtitulo'  => $strsubtitulo,
                'color'      => "primary",
                'fechas'     => $fecha_marvie,
                'imagen'     => "b_euromillones.png",
                'icono'      => "icon-EuromillonesAJ",
                'numeros'    => $num_sorteo,
                'reintegros' => $reintegros,
                'premio'     => ""
            ]; 

        }

        return $apuesta_fija;

    }

    // Devuelve un array con las apuestas en OTROS.
    public function prepara_bloque_otros(){
        
        // Incializar variable a devolver.
        $apuesta_fija = [];
        // Separador.
        $text_separador = "--------";

        // Nos llegan apuestas en el campo "otros".
        if($this->reg_otros){ 

            // Trabajamos con una copia.
            $otros_bak = $this->reg_otros;

            // Separamos por líneas.
            while (strlen($otros_bak)){

                // Inicializamos la variable a tratar.
                $strmirar = "";

                // Nos quedamos con la parte hasta $text_separador.
                $pos_final = stripos($otros_bak, $text_separador);
                if ($pos_final !== false) {
                    $strmirar = trim(substr($otros_bak, 0, $pos_final));
                    $otros_bak = trim(substr($otros_bak, $pos_final + strlen($text_separador)));
                } else {
                    $strmirar = trim($otros_bak);
                    $otros_bak = "";
                }

                // Buscamos Euromillones.
                //=======================
                $pos1 = stripos($strmirar, "Euromillón");
                if ($pos1 !== false){

                     // Nos guardamos el troza a tratar.
                    $this->reg_otrosTroceados = $strmirar;
                    $this->reg_euromillonEspecial = true;  // Es una apuesta especial de Euromillón.

                    // Obtenemos los datos del Sorteo de Euromillones.
                    $mi_apuesta = $this->prepara_otros_euromillones_espec();

                    if ($mi_apuesta) {
                        $apuesta_fija['otroeuromvari'] = $mi_apuesta;
                    }

                }   // Fin EUROMILLONES


                // Buscamos Décimo.
                //=======================
                $pos1 = strpos($strmirar, "Décimo");      // Usamos STRPOS para distinguir mayúsculas y minúsculas.
                if ($pos1 !== false){
        
                     // Nos guardamos el troza a tratar.
                    $this->reg_otrosTroceados = $strmirar;

                    // Obtenemos los datos del Décimo.
                    $mi_apuesta = $this->prepara_otros_decimo();

                    if ($mi_apuesta) {
                        $apuesta_fija['lotnavidad'] = $mi_apuesta;
                    }

                }   // Fin DÉCIMO


                // Buscamos Bonoloto.
                //=======================
                $pos1 = stripos($strmirar, "Bonoloto");
                if ($pos1 !== false) {

                }  // Fin BONOLOTO


                // Buscamos El Gordo.
                //=======================
                $pos1 = stripos($strmirar, "El Gordo");
                if ($pos1 !== false) {

                    // Nos guardamos el troza a tratar.
                    $this->reg_otrosTroceados = $strmirar;

                    // Obtenemos los datos del Sorteo de El Gordo.
                    $mi_apuesta = $this->prepara_otros_elgordo();

                    if ($mi_apuesta) {
                        $apuesta_fija['elgordo'] = $mi_apuesta;
                    }

                }   // Fin EL GORDO


                // Buscamos Once.
                //=======================
                $pos1 = stripos($strmirar, "Once");
                if ($pos1 !== false) {


                }   // Fin ONCE


                // Buscamos Aviso.
                //=======================
                $pos1 = strpos($strmirar, "Aviso");      // Usamos STRPOS para distinguir mayúsculas y minúsculas.
                if ($pos1 !== false) {

                    // Nos guardamos el troza a tratar.
                    $this->reg_otrosTroceados = $strmirar;

                    // Obtenemos los datos del Aviso (sólo texto).
                    $mi_apuesta = $this->prepara_otros_aviso();

                    if ($mi_apuesta) {
                        $apuesta_fija['aviso'] = $mi_apuesta;
                    }

                }   // Fin AVISO



                // Buscamos PrimitivaE.
                //=======================
                $pos1 = stripos($strmirar, "PrimitivaE");
                if ($pos1 !== false) {

                }   // Fin PRIMITIVAE


                // Buscamos PrimitivaT.
                //=======================
                $pos1 = stripos($strmirar, "PrimitivaT");
                if ($pos1 !== false) {

                }   // Fin PRIMITIVAT


                // Buscamos Desconocido
                //=======================
                if ($strmirar) {

                }   // Fin DESCONOCIDO

            }   // Fin while

        }   // Fin if($this->reg_otros)

        return $apuesta_fija;

    }

    // Prepara el bloque de aviso en OTROS.
    public function prepara_otros_aviso(){

         // Incializar variable a devolver.
        $apuesta_fija = [];

        // Obtenemos la fecha del sorteo.
        $fecha_aviso = strtotime($this->reg_fecha);
        $fecha_aviso = date( 'd/m/Y', $fecha_aviso);

        // Separamos el aviso en cabecera y mensaje.
        $titulo_aviso = "Mensaje emitido el día: " . $fecha_aviso;
        $mensaje_aviso = $this->prepara_texto_aviso();

        // Agregamos el aviso al array de apuestas.
        $apuesta_fija[] = [
        'titulo'     => $titulo_aviso,
        'subtitulo'  => $mensaje_aviso,
        'color'      => "success",
        'fechas'     => $fecha_aviso,
        'imagen'     => "",
        'icono'      => "",
        'numeros'    => "",
        'reintegros' => "",
        'premio'     => ""
        ];

        return $apuesta_fija;
   
    }

    // Prepara el bloque de décimo en OTROS.
    public function prepara_otros_decimo(){

        // Incializar variable a devolver.
        $apuesta_fija = [];

        // Obtenemos la fecha del sorteo.
        $fecha_fichero = strtotime($this->reg_fecha);
        $fecha_fichero = date( 'd/m/Y', $fecha_fichero);

        // Buscamos la fecha del sorteo en el texto.
        $fecha_sorteo = $this->busca_fecha_otrosTroceados($this->reg_otrosTroceados);
        $fecha_sorteo[0] = strtotime($fecha_sorteo[0]);
        $fecha_sorteo[0] = date( 'd/m/Y', $fecha_sorteo[0]);

        // Obtenemos el número del décimo.
        $num_sorteo= $this->busca_numero_decimo_otrosTroceados($this->reg_otrosTroceados);

        // Obtenemos el Serie y Fracción del décimo.
        $reintegros = $this->busca_SerieFraccion_otrosTroceados($this->reg_otrosTroceados, true);


        $apuesta_fija[] = [
        'titulo'     => "Lotería Nacional",
        'subtitulo'  => "Sorteo de Navidad",
        'color'      => "info",
        'fechas'     => $fecha_sorteo,
        'imagen'     => "b_loteria.png",
        'icono'      => "icon-LoteriaNacionalAJ",
        'numeros'    => $num_sorteo,
        'reintegros' => $reintegros,
        'premio'     => "",
        'nom_fich'   => $fecha_fichero
        ];

        return $apuesta_fija;

    }

    // Prepara el bloque de euromillones Especial en OTROS.
    public function prepara_otros_euromillones_espec(){

        // Ahora tenemos un string con apuestas de euromillones.
        // Puede haber varias fechas, puede haber varias apuestas.

        // Incializar variable a devolver.
        $apuesta_fija = [];

        // Preparamos los datos para que la función que prepara el bloque de euromillones Especial pueda trabajar con ellos.
        
        // Obtenemos las fechas del sorteo (puede haber varias).
        $fecha_sorteo = $this->busca_fecha_otrosTroceados($this->reg_otrosTroceados);

        // Si son varias, puede ser Martes y Viernes, o sólo Martes o sólo Viernes. Lo indicamos en la propiedad reg_marvie.
        if(count($fecha_sorteo) > 1){
            $this->reg_marvie = "T";  // Martes y Viernes
        }else{
            // Indicamos si es Martes o Viernes.
            $fecha_sorteo_texto = $fecha_sorteo[0];
            $fecha_sorteo_texto = strtotime($fecha_sorteo_texto);
            $diasemana = date("N", $fecha_sorteo_texto);
            if($diasemana == 2){
                $this->reg_marvie = "M";  // Martes
            }elseif($diasemana == 5){
                $this->reg_marvie = "V";  // Viernes
            }else{
                $this->reg_marvie = "T";  // Martes y Viernes
            }
        }

        // Obtenemos los números de la apuesta.
        $apuestaEuromilloEspecial = $this->busca_numeros_apuestas_otrosTroceados($this->reg_otrosTroceados);

        // Devolvemos los valores obtenidos a las variables del objeto.
        $this->reg_numerosApuOtros = $apuestaEuromilloEspecial["numeros"];
        $this->reg_reintegros1ApuOtros = $apuestaEuromilloEspecial["reintegros1"];
        $this->reg_reintegros2ApuOtros = $apuestaEuromilloEspecial["reintegros2"];

        // Llamamos a la función que prepara el bloque de euromillones Especial.
        $apuesta_fija = $this->prepara_euromillones_vari();

        return $apuesta_fija;

    }

    // Prepara el bloque de el gordo en OTROS.
    public function prepara_otros_elgordo()  {
        
        // Ahora tenemos un string con apuestas de el gordo.
        // Puede haber varias fechas, puede haber varias apuestas.

        // Incializar variable a devolver.
        $apuesta_fija = [];

        // Preparamos los datos para que la función que prepara el bloque de euromillones Especial pueda trabajar con ellos.
        
        // Obtenemos las fechas del sorteo (puede haber varias): El Gordo sólo debe de venir una.
        $fecha_sorteo = $this->busca_fecha_otrosTroceados($this->reg_otrosTroceados);
        $this->reg_fechasApuOtros = $fecha_sorteo;

        // Obtenemos los números de la apuesta.
        $apuestaElGordo = $this->busca_numeros_apuestas_otrosTroceados($this->reg_otrosTroceados);

        // Devolvemos los valores obtenidos a las variables del objeto.
        $this->reg_numerosApuOtros = $apuestaElGordo["numeros"];
        $this->reg_reintegros1ApuOtros = $apuestaElGordo["reintegros1"];
        $this->reg_reintegros2ApuOtros = $apuestaElGordo["reintegros2"];

        // Llamamos a la función que prepara el bloque de euromillones Especial.
        $apuesta_fija = $this->prepara_elgordo_vari();

        return $apuesta_fija;

    }

    // Devuelve un array con las apuestas en el EUROMILLÓN.
    public function prepara_elgordo_vari(){

        // Incializar variable a devolver.
        $apuesta_fija = [];
        $elgordo_pro = "";
        $elgordo_runo = "";
        $reintegros = [];

        // Mensajes por defecto.
        $strtitulo = "El Gordo";
        $strsubtitulo = "Semanal";

        // Comprobamos si es una apuesta múltiple.
        if (count($this->reg_numerosApuOtros)>0) {
            
            for ($i = 0; $i < count($this->reg_reintegros1ApuOtros); $i++) {
                $reintegros[] = $this->reg_reintegros1ApuOtros[$i];
            }
            for ($i = 0; $i < count($this->reg_numerosApuOtros); $i++) {
                if ($i < 1) {
                    $elgordo_pro = $this->reg_numerosApuOtros[$i];
                } else {
                    $elgordo_pro = $elgordo_pro . " / " . $this->reg_numerosApuOtros[$i];
                }
            }

        } else {

            $elgordo_pro =  $this->reg_numerosApuOtros;
            $elgordo_runo = $this->reg_reintegros1ApuOtros;
            $elgordo_runo = number_format($this->reg_euroruno, 0, ',', '.');
            if (strlen($elgordo_runo) == 1) {
                $elgordo_runo = '0' . $elgordo_runo;
            }
            $reintegros[] = $elgordo_runo;

        }

        $num_sorteo = $this->obtener_numeros_sorteo($elgordo_pro);

          $apuesta_fija[] = [
            'titulo'     => $strtitulo,
            'subtitulo'  => $strsubtitulo,
            'color'      => "danger",
            'fechas'     => $this->reg_fechasApuOtros,
            'imagen'     => "b_elgordo.png",
            'icono'      => "icon-ElGordoAJ",
            'numeros'    => $num_sorteo,
            'reintegros' => $reintegros,
            'premio'     => ""
        ];


        return $apuesta_fija;

    }


    // -----------------------------------------------------------------
    // |                                                               | 
    // | FUNCIONES NECESARIAS PARA EL FUNCIONAMIENTO DE LAS ANTERIORES |
    // |                                                               | 
    // -----------------------------------------------------------------

    // Prepara el texto del aviso en OTROS.
    public function prepara_texto_aviso(){

        // Inicializamos la variable a devolver.
        $texto_aviso = "";

        // Separamos el aviso en cabecera y mensaje.
        $pos1 = strpos($this->reg_otrosTroceados, ":");      // Usamos STRPOS para distinguir mayúsculas y minúsculas.
        if ($pos1 !== false) {
            $texto_aviso = trim(substr($this->reg_otrosTroceados, $pos1 + strlen(":")));
        }else{
            $texto_aviso = trim($this->reg_otrosTroceados);
        }

        return $texto_aviso;
    
    }

    // Busca la fecha del sorteo en el texto de OTROS: devuelve en array con las fechas en formato dd/mm/yyyy.
    public function busca_fecha_otrosTroceados(string $texto){

        // Inicializamos la variable a devolver.
        $fecha_sorteo = [];

        // Buscamos el primer paréntesis
        $posa = stripos($texto, "(");
        $posc = stripos($texto, ")");
        $poslen = $posc - $posa - 1;
        $fecha_sorteo_texto = trim(substr($texto, $posa + 1, $poslen));
        $aprefechas = explode('-', $fecha_sorteo_texto);

        // Convertimos las fechas a formato dd/mm/yyyy y en una tabla.
        foreach ($aprefechas as $key => $value) {
            $value = trim($value);
            $fecha_new = strtotime($value);

            // TODO: La fecha no funciona. Cuidado con el uso al resto de los OTROS

            echo '<br><br><br><br>FECHA OTROS THIS 3 >>>>'.$fecha_new.'<br><br>';

            $fecha_new = date('d/m/Y', $fecha_new);
            $fecha_sorteo[] = $fecha_new;
        }

        echo '<br><br><br><br>FECHA OTROS THIS 2 >>>>'.$fecha_sorteo[0].'<br><br>';


        return $fecha_sorteo;

    }

    // Busca el número del décimo en el texto de OTROS.
    public function busca_numero_decimo_OtrosTroceados(string $texto){
     
        // Inicializamos la variable a devolver.
        $num_sorteo = "";

        // Buscamos el separador ":"
        $posa = stripos($texto, ":");
        $posb = stripos($texto, "S");
        $poslen = $posb - $posa - 1;

        // Número del décimo.
        $num_sorteo = trim(substr($texto, $posa + 1, $poslen));

        return $num_sorteo;
    }

    // Busca la Serie y al Fracción del décimo en el texto de OTROS.
    public function busca_SerieFraccion_otrosTroceados(string $texto, bool $fraccion= false){

        // Inicializamos la variable a devolver.
        $serieFraccion = "";
        $strserie = "";
        $strfraccion = "";

        // Textos a buscar.
        $str_serie = "rie:";
        $str_fraccion = "Fracción:";

        // Buscamos la serie
        $posa = stripos($texto, $str_serie);
        // Serie del décimo.
        $strserie = trim(substr($texto, $posa + strlen($str_serie), 6));

        // Buscamos la fracción
        $posb = stripos($texto, $str_fraccion);
        // Fracción del décimo.
        $strfraccion = trim(substr($texto, $posb + strlen($str_fraccion)));

        // Devolvemos la serie y la fracción.
        if($fraccion){
            $serieFraccion = $strserie . " - " . $strfraccion;
        }else{
            $serieFraccion = $strserie;
        }
        
        return $serieFraccion;

    }


    // Busca los números de la apuesta en el texto de OTROS.
    public function busca_numeros_apuestas_otrosTroceados(string $strapuesta){

        // Inicializamos la variable a devolver.
        $anumbers = [];
        $reintegros = [];
        $strapureiuno = [];
        $strapureidos = [];

        // Buscamos el separador ":"
        $posa = stripos($strapuesta, ":");
        $strnumber = trim(substr($strapuesta, $posa + 1));
        $aprenumbers = explode('/', $strnumber);
  
        // Tratamos cada apuesta a formato de la aplicación.
        foreach ($aprenumbers as $key => $value) {
            $preint = stripos($value, "R.");
            $anumbers[] = trim(substr($value, 0, $preint - 1));
            $reintegros = explode("-", trim(substr($value, $preint + 2)));
            $strapureiuno[] =  $reintegros[0];
            if (count($reintegros) > 1) {
                $strapureidos[] =  $reintegros[1];
            }
        }

        $devolver = [
                        "numeros" => $anumbers,
                        "reintegros1" => $strapureiuno,
                        "reintegros2" => $strapureidos
        ];

        return $devolver;               // $anumbers;

    }


}