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
        <title>Consultar medicos</title>
        <link rel="stylesheet" type="text/css" href="../css/styles.css">

        <div class="cabecera">
            <div>
                <a href="medicosAdmin.php"><img src="../img/atras.png" alt=""></a>
            </div>
            <div>
                <h1>Ver médicos registrados</h1>
            </div>
            <div>
                <h1 align="center">|MEDICOS</h1>
        </div>
</div>

</head> 
            <br>
</html>
<?php
    $t=new Trabajo();
    $reg=$t->ver_medicos();
?>
<br>
<br>

<body style=" background-image: url(../img/dd.png)">
<div class="wrapper">
    <input id="search-box" type="number" name="search" placeholder="Digite el id a buscar 🔎">
    <br>
    <br>
    <br>
      <div id="directory-cont">
        <ul id="directory" class="cuerpo">
        <?php
    for($i=0;$i<count($reg);$i++){
        echo "<li>
            <div>
                <img src='../img/doctores.png'>
            </div>
            <div>
                <div><p class='id'> 🩺".$reg[$i]['id_m']."</p></div>
                <div><p> 👥".$reg[$i]['nombre_m']." ".$reg[$i]['apellidos_m']."</p></div>
                <div><p> 📅 ".$reg[$i]['fecha_nacm']."</p></div>
                <div><p> &#x1F3E0 ".$reg[$i]['direccion_m']."</p></div>
                <div><p> 📞 ".$reg[$i]['telefono_m']."</p></div>
                <div><p> 📧 ".$reg[$i]['correo_m']."</p></div>
                <div><p> ⚕️ ".$reg[$i]['nombre_e']."</p></div>
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
