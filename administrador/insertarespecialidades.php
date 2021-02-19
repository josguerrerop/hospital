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

if($_SESSION['usuario']){
    $t=new Trabajo();
    $reg=$t->ver_especialidades();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilosregistro.css">
    <title>Registro especialidad</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center pt-5 mb-5 m-1">
            <div class="col-md-6 formulario">
                <form action="inserte.php" method="POST">
                    <div class="form-group text-center pt-3 pb-3">
                        <h1>REGISTRO DE ESPECIALIDADES</h1>
                    </div>
                    <div class="form-group mx-sm-5">
                        <input type="number" class="form-control" placeholder="Numero de especialidad" name="id_especialidad" required>
                    </div>
                    <div class="form-group mx-sm-5">
                        <input type="text" class="form-control" placeholder="Nombre" name="nombre_e" required>
                    </div>
                    <div class="form-group mx-sm-5 pt-3 pb-3 ">
                        <input type="submit" class="btn btn-block ingresar" value="REGISTRAR" title="insertar">
                    </div>
                    <div class="form-group mx-sm-4 text-center pb-3">
                        <span><a href="especialidadesAdmin.php" class="recuperarpass">Volver atras!</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
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
