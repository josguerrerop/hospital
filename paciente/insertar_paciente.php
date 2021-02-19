<?php
include('../class/clase_paciente.php');
$p=new Paciente();

$id =  $_REQUEST['numid'];
$nombre = $_REQUEST['nom'];


$p->insertar(
        $nombre,
        $_REQUEST['ape'],
        $_REQUEST['fecha'],
        $id,
        $_REQUEST['tel'],
        $_REQUEST['dir'],
        $_REQUEST['ema'],
        $_REQUEST['contra']);

        session_start();
        $_SESSION['id']=$id;

        
echo "<script type='text/javascript'>
        alert('¡ $nombre su registro fué exitoso !');
        window.location.href='../paciente/inicioPaci.php';
        </script>";
        

?>