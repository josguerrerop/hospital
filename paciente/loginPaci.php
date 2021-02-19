<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estiloslogin.css">
    <title>LOGIN</title>
</head>

<body class="body1">
    <div class="container">
        <div class="row justify-content-center pt-5 mt-5 m-1">
            <div class="col-md-4 formulario">
                <form action="../class/validate.php" method="POST">
                    <div class="form-group text-center pt-3 pb-3">
                        <h3 class="text-light">INICIO DE SESIÓN DE PACIENTE</h3>
                    </div>
                    <div class="form-group mx-sm-4">
                        <input type="email" name ="correo" class="form-control" placeholder="Correo electronico">
                    </div>
                    <div class="form-group mx-sm-4">
                        <input type="password" name="contraseña" class="form-control" placeholder="Contraseña">
                    </div>
                    <div class="form-group mx-sm-4 pt-3 pb-3 ">
                        <input type="submit" class="btn btn-block ingresar" value="INGRESAR">
                    </div>
                    <div class="form-group mx-sm-4 text-center pb-3">
                        <span><a href="" class="recuperarpass">¿Olvidaste tu contraseña?</a>·
                            <a href="formregistropaciente.php" class="recuperarpass"> Registrate!</a></span>
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