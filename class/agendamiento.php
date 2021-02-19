<?php
 require_once('conexion.php'); 
class Agendacion
{
    public function AgendaR($idH, $hora, $fecha)
    {

        $genFecha = "SELECT fecha FROM agendar WHERE fecha='$fecha'";
        $genHora = "SELECT hora FROM agendar WHERE hora='$hora'";

        $genFecha = mysqli_query(Conectar::con(), $genFecha);
        $genHora = mysqli_query(Conectar::con(), $genHora);
        if ($genFecha && $genHora){
            echo "<script type='text/javascript'>    
            alert('¡Horario cruzado !');
            window.location.href='../medico/agendaM.php';
            </script>";
        } else {
            $sqlHF = "UPDATE visita SET hora_v='$hora', fecha_v='$fecha' WHERE id_visita=$idH";
            $sqlEST = "UPDATE estar SET id_estado='2' WHERE id_visita=$idH";
        }
    
        mysqli_query(Conectar::con(), $sqlHF)
            or die("ERROR en la consulta $sqlHF" . mysqli_error(Conectar::con()));
        mysqli_query(Conectar::con(), $sqlEST)
            or die("ERROR en la consulta $sqlEST" . mysqli_error(Conectar::con()));
    }
    public function CancelaR($idC)
    {
        
        $sqlEST = "UPDATE estar SET id_estado='3' WHERE id_visita=$idC";
        mysqli_query(Conectar::con(), $sqlEST)
            or die("ERROR en la consulta $sqlEST" . mysqli_error(Conectar::con()));

            echo "<script type='text/javascript'>    
            alert('¡Se canceló la visita!');
            window.location.href='../medico/agendadoM.php';
            </script>";
    }
}
?>