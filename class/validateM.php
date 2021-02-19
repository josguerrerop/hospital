<?php
include('medico.php');

$correo=$_REQUEST['correo'];
$contraseña=$_REQUEST['contraseña'];

$medico = new Medico();
$id = $medico-> returnid($correo,$contraseña);

$sql = "select * from usuario where correo='$correo' and pass='$contraseña'";
$res =mysqli_query(Conectar::con(),$sql) 
or die("ERROR en la consulta $sql".mysqli_error(Conectar::con()));

if($row=mysqli_fetch_array($res)){
    session_start();
 $id = $medico-> returnid($correo,$contraseña);
 $_SESSION['id']=$id;
  echo "<script type='text/javascript'>
  alert('Bienvenido ".$_SESSION['id']." al sistema');
  window.location='../medico/inicioMedi.php';
  </script>";
}else{
    echo "<script type='text/javascript'>
    alert('ERROR!! el usuario o el password son incorrectos');
    window.location='../medico/loginMedic.php';
    </script>";
}

?>