<?php

function incremento(){
  $x=3;
  return $x++;
}

echo incremento();

$x=3;

function suma($valor){
  return $valor+1;
}

echo suma($x)."<br>";

function Saludo($titulo="Sr.",$nombre="Desconocido"){
  return "HOla ".$titulo."".$nombre;
}

echo Saludo()."<br>";
echo Saludo('Prof')."<br>";
echo Saludo(',"Enrique"')."<br>";
?>
