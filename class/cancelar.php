<?php
include('agendamiento.php');

$m2=new Agendacion();

$idC =  $_REQUEST['visita'];

$m2->CancelaR($idC);

?>