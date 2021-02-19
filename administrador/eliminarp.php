<?php
include('../class/clase_admin.php');
$tra=new Trabajo();
$tra->eliminar_paciente($_GET['id_p']);
?>