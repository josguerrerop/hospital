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
    <title>Pacientes</title>
    <link rel="stylesheet" href="../css/estilomenu.css">
</head>
<body>
    <div class="container">
        <div class="cabecera">
            <div>
                <h1>Administrador</h1>
            </div>
            <div>
                <h1 align="center">|PACIENTES</h1>
                
            </div>
        </div>
        <div class="menuP">
        <div class="op">
                <div class="titulo">VER</div>
                <div class="ima">
                    <a href="verpacientes.php"><img src="../img/ver.png" alt=""></a>
                </div>
            </div>
            <div class="op">
                <div class="titulo">EDITAR</div>
                <div class="ima">
                    <a href="editar1pacientes.php"><img src="../img/escritura.png" alt=""></a>
                </div>
            </div>
            <div class="op">
                <div class="titulo">ELIMINAR</div>
                <div class="ima">
                    <a href="borrarpacientes.php"><img src="../img/basura.png" alt=""></a>
                </div>
            </div>
        </div>
        <div class="piedpa">
            <div class="subpie1">
                <a href="sesiona.php"><img src="../img/atras.png" alt=""></a>
            </div>
            <div align="right" class="subpie1">
                <a href="salir.php"><img src="../img/cerrar-sesion.png" alt=""></a>
            </div>
        </div>
    </div>
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