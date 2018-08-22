<?php
class Conexion extends PDO{
    private $tipodb="mysql";
    private $host="localhost";
    private $nombre_de_base="biblioteca2";
    private $user="root";
    private $psw="";



    public function __construct(){
        //Sobreescribo el método constructor de la clase PDO.
      try{
         parent::__construct($this->tipodb.':host='.$this->host.';dbname='.$this->nombre_de_base, $this->user, $this->psw);

      }catch(PDOException $e){
         echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
         exit;
      }
    }
}
?>
