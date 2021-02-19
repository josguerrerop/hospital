<?php
include('../class/clase_admin.php');
$tra=new Trabajo();
$tra->eliminar_medico($_GET['id_m']);
?>