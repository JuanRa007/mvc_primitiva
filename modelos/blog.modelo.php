<?php 

require_once "conexion.php";

class ModeloBlog{

    // Obtenemos los valores predeterminados para la página web.
    static public function mdlMostrarBlog(string $tabla){

        $sql = "SELECT * FROM $tabla";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = "";

    }


    // Buscamos la apuesta actual
    static public function mdlSeleccionarUltApuesta(string $tabla){

        $sql = "SELECT * FROM $tabla ORDER BY fecha DESC LIMIT 1";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = "";

    }

    
    // Obtenemos las frases célebres
    static public function mdlObtenerFrases(string $tabla){

        $sql = "SELECT * FROM $tabla";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = "";

    }


    // Obtenemos UNA frase
    static public function mdlObtenerUnaFrase(string $tabla, string $item, int $valor){

        $sql = "SELECT * FROM $tabla WHERE $item = :$item";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch();            

        $stmt->close();

        $stmt = "";

    }

    // Obtenemos los saldos de los participantes
    static public function mdlMostrarSaldosParticipantes(string $tabla1, string $tabla2){

        // SELECT 
        //     p.participante,
        //     COALESCE(SUM(a.importe), 0.0000) AS total_aportado,
        //     MAX(a.fecha) AS ultima_fecha_aportacion
        // FROM participantes p
        // LEFT JOIN aportaciones a ON p.participante = a.participante
        // GROUP BY p.participante
        // ORDER BY p.participante ASC;
        $sql = "SELECT $tabla1.participante, COALESCE(SUM($tabla2.importe), 0.0000) AS total_aportado, MAX($tabla2.fecha) AS ultima_fecha_aportacion FROM $tabla1 LEFT JOIN $tabla2 ON $tabla1.participante = $tabla2.participante GROUP BY $tabla1.participante ORDER BY $tabla1.participante ASC";

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = "";

    }   
}
