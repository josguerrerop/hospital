<?php

class Conectar{
    public static function con(){
        $conec = mysqli_connect('127.0.0.1:3306','pma','123','bd_hospital')
        or die("ERROR AL CONECTAR LA BD".mysqli_error($conec));
        mysqli_query($conec, "SET NAMES 'utf8'");
        mysqli_select_db($conec,'bd_hospital')
        or die("ERROR AL CONECTAR LA BD".mysqli_error($conec));
        return $conec;
    }  
}

class Trabajo{
    private $usuario;
    private $paciente;
    private $medico;
    private $especialidad;
    public function __construct(){
        $this->usuario=array();
        $this->paciente=array();
        $this->medico=array();
        $this->especialidad=array();
    }

    
    public function ingresar($correo,$pass){
        session_start();
        $sql="select * from usuario where correo='$correo' and pass='$pass' and num_nivel=0";
        $res=mysqli_query(Conectar::con(),$sql);
        if($row=mysqli_fetch_array($res)){
            //crear Variables de sesion
            $_SESSION['usuario']=$correo;
             echo "<script type='text/javascript'>
             alert('Bienvenido al sistema administrador: ".$_SESSION['usuario']."');
             window.location='sesiona.php';
             </script>";
           }else{
               echo "<script type='text/javascript'>
               alert('¡ERROR! el usuario o el password es incorrecto');
               window.location='loginA.php';
               </script>";
           }

    }

    public function ver_pacientes(){
        $sql1 = "select id_p,nombre_p,apellidos_p,fecha_nac,direccion_p,telefono_p,correo_p from paciente";
        $res1 = mysqli_query(Conectar::con(),$sql1);
        while($row1=mysqli_fetch_assoc($res1)){
            $this->paciente[]=$row1;
        }
        return $this->paciente;
    }

 public function ver_pacientese(){
        $sql1 = "select id_p,nombre_p,apellidos_p,direccion_p,telefono_p from paciente";
        $res1 = mysqli_query(Conectar::con(),$sql1);
        while($row1=mysqli_fetch_assoc($res1)){
            $this->paciente[]=$row1;
        }
        return $this->paciente;
    }

    public function ver_medicos(){
        $sql1 = "select m.id_m,m.nombre_m,m.apellidos_m,m.fecha_nacm,m.direccion_m,m.telefono_m,m.correo_m,
        e.nombre_e from medico m, especialidad e where m.id_especialidad=e.id_especialidad";
        $res1 = mysqli_query(Conectar::con(),$sql1);
        while($row1=mysqli_fetch_assoc($res1)){
            $this->medico[]=$row1;
        }
        return $this->medico;
    }

    public function ver_medicose(){
        $sql1 = "select m.id_m,m.nombre_m,m.apellidos_m,m.direccion_m,m.telefono_m,
        e.nombre_e from medico m, especialidad e where m.id_especialidad=e.id_especialidad";
        $res1 = mysqli_query(Conectar::con(),$sql1);
        while($row1=mysqli_fetch_assoc($res1)){
            $this->medico[]=$row1;
        }
        return $this->medico;
    }

    public function get_pacientes_id($id_p){
    $sql="select * from paciente where id_p=$id_p";
    $res1=mysqli_query(Conectar::con(),$sql);
    while($reg=mysqli_fetch_assoc($res1)){
        $this->paciente[]=$reg;
    }
    return $this->paciente;
    }

    public function get_medicos_id($id_m){
        $sql="select * from medico where id_m=$id_m";
        $res1=mysqli_query(Conectar::con(),$sql);
        while($reg=mysqli_fetch_assoc($res1)){
            $this->medico[]=$reg;
        }
        return $this->medico;
    }

    public function edit_pacientes($telefono_p,$direccion_p,$apellidos_p,$nombre_p,$id_p){
        $sql="UPDATE paciente set telefono_p='$telefono_p',direccion_p='$direccion_p',apellidos_p='$apellidos_p',nombre_p='$nombre_p' where id_p=$id_p";
        $res1=mysqli_query(Conectar::con(),$sql);
        echo "<script type='text/javascript'>
        alert('¡El paciente identificado con el número $id_p fue modificado exitosamente!');
        window.location='pacientesAdmin.php';
        </script>";
    }

    public function edit_medicos($nombre_e,$telefono_m,$direccion_m,$apellidos_m,$nombre_m,$id_m){

        $sql0="select id_especialidad from especialidad where nombre_e='$nombre_e'";
        $res0 = mysqli_query(Conectar::con(),$sql0);
        $row0=mysqli_fetch_assoc($res0);
        $id_espe=$row0["id_especialidad"];

        $sql1="select id_medico from agendar where id_medico=$id_m";
        $res1 = mysqli_query(Conectar::con(),$sql1);
        $row1=mysqli_fetch_assoc($res1);
        $idmedico=$row1["id_medico"];

        if($idmedico){
            echo "<script type='text/javascript'>
            alert('¡El médico identificado con el número $id_m no puede ser modificado ya que tiene citas agendadas!');
            window.location='medicosAdmin.php';
         </script>";

        }
        else if(!$idmedico){
        $sql="UPDATE medico set id_especialidad=$id_espe,telefono_m='$telefono_m',direccion_m='$direccion_m',apellidos_m='$apellidos_m',nombre_m='$nombre_m' where id_m=$id_m";
        $res=mysqli_query(Conectar::con(),$sql);
        echo "<script type='text/javascript'>
        alert('¡El médico identificado con el número $id_m fue modificado exitosamente!');
        window.location='medicosAdmin.php';
        </script>";
        }
    }


    public function insertar_medico($id_m,$nombre_m,$apellidos_m,$fecha_nacm,$direccion_m,$telefono_m,$correo_m,$pass_m,$nombre_e){
   
        $sql="select correo from usuario where correo='$correo_m'";
        $res = mysqli_query(Conectar::con(),$sql);
        $row=mysqli_fetch_assoc($res);
        $correo=$row["correo"];

        $sql2="select id_m from medico where id_m=$id_m";
        $res2 = mysqli_query(Conectar::con(),$sql2);
        $row2=mysqli_fetch_assoc($res2);
        $id=$row2["id_m"];

        $sql1="select id_especialidad from especialidad where nombre_e='$nombre_e'";
        $res1 = mysqli_query(Conectar::con(),$sql1);
        $row1=mysqli_fetch_assoc($res1);
        $id_espe=$row1["id_especialidad"];

        $sql5="select COUNT(*) from medico";
        $res5 = mysqli_query(Conectar::con(),$sql5);
        $row5=mysqli_fetch_assoc($res5);
        $cantidad=$row5["COUNT(*)"];

        if($cantidad==10){
            echo "<script type='text/javascript'>
            alert('¡Ya hay 10 médicos registrados, no puede ingresar más de esa cantidad!');
            window.location='medicosAdmin.php';
            </script>";
            
    }

        else if($correo || $id){
            echo "<script type='text/javascript'>
            alert('¡El usuario que quiere registrar ya existe, intentelo nuevamente!');
            window.location='insertarmedicos.php';
            </script>";
    }

    
     else if (!$correo && !$id && $cantidad<10){
            $sql3="insert into usuario values('$correo_m','$pass_m',1)";
            $res3=mysqli_query(Conectar::con(),$sql3);
            $sql4="insert into medico values($id_m,'$nombre_m','$apellidos_m','$fecha_nacm','$direccion_m','$telefono_m','$correo_m','$pass_m',$id_espe)";
            $res4=mysqli_query(Conectar::con(),$sql4);
            echo "<script type='text/javascript'>
            alert('¡El médico fue registrado exitosamente!');
            window.location='medicosAdmin.php';
            </script>";
           
       }
    } 


    public function ver_especialidades(){
        $sql1 = "select id_especialidad,nombre_e from especialidad";
        $res1 = mysqli_query(Conectar::con(),$sql1);
        while($row1=mysqli_fetch_assoc($res1)){
            $this->especialidad[]=$row1;
        }
        return $this->especialidad;
    }


    public function insertar_especialidad($id_especialidad,$nombre_e){

        $sql0="select id_especialidad from especialidad where id_especialidad=$id_especialidad";
        $res0 = mysqli_query(Conectar::con(),$sql0);
        $row0=mysqli_fetch_assoc($res0);
        $id=$row0["id_especialidad"];

        $sql5="select COUNT(*) from especialidad";
        $res5 = mysqli_query(Conectar::con(),$sql5);
        $row5=mysqli_fetch_assoc($res5);
        $cantidad=$row5["COUNT(*)"];

        if($id){
            echo "<script type='text/javascript'>
            alert('¡La especialidad $id_especialidad ya se encuentra registrada, intente nuevamente!');
            window.location='insertarespecialidades.php';
            </script>";
        }
        if($cantidad==10){
            echo "<script type='text/javascript'>
            alert('¡Ya hay 10 especialidades registradas, no puede ingresar más de esa cantidad!');
            window.location='especialidadesAdmin.php';
            </script>";
        }

        else if (!$id && $cantidad<10){
            $sql="insert into especialidad values($id_especialidad,'$nombre_e')";
            $res=mysqli_query(Conectar::con(),$sql);
            echo "<script type='text/javascript'>
            alert('¡La especialidad de $nombre_e se ha registrado exitosamente!');
            window.location='especialidadesAdmin.php';
            </script>";
        }
        
    }


    public function eliminar_especialidad($id_especialidad){

        $sql0="select id_especialidad from medico where id_especialidad=$id_especialidad";
        $res0 = mysqli_query(Conectar::con(),$sql0);
        $row0=mysqli_fetch_assoc($res0);
        $idm=$row0["id_especialidad"];

        $sql="select id_especialidad from agendar where id_especialidad=$id_especialidad";
        $res = mysqli_query(Conectar::con(),$sql);
        $row1=mysqli_fetch_assoc($res);
        $ida=$row1["id_especialidad"];

        if($idm){
            echo "<script type='text/javascript'>
            alert('¡La especialidad con identificación $id_especialidad no puede ser eliminada, ya que hay médicos registrados con esta, intentelo nuevamente!');
            window.location='borrarespecialidades.php';
            </script>";
        }
        if($ida){
            echo "<script type='text/javascript'>
            alert('¡La especialidad con identificación $id_especialidad no puede ser eliminada, ya que hay citas agendadas con esta, intentelo nuevamente!');
            window.location='borrarespecialidades.php';
            </script>";
        }
        else if(!$ida && !$idm){
            $sql1="delete from especialidad WHERE id_especialidad=$id_especialidad AND NOT EXISTS(SELECT id_especialidad FROM medico where id_especialidad=$id_especialidad)";
            $res1=mysqli_query(Conectar::con(),$sql1);
            echo "<script type='text/javascript'>
            alert('¡Se eliminó exitosamente la especialidad con identificacion $id_especialidad!');
            window.location='especialidadesAdmin.php';
            </script>";
        }

    }




    public function eliminar_paciente($id_p){
        $sql0="select id_p from solicitar where id_p=$id_p";
        $res0 = mysqli_query(Conectar::con(),$sql0);
        $row0=mysqli_fetch_assoc($res0);
        $id=$row0["id_p"];

        $sql="select u.correo from paciente p,usuario u where u.correo=p.correo_p and p.id_p=$id_p";
        $res = mysqli_query(Conectar::con(),$sql);
        $row1=mysqli_fetch_assoc($res);
        $correo=$row1["correo"];

        $sql3="select h.id_hicl from contener c, paciente p, hicl h where p.id_p=c.id_p and c.id_p=$id_p and c.id_hicl=h.id_hicl";
        $res3 = mysqli_query(Conectar::con(),$sql3);
        $row3=mysqli_fetch_assoc($res3);
        $id_h=$row3["id_hicl"];
        
        if($id){
            echo "<script type='text/javascript'>
            alert('¡El paciente con identificacion $id_p no puede ser eliminado, ya que tiene visitas solicitadas o agendadas!');
            window.location='borrarpacientes.php';
            </script>";
            echo "no se puede eliminar el paciente";
        }
        else{
            $sql5="delete from contener where id_p=$id_p";
            $res5=mysqli_query(Conectar::con(),$sql5);

            $sql6="delete from hicl where id_hicl=$id_h";
            $res6=mysqli_query(Conectar::con(),$sql6);

            $sql1="delete FROM paciente WHERE id_p=$id_p AND NOT EXISTS(SELECT id_p FROM solicitar where id_p=$id_p)";
            $res1=mysqli_query(Conectar::con(),$sql1);

            $sql2="delete FROM usuario where correo='$correo'";
            $res2=mysqli_query(Conectar::con(),$sql2);

            echo "<script type='text/javascript'>
            alert('¡Se eliminó exitosamente el paciente con identificacion $id_p!');
            window.location='pacientesAdmin.php';
            </script>";
        }

    }


    public function eliminar_medico($id_m){

        $sql0="select id_medico from agendar where id_medico=$id_m";
        $res0 = mysqli_query(Conectar::con(),$sql0);
        $row0=mysqli_fetch_assoc($res0);
        $id=$row0["id_medico"];

        $sql="select u.correo from medico m,usuario u where u.correo=m.correo_m and m.id_m=$id_m";
        $res = mysqli_query(Conectar::con(),$sql);
        $row1=mysqli_fetch_assoc($res);
        $correo=$row1["correo"];

        
        if($id){
            echo "<script type='text/javascript'>
            alert('¡El médico con identificacion $id_m no puede ser eliminado, ya que tiene consultas agendadas con pacientes!');
            window.location='borrarmedicos.php';
            </script>";
        }
        else{
            $sql1="delete from medico WHERE id_m=$id_m AND NOT EXISTS(SELECT id_medico FROM agendar where id_medico=$id_m)";
            $res1=mysqli_query(Conectar::con(),$sql1);

            $sql2="delete from usuario where correo='$correo'";
            $res2=mysqli_query(Conectar::con(),$sql2);
            echo "<script type='text/javascript'>
            alert('¡Se eliminó exitosamente el médico con identificacion $id_m!');
            window.location='medicosAdmin.php';
            </script>";
        }

    }
}


?>