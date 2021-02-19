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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIENVENIDO</title>
    <link rel="stylesheet" href="../css/estilosadminn.css" type="text/css">
</head>
<body>
    <div class="container">
        <div class="cabecera">
            <div>
                <h1>Administrador:
                <?php    
                echo "  ".$_SESSION['usuario']."";
                ?>
                </h1>
            </div>
            <div align="right" class="subcab2">
                <a href="salir.php"><img src="../img/cerrar-sesion.png" alt=""></a>
            </div>

            <div>

            </div>
        </div>
        <div class="menu">

            <div class="op1">
                <div class="titulo">
                    <h1>PACIENTES</h1>
                </div>
                <div  class="ima">
                    <a href="pacientesAdmin.php"><img src="../img/paciente.png" alt=""></a>
                </div>
            </div>
            <div class="op1">
                <div class="titulo">
                    <h1>MÉDICOS</h1>
                </div>
                <div class="ima">
                    <a href="medicosAdmin.php"><img src="../img/doctor.png" alt=""></a>
                </div>
            </div>    
        </div>
        <div class="piedpa">

        </div>
    </div>
</body>
</html>

<?php
}
else{
    echo "<script type='text/javascript'>
    alert('ERROR!! debe iniciar SESION');
    window.location='loginA.php';
    </script>";
}
?>