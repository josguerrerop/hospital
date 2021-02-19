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

$trab = new Trabajo();
if (isset($_POST['grabar']) && $_POST['grabar'] == "si") {
    $trab->edit_pacientes(
        $_POST['telefono_p'], 
        $_POST['direccion_p'], 
        $_POST['apellidos_p'], 
        $_POST['nombre_p'], 
        $_POST['id_p']);
    exit();
}
$reg = $trab->get_pacientes_id($_GET['id_p']);


if($_SESSION['usuario']){
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilosregistro.css">
    <title>Editar pacientes</title>
    

</head>
<body>
    <div class="container">
        <div class="row justify-content-center pt-5 mb-5 m-1">
            <div class="col-md-5 formulario">
                <form align="center" name="form" action="editarpacientes.php" method="POST">
                    <div class="form-group text-center pt-3 pb-3">
                        <h1>EDITAR PACIENTES</h1>
                    </div>
                    <div class="form-group mx-sm-5">
                        <input type="hidden" name="grabar" value="si">
                        <input type="hidden" name="id_p" value="<?php echo $_GET['id_p']; ?>">
                    </div>
                    <div class="form-group mx-sm-5">
                         <p class="form-control"><?php echo $_GET['id_p'];?></p> 
                    </div>
                    <div class="form-group mx-sm-5">
                         <input type="text" class="form-control" value='<?php echo $reg[0]['nombre_p'];?>' name="nombre_p" required>
                    </div>
                    <div class="form-group mx-sm-5">
                        <input type="text" class="form-control" value='<?php echo $reg[0]['apellidos_p'];?>' name="apellidos_p" required>
                    </div>
                    <div class="form-group mx-sm-5">
                         <input type="text" class="form-control" value='<?php echo $reg[0]['direccion_p'];?>' name="direccion_p" required>
                    </div>
                    <div class="form-group mx-sm-5">
                        <input type="number" class="form-control" value='<?php echo $reg[0]['telefono_p'];?>' maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="telefono_p" required>
                    </div>
                    <div class="form-group mx-sm-5 pt-3 pb-3 ">
                        <input type="submit" class="btn btn-block ingresar" value="EDITAR">
                    </div>
                    <div class="form-group mx-sm-4 text-center pb-3">
                        <span><a href="editar1pacientes.php" class="recuperarpass">Volver atras!</a></span>
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
