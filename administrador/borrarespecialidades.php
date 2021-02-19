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
        <title>Borrar especialidades</title>
        <script type="text/javascript" lenguage="javascript" src="../js/funciones.js">
        </script>
        <link rel="stylesheet" type="text/css" href="../css/estilotablaseli.css">
        <div class="cabecera">
            <div>
                <a href="especialidadesAdmin.php"><img src="../img/atras.png" alt=""></a>
            </div>
            <div>
                <h1>Eliminar especialidades</h1>
            </div>
            <div>
                <h1 align="center">|ESPECIALIDADES</h1>
        </div>
    </div>
</head>

<?php
    $t=new Trabajo();
    $reg=$t->ver_especialidades();
?>

<div class="cuerpo">
    <table>
    <tr><th>Identificación especialidad</th>
    <th>Nombre</th>
    <th>Eliminar</th></tr>

<?php
    for($i=0;$i<count($reg);$i++){
    echo "<tr>
    <td align='center'>".$reg[$i]['id_especialidad']."</td>
    <td align='center'>".$reg[$i]['nombre_e']."</td>";
?>
    
    <td align="center">
    <a href="javascript:void(0);" 
    onClick="eliminar('eliminare.php?id_especialidad=<?php echo $reg[$i]['id_especialidad'];?>')"
    title='Eliminar'><img src="../img/elim.jpg" width="25" height="25" ></a>
    </td>

</tr>
  </html>
<?php
}
?>
    
</table>

<?php
}
else{
    echo "<script type='text/javascript'>
    alert('ERROR!! debe iniciar SESION');
    window.location='loginA.php';
    </script>";
}
?>