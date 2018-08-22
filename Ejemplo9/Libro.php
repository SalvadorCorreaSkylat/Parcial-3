<?php
include_once("Conexion.class.php");
class Libro  {
    private $isbn;
    private $nombre;
    private $id_autor;
    private $descripcion;
    private $id_editorial;
    private $id_categoria;
    private $activo;

   const TABLA = 'libro';
   public function getIsbn() {
      return $this->isbn;
   }
   public function getNombre() {
      return $this->nombre;
   }
   public function getIdAutor() {
      return $this->id_autor;
   }
   public function getDescripcion() {
      return $this->descripcion;
   }
   public function getIdEditorial() {
      return $this->id_editorial;
   }
   public function getIdCategoria() {
      return $this->id_categoria;
   }
   public function getActivo() {
      return $this->activo;
   }

   public function setNombre($nombre) {
      $this->nombre = $nombre;
   }
   public function setIdAutor($id_autor) {
      $this->autor = $id_autor;
   }
   public function setDescripcion($descripcion) {
      $this->descripcion = $descripcion;
   }
   public function setIdEditorial($id_editorial) {
      $this->id_editorial = $id_editorial;
   }
   public function setIdCategoria($id_categoria) {
      $this->id_categoria = $id_categoria;
   }
   public function setActivo($activo) {
      $this->activo = $activo;
   }
   public function setIsbn($isbn) {
      $this->isbn = $isbn;
   }
   public function __construct($nombre=null, $id_autor=null, $descripcion=null, $id_editorial=null, $id_categoria=null, $activo=null, $isbn=null) {
      $this->nombre = $nombre;
      $this->activo = $activo;
      $this->id_categoria = $id_categoria;
      $this->id_editorial = $id_editorial;
      $this->descripcion = $descripcion;
      $this->id_autor = $id_autor;
      $this->isbn = $isbn;

   }

    public function guardar(){
       $conexion = new Conexion();
       //Localizar libro
        $temp=self::buscarPorId($this->isbn);

       if($temp) /*Modifica*/ {
          $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET nombre = :nombre, id_autor = :id_autor, descripcion = :descripcion, id_editorial = :id_editorial, id_categoria = :id_categoria, activo = :activo  WHERE isbn = :isbn');
          $consulta->bindParam(':nombre', $this->nombre);
          $consulta->bindParam(':id_autor', $this->id_autor);
          $consulta->bindParam(':descripcion', $this->descripcion);
          $consulta->bindParam(':id_categoria', $this->id_categoria);
          $consulta->bindParam(':id_editorial', $this->id_editorial);
          $consulta->bindParam(':activo', $this->activo);
          $consulta->bindParam(':isbn', $this->isbn);
          $consulta->execute();
       }else /*Inserta*/ {
          $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (nombre, id_autor,descripcion, id_editorial, id_categoria, activo, isbn) VALUES(:nombre, :id_autor, :descripcion, :id_editorial, :id_categoria, :activo, :isbn)');
          $consulta->bindParam(':nombre', $this->nombre);
          $consulta->bindParam(':id_autor', $this->id_autor);
          $consulta->bindParam(':descripcion', $this->descripcion);
          $consulta->bindParam(':id_editorial', $this->id_editorial);
          $consulta->bindParam(':id_categoria', $this->id_categoria);
          $consulta->bindParam(':activo', $this->activo);
          $consulta->bindParam(':isbn', $this->isbn);
          $consulta->execute();
          $this->isbn = $conexion->lastInsertId();
       }
       $conexion = null;
    }
    public static function eliminar($isbn){
       $conexion = new Conexion();
       //Localizar libro
        $temp=self::buscarPorId($isbn);

       if($temp) /*Eliminar*/ {
          $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA .' WHERE isbn = :isbn');
          $consulta->bindParam(':isbn', $isbn);
          $consulta->execute();
            $conexion=null;
           return "Registro eliminado satisfactoriamente";
       }else /*Si no existe*/ {
            $conexion = null;
            return "No se encontro registro";
       }

    }
    public static function ListarTodos(){
       $conexion = new Conexion();
         $query='
       SELECT
          `' . self::TABLA . '`.`isbn`,
          `' . self::TABLA . '`.`nombre`,
          `' . self::TABLA . '`.`id_autor`,
          `' . self::TABLA . '`.`descripcion`,
          `' . self::TABLA . '`.`id_editorial`,
          `' . self::TABLA . '`.`id_categoria`,
          `' . self::TABLA . '`.`activo`,
          `categoria`.`id_categoria`,
          `categoria`.`nombre` AS `nombre1`,
          `autor`.`id_autor`,
          `autor`.`nombre` AS `nombre2`,
          `autor`.`apellido_p`,
          `autor`.`apellido_m`,
          `editorial`.`id_editorial`,
          `editorial`.`nombre` AS `nombre3`
        FROM
          `editorial`
          INNER JOIN `' . self::TABLA . '` ON `editorial`.`id_editorial` = `' . self::TABLA . '`.`id_editorial`
          INNER JOIN `categoria` ON `categoria`.`id_categoria` = `' . self::TABLA . '`.`id_categoria`
        INNER JOIN `autor` ON `autor`.`id_autor` = `' . self::TABLA . '`.`id_autor`

       ORDER BY ' . self::TABLA . '.nombre';
       $consulta = $conexion->prepare($query);
       $consulta->execute();
       $registros = $consulta->fetchAll(PDO::FETCH_ASSOC);//FETCH_CLASS
       $conexion = null;
        return $registros;
    }

    public static function buscarPorId($isbn){
       $conexion = new Conexion();

       $consulta = $conexion->prepare('SELECT nombre, autor FROM ' . self::TABLA . ' WHERE isbn = :isbn');
       $consulta->bindParam(':isbn', $isbn);
       $consulta->execute();
       $registro = $consulta->fetch(PDO::FETCH_ASSOC);
       if($registro){
          return new self($registro['nombre'], $registro['autor'], $isbn);
       }else{
          return false;
       }
        $conexion = null;
    }
 }
?>
