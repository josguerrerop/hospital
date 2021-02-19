<?php
 include('../class/medico.php');
 include('../class/date.php');
 session_start();
 
 $date = new Fecha();
 $m= new Medico();
 $reg= $m -> ver_especialidades();
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="../css/styleOf.css" type="text/css">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="https://kit.fontawesome.com/a2d961e6df.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    <script>
    function sure(id) {
        if(confirm('Desea solicitar la cita ?')) {
        window.location='citas.php?id='+id;
        }
    return false;
    }
</script>
<script>
function salir(){
    window.location.href='inicioPaci.php';
}
</script>
    <title>Solicitar citas</title>
</head>
<body style="background-color: gray;">
<div class="cabecera">
            <div class="subcab1">
                <div>
                    <a href="../inicioOf.php"><img src="../img/220px-Wiki_Project_Med_Foundation_logo.svg.png" height="100" width="100"></a>
                </div>
                <div>
                    <h1>Solicitud de  <span>citas</span> </h1>
                </div>
            </div>
            <div class="subcab2">
                <div>
                    <ul>
                        <li><a href="inicioPaci.php">Volver
                        <li>|</li>
                        <li><a href='#' onclick='window.open("../inicioOf.php"); return false;'>Salir <?php
                       
                        ?>
                        </a></li>
                    </ul>
                </div>
            </div>
        </div>
<div class="container ">
    <div class="row">   
    <?php
    for($i=0;$i<count($reg);$i++){
    ?>
        <div class="col-md-4">
            <div class="panel panel-default pt-4">
                <div class="card" style=" 
                background-image: 
                url('<?php $im=$m->ImagenesEspecialidades($reg[$i]['id_especialidad']); 
                echo $im;?>')">

                    <div class="card-header">
                        <h2 class="text-center"> </h2>
                    </div>
                    <div class="card-body justify-content-center">
                        
                          <button onclick="return sure('<?php echo $reg[$i]['id_especialidad'] ?>');" class="btn btn-info btn-block" href="javascript:void(0)">
                            <i class="fas fa-calendar-check"></i>&nbsp; Solicitar
                           <?php echo $reg[$i]['nombre_e']?>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }
?>
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
                                            
                                           
                                        </ul>
                                    </div>
                                    <div class="col-md-6 px-4">
                                        <ul>
                                            
                                    
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

</body>
</html>

<?php
    if (isset($_REQUEST['id']) ) {

    $id_paciente = $_SESSION['id'];
    $id_especialidad=($_REQUEST['id']);
    $fecha_solicitud = $date->getFecha();

    if($m->validarVisita($id_paciente,$id_especialidad,$fecha_solicitud)){
               $id_visita= $m->visita();
                 $m->solicitar($id_visita,$id_paciente,$fecha_solicitud);
                  $m->ageandar($id_visita,$id_especialidad);
                   $m->estado($id_visita,1);
                }else{
                    echo "<script type='text/javascript'>
                    alert('No puede solicitar mas citas de esta especialidad hoy');
                    window.location.href='citas.php';
                    </script>";
                }        
    }
?>