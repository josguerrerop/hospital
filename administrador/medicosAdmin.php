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
    <title>Médicos</title>
    <link rel="stylesheet" href="../css/estilosmenume.css">
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
            <div>
                <h1 align="center">|MÉDICOS</h1>
            </div>
        </div>
        <div class="menu">
            <div class="op">
                    <div class="titulo">VER</div>
                    <div class="ima">
                        <a href="vermedicos.php"><img src="../img/ver.png" alt=""></a>
                    </div>
            </div>
            <div class="op">
                <div class="titulo">EDITAR</div>
                <div class="ima">
                    <a href="editar1medicos.php"><img src="../img/escritura.png" alt=""></a>
                </div>
            </div>
            
            
            <div class="op">
                <div class="titulo">INSERTAR</div>
                <div class="ima">
                    <a href="insertarmedicos.php"><img src="../img/anadir-amigo.png" alt=""></a>
                </div>
            </div>
            <div class="op">
                <div class="titulo">ELIMINAR</div>
                <div class="ima">
                    <a href="borrarmedicos.php"><img src="../img/basura.png" alt=""></a>
                </div>
            </div>

            <div class="op">
                <div class="titulo">ESPECIALIDADES</div>
                <div class="ima">
                    <a href="especialidadesAdmin.php"><img src="../img/presente.png" alt=""></a>
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