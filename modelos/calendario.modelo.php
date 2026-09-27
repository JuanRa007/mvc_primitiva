<?php

require_once "conexion.php";

class ModeloCalendario{

    // Propiedades de la clase
     public array $dias_apuestas = [];

    // Constructor de la clase
     public function __construct() {

     // Inicializar propiedades de la clase
        $this->dias_apuestas = [];
   }
    // Obtenemos los sorteos del mes.
    static public function ctrMostrarApuestasMes(string $diaini , string $diafin){

        $tabla = "numapuesta";

        $respuesta = ModeloCalendario::mdlSeleccionarApuestasMes($tabla, $diaini, $diafin);

        return $respuesta;

    }

    // Leemos las apuestas del mes/año indicados.
    static public function mdlSeleccionarApuestasMes(string $tabla, string $diaini, string $diafin){

        $sql = "SELECT DATE_FORMAT(fecha,'%d') as dfecha FROM $tabla WHERE fecha >= STR_TO_DATE('" . $diaini . "' , '%d-%m-%Y %H:%i:%s') and  fecha <= STR_TO_DATE('" . $diafin . "' , '%d-%m-%Y %H:%i:%s') ORDER by fecha";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = "";

    }


}