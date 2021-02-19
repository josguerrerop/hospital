<?php
include('../class/clase_admin.php');

$t=new Trabajo();
$t->insertar_medico($_REQUEST['id_m'],
$_REQUEST['nombre_m'],
$_REQUEST['apellidos_m'],
$_REQUEST['fecha_nacm'],
$_REQUEST['direccion_m'],
$_REQUEST['telefono_m'],
$_REQUEST['correo_m'],
$_REQUEST['pass_m'],
$_REQUEST['nombre_e']);

?>