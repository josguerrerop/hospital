<?php
include('../class/clase_admin.php');
$tra=new Trabajo();
$tra->eliminar_especialidad($_GET['id_especialidad']);
?>