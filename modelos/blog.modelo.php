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
}
