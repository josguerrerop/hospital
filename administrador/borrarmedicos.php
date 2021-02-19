<?php
session_start();
include('../class/clase_admin.php');
$inn=1000;
if(isset($_SESSION['timeout'])){
    $_session_life=time() - $_SESSION['timeout'];
    if($_session_life>$inn){
        session_destroy();
        header("location:loginA.php");
    }
}
$_SESSION['timeout']=time();
if($_SESSION['usuario']){
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
        <title>Eliminar medicos</title>
        <script type="text/javascript" lenguage="javascript" src="../js/funciones.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/estilotablaseli.css">
        <div class="cabecera">
            <div>
                <a href="medicosAdmin.php"><img src="../img/atras.png" alt=""></a>
            </div>
            <div>
                <h1>Dar de baja a médicos</h1>
            </div>
            <div>
                <h1 align="center">|MÉDICOS</h1>
        </div>
    </div>
</head> 
<?php
    $t=new Trabajo();
    $reg=$t->ver_medicos();
?>
<br>
<br><br>
<div class="cuerpo">
<table>
    <tr>
    <th>Identificación</th>
    <th>Nombres</th>
    <th>Fecha nacimiento</th>
    <th>Dirección</th>
    <th>Teléfono</th>
    <th>Correo electrónico</th>
    <th>Especialidad</th>
    <th></th>    
</tr>

<?php
    for($i=0;$i<count($reg);$i++){
    echo "<tr>
    <td align='center'>".$reg[$i]['id_m']."</td>
    <td align='center'>".$reg[$i]['nombre_m']." ".$reg[$i]['apellidos_m']."
    <td align='center'>".$reg[$i]['fecha_nacm']."</td>
    <td align='center'>".$reg[$i]['direccion_m']."</td>
    <td align='center'>".$reg[$i]['telefono_m']."</td>
    <td align='center'>".$reg[$i]['correo_m']."</td>
    <td align='center'>".$reg[$i]['nombre_e']."</td>";
?>
    <td align="center">
    <a href="javascript:void(0);" 
    onClick="eliminar('eliminarm.php?id_m=<?php echo $reg[$i]['id_m'];?>')"
    title='Eliminar'><img src="../img/elim.jpg" width="25" height="25" ></a>
    </td>
    </tr>
<?php
    }
?>
    
    </body>
 
  </html>
<?php
}
else{
    echo "<script type='text/javascript'>
    alert('¡Debe iniciar sesion!');
    window.location='loginA.php';
    </script>";
}
?>