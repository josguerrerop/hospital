<?php
include('../class/clase_admin.php');
$t=new Trabajo();
$t->ingresar($_REQUEST['correo'],$_REQUEST['pass']);
?>