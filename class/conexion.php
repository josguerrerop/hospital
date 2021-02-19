<?php

class Conectar{

    public function __construct(){
   
    }

    public static function con(){
        $conec = mysqli_connect('127.0.0.1:3306','pma','123','bd_hospital')
        or die("errno de depuración: " . mysqli_connect_errno() . PHP_EOL);
        mysqli_query($conec, "SET NAMES 'utf8'");
        return $conec;
    }  
}
?>