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
$a= date("Y")-25;
$m= date("m");
$d= date("d");
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
    <title>Registro de medico</title>
    <script type="text/javascript" lenguage="javascript" src="../js/funciones.js">
        </script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center pt-5 mb-5 m-1">
            <div class="col-md-6 formulario">
                <form action="insertm.php" method="POST">
                    <div class="form-group text-center pt-3 pb-3">
                        <h1>REGISTRO DE MEDICOS</h1>
                    </div>
                    <div class="form-group mx-sm-5">
                        <input type="number" class="form-control" placeholder="Numero de identificación" name="id_m" required>
                    </div>
                    <div class="form-group mx-sm-5">
                        <input type="text" class="form-control" placeholder="Nombre(s)" name="nombre_m" required>
                    </div>
                    <div class="form-group mx-sm-5">
                        <input type="text" class="form-control" placeholder="Apellidos" name="apellidos_m" required>
                    </div>
                    <?php
                    echo"
                    <div class='form-group mx-sm-5'>
                        <input type='date' class='form-control' placeholder='Fecha de nacimiento' name='fecha_nacm' max='$a-$m-$d' required>
                    </div>
                    ";
                    ?>
                    <div class="form-group mx-sm-5">
                        <input type="text" class="form-control" placeholder="Dirección" name="direccion_m" required>
                    </div>
                    <div class="form-group mx-sm-5">
                        <input type="number" class="form-control" placeholder="Teléfono" name="telefono_m" maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="telefono_m" required>
                    </div>
                    <div class="form-group mx-sm-5">
                        <input type="email" class="form-control" placeholder="Correo electrónico" name="correo_m" required>
                    </div>
                    <div class="form-group mx-sm-5">
                        <input type="password" class="form-control" placeholder="Contraseña" name="pass_m" required> 
                    </div>
                    <?php
                    echo "
                    <div class='form-group mx-sm-5'>
                    <select name='nombre_e' class='form-control'>";
                        for($i=0;$i<count($reg);$i++){  
                        echo "
                        <option>".$reg[$i]['nombre_e']."</option>";
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-group mx-sm-5 pt-3 pb-3 ">
                        <input type="submit" class="btn btn-block ingresar" value="REGISTRAR" title="insertar" onClick="validar()">
                    </div>
                    <div class="form-group mx-sm-4 text-center pb-3">
                        <span><a href="medicosAdmin.php" class="recuperarpass">Volver atras!</a></span>
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
