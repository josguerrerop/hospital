<!DOCTYPE html>
<html lang="en">
<?php
setlocale(LC_ALL, 'es_ES');
$fecha = new DateTime();
$date = $fecha->format('d/m/Y');
$dia = strftime('%A');
include('../class/clase_paciente.php');
session_start();
?>
<link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inicio Paciente</title>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/estiloInicio.css" type="text/css">
</head>
<body>
<script>

function getAdd(){
    $('#myModal').modal('show');
}
</script>
<head>


<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: RGB(18, 33, 33);">

        <h4 class="modal-title"><i class="fas fa-couch"></i>&nbsp; Ver visitas</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div style="background-color: rgb(239, 245, 243);">
        <div class="modal-body">
        </div>
        <form action="misVisitas.php" method="post">
        <div align='center'>
          <h5 style="color:black"> Seleccione la fecha  de la visita </h5>
          <input type="date" id="FECHA" name="FECHA"
       value="2021-03-03"
       min="2018-01-01" max="2021-03-03">

       
        </div>
        <h1>sd</h1>
        <div align='center'>
        <button type="submit" class="btn btn-dark ">Ver visitas</button>
        </form>
        </div>
      </div>
      <div class="modal-footer"></div>

    </div>

  </div>
</div>
    <div class="super">
        <div class="currentDate">
            <div class="hora"><img src="../img/icon-hora-d.svg" class="horaiconid">
                <?php echo $dia . " " . $date; ?>
            </div>
        </div>
        <div class="user">
            <ul class="ul">
                <li> <span>Bienvenido(a)</span> <span id="new-name-user">
                        <?php
                        $paciente = new Paciente();
                        $nombre = $paciente->getNombre($_SESSION['id']);
                        echo $nombre;
                        ?>
                    </span>
                    <span><a href='../inicioOf.php'>Salir</a>
                    </span>
                </li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="cabecera">
            <div class="subcab1">
                <div>
                    <a href="../inicioOf.php"><img src="../img/220px-Wiki_Project_Med_Foundation_logo.svg.png" height="100" width="100"></a>
                </div>
                <div>
                    <h1>Hospital Universitario <span>Distrital</span> </h1>
                </div>
            </div>
        </div>

        <div class="cuerpo">
            <div class="cuerpo1">
                <h1>SOMOS SU MEJOR OPCIÓN A LA HORA DE CUIDAR SU SALUD</h1>
            </div>
            <div class="cuerpo2">
                <h2>Tus <span>servicios</span> :</h2>
            </div>
            <div class="cuerpo3">
                <div class="box">
                    <div class="box2">
                        <div class="grid2">
                            <img class="imgb" src="../img/nota.png" height="90" width="90" alt="">
                            <div class="gridcenter">
                                <h4> <a href="citas.php">Solicitar cita</h4>
                                <ul>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="box2">
                        <div class="grid2">
                            <img src="../img/calendario.png" height="90" width="90" alt="">
                            <div class="gridcenter">
                                <h4><a href="agenda.php"> Agenda</h4>
                            </div>
                        </div>
                    </div>
                    <div class="box2">
                        <div class="grid2">
                            <img src="../img/calendario.png" height="90" width="90" alt="">
                            <div class="gridcenter">
                        
                            <a onclick="getAdd();" class="btn" style="color: blue;"> Ver visitas
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="logo-part">
                                    <img src="https://image.similarpng.com/thumbnail/2020/08/Medical-team-design-on-transparent-background-PNG.png" class="w-50 logo-footer img">
                                    <p>7637 Laurel Dr. King Of Prussia, PA 19406</p>
                                    <p>Use this tool as test data for an automated system or find your next pen</p>
                                </div>
                            </div>
                            <div class="col-md-6 px-4">
                                <h6> About Company</h6>
                                <p>But horizontal lines can only be a full pixel high.</p>
                                <a href="#" class="btn-footer"> More Info </a><br>
                                <a href="#" class="btn-footer"> Contact Us</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6 px-4">
                                <h6> Help us</h6>
                                <div class="row ">
                                    <div class="col-md-6">
                                        <ul>
                                            <li> <a href="#"> Home</a> </li>
                                            <li> <a href="#"> About</a> </li>
                                            <li> <a href="#"> Service</a> </li>
                                            <li> <a href="#"> Team</a> </li>
                                            <li> <a href="#"> Help</a> </li>
                                            <li> <a href="#"> Contact</a> </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6 px-4">
                                        <ul>
                                            <li> <a href="#"> Cab Faciliy</a> </li>
                                            <li> <a href="#"> Fax</a> </li>
                                            <li> <a href="#"> Terms</a> </li>
                                            <li> <a href="#"> Policy</a> </li>
                                            <li> <a href="#"> Refunds</a> </li>
                                            <li> <a href="#"> Paypal</a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <h6> Newsletter</h6>
                                <div class="social">
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                </div>
                                <form class="form-footer my-3">
                                    <input type="text" placeholder="search here...." name="search">
                                    <input type="button" value="Go">
                                </form>
                                <p>technology</p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

    </div>
</body>

</html>