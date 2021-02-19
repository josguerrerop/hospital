<?php
include('../class/clase_admin.php');

$t=new Trabajo();
$t->insertar_especialidad(
$_REQUEST['id_especialidad'],
$_REQUEST['nombre_e']);

?>