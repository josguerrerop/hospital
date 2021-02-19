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
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
        <title>Consultar pacientes</title>
        <link rel="stylesheet" type="text/css" href="../css/styles.css">

    <div class="cabecera">
            <div>
                <a href="pacientesAdmin.php"><img src="../img/atras.png" alt=""></a>
            </div>
            <div>
                <h1>Ver pacientes registrados</h1>
            </div>
            <div>
                <h1 align="center">|PACIENTES</h1>
        </div>
    </div>
</head> 

</html>
<?php
    $t=new Trabajo();
    $reg=$t->ver_pacientes();
?>
<br>
<br>

<body>
<div class="container">

<div class="wrapper">
    <input id="search-box" type="number" name="search" placeholder="Digite el id a buscar 🔎">
    <br>
    <br>
    <br>
      <div id="directory-cont" >
        
                <ul id="directory" class="cuerpo">
                <?php
            for($i=0;$i<count($reg);$i++){
                echo "<li>
                    <div>
                        <img src='../img/pacientes.png'>
                    </div>
                    <div>
                        <div><p class='id'>N.".$reg[$i]['id_p']."</p></div>
                        <div><p> 👥".$reg[$i]['nombre_p']." ".$reg[$i]['apellidos_p']."</p></div>
                        <div><p> 📅 ".$reg[$i]['fecha_nac']."</p></div>
                        <div><p> &#x1F3E0 ".$reg[$i]['direccion_p']."</p></div>
                        <div><p> 📞 ".$reg[$i]['telefono_p']."</p></div>
                        <div><p> 📧 ".$reg[$i]['correo_p']."</p></div>    
                    </div>
                </li>";
            }
                ?>
                </ul>
        
</div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="../js/funciones.js" type="text/javascript"></script>
    <script type="text/javascript">
      $('#directory').liveFilter('#search-box', 'li', { filterChildSelector: '.id'});
    </script>
    </div>
<div>
</body>
      
<?php
}
else{
    echo "<script type='text/javascript'>
    alert('¡Debe iniciar sesion!');
    window.location='loginA.php';
    </script>";
}
?>

