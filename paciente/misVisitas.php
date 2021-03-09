<?php
 include('../class/medico.php');
 session_start();
 $m = new Medico();
 $fecha = new DateTime();
 $date = $fecha->format('d/m/Y');
 $dia = strftime('%A');


 $fecha = $_REQUEST['FECHA'];
 $reg = $m->GetVisitas($_SESSION['id'],$fecha);


 session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="https://kit.fontawesome.com/a2d961e6df.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../css/styleOf.css" type="text/css">


    <title>Solicitudes</title>
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
    <div class="cabecera">
        <div class="subcab1">
            <div>
                <a href="../inicioOf.php"><img src="../img/220px-Wiki_Project_Med_Foundation_logo.svg.png" height="100" width="100"></a>
            </div>
            <div>
                <h1>Agenda de <span>solicitudes</span> </h1>
            </div>
        </div>
        <div class="subcab2">
            <div>
                <ul>
                    <li><a href="inicioMedi.php">Volver
                    <li>|</li>
                    <li><a href='../inicioOf.php'>Salir
                        </a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="cuerpo">
        <div class="cuerpo1">
            <table class="table table-hover table-dark" border='0' align="center">
                <tr>
                    <th></th>
                    <th># visita</th>
                    <th>Fecha visita</th>
                    <th>hora visita</th>
                    <th>nombre medico</th>
                    <th>nombre especialidad</th>
                </tr>
                <?php for ($i = 0; $i < count($reg); $i++) {
                    echo "<tr>
                    <td></td>
                    <td>" . $reg[$i]['id_visita'] . "</td>  
                    <td>" . $reg[$i]['fecha_v'] . "</td>
                    <td>" . $reg[$i]['hora_v'] . "</td>
                    <td>" . $reg[$i]['nombre_m'] . "</td>
                    <td>" . $reg[$i]['nombre_e'] . "</td>

                    <td>";} ?>
                    
                       

            </table>
        </div>
        <div class="cuerpo2">
            <h2>Nuestros <span>servicios</span> :</h2>
        </div>
        <div class="cuerpo3">
            <div class="box">
                <div class="box2">
                    <div class="grid2">
                        <img class="imgb" src="../img/casa.png" height="90" width="90" alt="">
                        <div class="gridcenter">
                            <h4>Nuestros centros de atencion</h4>
                            <ul>
                                <li>Chapinero.</li>
                                <li>Puentearanda.</li>
                                <li>Bosa.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="box2">
                    <div class="grid2">
                        <img src="../img/cuidado-de-la-salud.png" height="90" width="90" alt="">
                        <div class="gridcenter">
                            <h4>Nuestros objetivos</h4>
                            <ul>
                                <li>Brindar confianza.</li>
                                <li>Dar la mejor atencion.</li>
                                <li>Crear un mejor futuro.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="box2">
                    <div class="grid2">
                        <img src="../img/call-center-agent.png" height="90" width="90" alt="">
                        <div class="gridcenter">
                            <h4>Nuestro servicio al cliente</h4>
                            <ul>
                                <li>3057499323</li>
                                <li>3203446693</li>
                                <li>3004689062</li>
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
                                <img src="https://image.similarpng.com/thumbnail/2020/08/Medical-team-design-on-transparent-background-PNG.png" class="w-50 logo-footer">
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

    <script>
        function openForm() {
            document.getElementById('myForm').style.display = 'block';
        }

        function closeForm() {
            document.getElementById('myForm').style.display = 'none';
        }
    </script>


</body>

</html>