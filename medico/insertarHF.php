<?php
include('../class/agendamiento.php');


$m2=new Agendacion();

$idH =  $_REQUEST['visita'];

$m2->AgendaR(
    $idH,
        $_REQUEST['hora'],
        $_REQUEST['fecha']);

echo "<script type='text/javascript'>
        alert('¡Agendado !');
        window.location.href='agendaM.php';
        </script>";
?>