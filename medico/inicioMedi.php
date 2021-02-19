<!DOCTYPE html>
<html lang="en">
<?php
setlocale(LC_ALL, 'es_ES');
$fecha = new DateTime();
$date = $fecha->format('d/m/Y');
$dia = strftime('%A');
include('../class/medico.php');
session_start();
?>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inicio Medico</title>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/styleInicioMedi.css" type="text/css">

</head>

<body>
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
                        $medico = new Medico();
                        $nombre = $medico->getNombre($_SESSION['id']);
                        echo $nombre;
                        ?>
                    </span><span><a href='../inicioOf.php'>Salir</a>
                    </span> </li>
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
            <div class="cuerpo1" align="center">
                <h1>EL ARTE DE LA MEDICINA CONSISTE EN ENTRETENER AL PACIENTE MIENTRAS LA NATURALEZA CURA LA ENFERMEDAD</h1>
            </div>
            <div class="cuerpo2">
                <h2>Espacio de <span>Trabajo</span> :</h2>
            </div>
            <div class="cuerpo3">
                <div class="box">
                    <div class="box2">
                        <div class="grid2">
                            <img src="../img/calendario.png" height="90" width="90" alt="">
                            <div class="gridcenter">
                                <h4><a href="agendaM.php">Solicitudes</a></h4>
                                <ul>
                                    <li>Brindar confianza.</li>
                                    <li>Dar la mejor atencion.</li>
                                    <li>Crear un mejor futuro.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="box2">
                        <div class="grid2">
                            <img src="../img/calendario.png" height="90" width="90" alt="">
                            <div class="gridcenter">
                                <h4><a href="agendadoM.php">Agendado</a></h4>
                                <ul>
                                    <li>Brindar confianza.</li>
                                    <li>Dar la mejor atencion.</li>
                                    <li>Crear un mejor futuro.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="box2">
                        <div class="grid2">
                            <img src="../img/calendario.png" height="90" width="90" alt="">
                            <div class="gridcenter">
                                <h4><a href="canceladoM.php">Cancelado</a></h4>
                                <ul>
                                    <li>Brindar confianza.</li>
                                    <li>Dar la mejor atencion.</li>
                                    <li>Crear un mejor futuro.</li>
                                </ul>
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