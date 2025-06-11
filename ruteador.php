<?php
include_once("controladores/controlador".$controlador.".php");

// Instanciando a patir de la clase ControladorPaginas
$objControlador="controlador".ucfirst($controlador);

$controlador=new $objControlador();

$controlador->$accion();

?>