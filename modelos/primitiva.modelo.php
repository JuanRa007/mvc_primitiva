<?php

require_once "conexion.php";

class ModeloPrimitiva{

    // Obtenemos el Ultimo premio obtenido.
    static public function mdlObtenerUltPremio(string $tabla, string $item, int $valor){

        $sql = "SELECT * FROM $tabla WHERE $item > :$item ORDER by fecha DESC LIMIT 1";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch();            

        $stmt->close();

        $stmt = "";
        
    }

    // Obtenemos el total de premios del añp en curso
    static public function mdlObtenerTotalAnnoPremios(string $tabla, string $item, string $itemini, string $itemfin ){

        $sql = "SELECT sum(premio) as totalpremios FROM $tabla WHERE $item >= STR_TO_DATE('".$itemini."' , '%Y-%m-%d %H:%i:%s') AND  $item <= STR_TO_DATE('".$itemfin."' , '%Y-%m-%d %H:%i:%s')";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->execute();

        return $stmt->fetch();            

        $stmt->close();

        $stmt = "";

    }

    static public function mdlObtenerTotalBote(string $tabla, string $item,string $valor){

        $sql = "SELECT SUM(importe) as totalsaldo, MAX(fecha) as totalfecha FROM $tabla WHERE $item = :$item";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();            

        $stmt->close();

        $stmt = "";

    }


    static public function funcFechaDiferencia(string $fecha_i, string $fecha_f): string {

        $datetime1 = date_create($fecha_i);
        $datetime2 = date_create($fecha_f);
        $interval = date_diff($datetime1, $datetime2);
    
        return $interval->format('%R%a días');
    }

    static public function funcGeneraTextoFecha(array $array_fecha, string $tipo_apuesta): string {

        // Inicializamos.
        $texto = "";
        $separador0 = " y ";
        $separador1 = ", ";
        $separador = "";
        $indicador = false;

        // Cuántas fechas nos llegan
        if ($tipo_apuesta != 'lotnavidad') {
            $tot_fechas = sizeof($array_fecha);
        } else {
            $tot_fechas = 1;
        }

        // Si es una apuesta especial, la fecha es de un día a otro.
        if ($tipo_apuesta == 'bonoloto') {
            $separador = " al ";
        } else {
            $separador = $separador0;
        }

        if (is_array($array_fecha)) {
            foreach ($array_fecha as $indice => $valor) {
                if (!$texto) {
                    $texto = $valor;
                } else {
                    if ($tot_fechas > 2 && $indicador == false) {
                        $separador = $separador1;
                        $indicador = true;
                    } else {
                        $separador = $separador0;
                    }
                    $texto = $texto . $separador . $valor;
                }
            }
        } else {
            $texto = $array_fecha;
        }

        return $texto;
    }


    static public function funcObtenerNombreFicheroDecimo(string $fecha, string $tipo_apuesta, bool $frontal, bool $porajax): string{

        // Inicializamos el nombre del fichero.
        $nombre_fich = "";

        // Definimos la ubicación.
        $ubicacion = "decimos/";
        $nombre_fich_404 = "404.png";
        $nombre_fichero = "_decimo";

        // Si el décimo es un de la once, el nombre cambia.
        if ($tipo_apuesta == 'laonce') {
            $nombre_fichero = "_once";
        }

        // Tratamos la fecha: 22/12/2020
        $nombre_fich = substr($fecha, 6, 4) . "-" . substr($fecha, 3, 2) . "-" . substr($fecha, 0, 2);

        // Añadimos lo último
        $nombre_fich = $ubicacion . $nombre_fich . $nombre_fichero;
        if ($frontal) {
            $nombre_fich = $nombre_fich . "f.jpg";
        } else {
            $nombre_fich = $nombre_fich . "t.jpg";
        }

        // Determinamos si existe el fichero.
        // Por la llamada ajax el fichero hay que mirarlo desde "php".
        if ($porajax) {
            //$nombre_fich_ajax = "../" . $nombre_fich;
            $nombre_fich_ajax = $blog["dominio"].'vistas/' . $nombre_fich;
        } else {
            $nombre_fich_ajax = $blog["dominio"].'vistas/' . $nombre_fich;
        }

        // Si no existe el fichero, devolvemos el 404.
        if (!file_exists($nombre_fich_ajax)) {
            $nombre_fich = $ubicacion . $nombre_fich_404;
        }

        return $nombre_fich;

    }


    static public function funcSeparaApuestas(array $registro): array {

        // Inicializamos el array para almacenar las apuestas separadas
        $apuestasSeparadas = [];

        // Comprobar que nos llega algo
        if (empty($registro)) {
            return $apuestasSeparadas; // Retornar un array vacío si no hay datos
        }

        $miApuesta = new ControladorPrimitiva();

        // Inicializamos las propiedades del objeto con los datos del registro
        $miApuesta ->mis_apuestas = [];

        // Fecha apuesta
        $miApuesta -> reg_fecha = $registro['fecha'];

        // Primitiva Fija Semanal
        $miApuesta -> reg_numfijo = $registro['numfijo'];
        $miApuesta -> reg_numfijor = $registro['numfijor'];

        // Primitiva Expecial
        $miApuesta -> reg_numvari = $registro['numvari'];
        $miApuesta -> reg_numvarir = $registro['numvarir'];

        // Euromillón
        $miApuesta -> reg_euromillon = $registro['euromillon'];
        $miApuesta -> reg_euroruno = $registro['euroruno'];
        $miApuesta -> reg_eurordos = $registro['eurordos'];

        // Otras apuestas.
        $miApuesta -> reg_otros = $registro['otros'];

        // Euromillón segundo
        $miApuesta -> reg_euromillon1 = $registro['euromillon1'];
        $miApuesta -> reg_euroruno1 = $registro['euroruno1'];
        $miApuesta -> reg_eurordos1 = $registro['eurordos1'];

        // Primitiva Expecial segunda
        $miApuesta -> reg_numvari1 = $registro['numvari1'];
        $miApuesta -> reg_numvari1r = $registro['numvari1r'];

        // Premio.
        $miApuesta -> reg_premio = $registro['premio'];

        // Euromillón: sólo viernes, sólo martes, semanal.
        $miApuesta -> reg_marvie = $registro['marvie'];

        // Primitiva: desde el 11/07/2022 pueden ser tres días de apuestas (lunes, martes y jueves)
        $miApuesta -> reg_primitresdias     = $registro['primitresdias'];
        $miApuesta -> reg_primivaritresdias = $registro['primivaritresdias'];


        // PRIMTIVA FIJA SEMANAL
        $apuestasSeparadas['primifija'] = $miApuesta ->prepara_primtiva_fija();

        // PRIMITIVA ESPECIAL
        $mi_apuesta =  $miApuesta ->prepara_primtiva_vari();
        if (!empty($mi_apuesta)) {
            $apuestasSeparadas['primisema'] = $mi_apuesta;
        }

        // EUROMILLÓN
        $mi_apuesta =  $miApuesta ->prepara_euromillones_vari();
        if (!empty($mi_apuesta)) {
            $apuestasSeparadas['euromvari'] = $mi_apuesta;
        }

        // OTROS
        $mi_apuesta =  $miApuesta ->prepara_bloque_otros();
        if (!empty($mi_apuesta)) {
            foreach ($mi_apuesta as $otro_tipo => $otro_apuesta) {
                $apuestasSeparadas[$otro_tipo] = $otro_apuesta;
            }
        }

        return $apuestasSeparadas;

    }

}