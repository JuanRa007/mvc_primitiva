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


}