<?php
 require_once('conexion.php'); 
class Paciente{
    private $agenda;
    public function __construct(){
       $this->agenda=array();
    }
    public function insertar($nom,$ape,$fecha,$numid,$tel,$dir,$ema,$contra){
       
        $nivel=0;
        $sql = "insert into usuario values ('$ema','$contra',$nivel)";
        $sql2 ="insert into paciente values($numid,'$nom','$ape','$fecha','$dir','$tel','$ema','$contra')";
        mysqli_query(Conectar::con(),$sql) 
        or die("ERROR en la consulta $sql".mysqli_error(Conectar::con()));
        mysqli_query(Conectar::con(),$sql2) 
        or die("ERROR en la consulta $sql2".mysqli_error(Conectar::con())); 
    }

    public function returnid($ema,$pass){
        $sql= "select id_p from paciente where correo_p='$ema' and pass_p='$pass'";
        $result =mysqli_query(Conectar::con(),$sql) 
        or die("ERROR en la consulta $sql".mysqli_error(Conectar::con()));
        $extraido1= mysqli_fetch_array($result);
        if($extraido1!=null){
        $id = $extraido1[0];
        }else{
            $id=null;
        }
        return $id;
    }

    public function getNombre($id)
    {
        $sql= "select nombre_p from paciente where id_p=$id";
        $result =mysqli_query(Conectar::con(),$sql) 
        or die("ERROR en la consulta $sql".mysqli_error(Conectar::con()));
        $extraido1= mysqli_fetch_array($result);
        if($extraido1!=null){
        $nombre = $extraido1[0];
        }else{
            $nombre=null;
        }
        return $nombre;
    }

     public function mostrarAgenda($idU){
        $sql1="select 
        
        vi.id_visita, vi.hora_v, vi.fecha_v, esp.nombre_e,est.nombre_est 
        
        from

        paciente pa, solicitar so, visita vi, estar es, estado est ,agendar age,especialidad esp
        
        where pa.id_p=so.id_p and 
        
        vi.id_visita=so.id_visita and
        
        es.id_visita=vi.id_visita and
        
        est.id_estado=es.id_estado and

        age.id_visita=vi.id_visita and

        age.id_especialidad=esp.id_especialidad  and
        
        pa.id_p=$idU;
        
        ";
        $res1=mysqli_query(Conectar::con(),$sql1);
        while($row1=mysqli_fetch_assoc($res1)){
            $this->agenda[]=$row1;
        } 
       return $this->agenda;
     }

}
?>