<?php

    Class ControladorBlog{

        static public function ctrMostrarBlog(){

            $tabla = "blog";

            $respuesta = ModeloBlog::mdlMostrarBlog($tabla);

            return $respuesta;

        }


        static public function ctrMostrarUltimaApuesta(){

            $tabla = "numapuesta";

            $respuesta = ModeloBlog::mdlSeleccionarUltApuesta($tabla);

            return $respuesta;

        }


        static public function ctrObtenerFrases(){

            $tabla = "frases_celebres";

            $respuesta = ModeloBlog::mdlObtenerFrases($tabla);

            return $respuesta;

        }


        static public function ctrObtenerUnaFrase(string $item, int $valor){

            $tabla = "frases_celebres";

            $respuesta = ModeloBlog::mdlObtenerUnaFrase($tabla, $item, $valor);

            return $respuesta;

        }

        static public function ctrObtenerUltimoPremio(){

            $tabla = "numapuesta";
            $item = "premio";
            $valor=0;

            $respuesta = ModeloPrimitiva::mdlObtenerUltPremio($tabla,$item, $valor);

            return $respuesta;


        }

        static public function ctrObtenerTotalAnnoPremios(){

            $tabla = "numapuesta";
            $item = "fecha";
            
            $ano_hoy = date('Y');
            $valorini = $ano_hoy ."-01-01". " 00:00:00";
            $valorfin = $ano_hoy ."-12-31". " 00:00:00";
            
            $respuesta = ModeloPrimitiva::mdlObtenerTotalAnnoPremios($tabla,$item, $valorini, $valorfin);

            return $respuesta;

        }

        static public function ctrObtenerTotalBote(){

            $tabla = "aportaciones";
            $item = "participante";
            $valor = "BOTE";

            $respuesta = ModeloPrimitiva::mdlObtenerTotalBote($tabla,$item,$valor);

            return $respuesta;

        }


        static public function ctrMostrarSaldosParticipantes(){

            $tabla1 = "participantes";
            $tabla2 = "aportaciones";

            $respuesta = ModeloBlog::mdlMostrarSaldosParticipantes($tabla1, $tabla2);

            return $respuesta;

        }
}