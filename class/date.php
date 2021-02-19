<?php
Class Fecha {
    private $resultado="";
    private $data;
    public function __construct(){
      $this->data =date('Y-m-d');
      for($i=0;$i<10;$i++){
          $this->resultado =  $this->resultado .  $this->data[$i];}
     }
public function getFecha(){
    return $this->resultado;
}
}
?>
