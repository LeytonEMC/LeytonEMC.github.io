<?php

$controlador="paginas";
$accion="inicio";

if(isset($_GET['controlador']) && isset($_GET['accion'])){

// se obtiene los valores del controlador y accion

if(($_GET['controlador']!="") && ($_GET['accion']!="")){
    $controlador=$_GET['controlador'];
    $accion=$_GET['accion'];

}

}

require_once("vistas/template.php");

?>