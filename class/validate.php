<?php
include('clase_paciente.php');

$correo=$_REQUEST['correo'];
$contraseña=$_REQUEST['contraseña'];

$paciente = new Paciente();
$id = $paciente-> returnid($correo,$contraseña);

$sql = "select * from usuario where correo='$correo' and pass='$contraseña'";
$res =mysqli_query(Conectar::con(),$sql) 
or die("ERROR en la consulta $sql".mysqli_error(Conectar::con()));


if($row=mysqli_fetch_array($res)){
    session_start();
 $id = $paciente-> returnid($correo,$contraseña);
 $_SESSION['id']=$id;
  echo "<script type='text/javascript'>
  alert('Bienvenido ".$_SESSION['id']." al sistema');
  window.location='../paciente/inicioPaci.php';
  </script>";
}else{
    echo "<script type='text/javascript'>
    alert('ERROR!! el usuario o el password son incorrectos');
    window.location='../paciente/loginPaci.php';
    </script>";
}

?>