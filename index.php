<?php

# Controladores
require_once "controladores/primitiva.controlador.php";
require_once "controladores/plantilla.controlador.php";
require_once "controladores/blog.controlador.php";
require_once "controladores/calendario.controlador.php";

# Modelos
require_once "modelos/blog.modelo.php";
require_once "modelos/primitiva.modelo.php";
require_once "modelos/calendario.modelo.php";


$plantilla = new ControladorPlantilla();
$plantilla -> ctrTraerPlantilla();