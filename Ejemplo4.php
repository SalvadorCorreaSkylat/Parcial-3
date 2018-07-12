<?php
$n1=20;
$n2=16;
if($n1>$n2){
  echo $n1."Es mayor<br>";
} else {
  echo $n2." es mayor<br>";
}
if($n1<$n2){
  echo $n1."Es mayor<br>";
} else {
  echo $n2." es mayor<br>";
}
if($n1>=$n2){
  echo $n1."Es mayor o igual<br>";
} else {
  echo $n2." es mayor o igual<br>";
}
if($n1<=$n2){
  echo $n1."Es mayor o igual <br>";
} else {
  echo $n2." es mayor o igual<br>";
}
if($n1!=$n2){
  echo $n2."Son diferentes<br>";
}

for($x=0;$x<10;$x++){
  echo $x."<br>";
}

$n1=5;
switch ($n1) {
  case 1:{
    echo "Caso uno";
    break;
  }
  case 2:{
    echo "Caso dos";
    break;
  }
  case 3:{
    echo "Caso tres";
    break;
  }

  default:
    echo "Predeterminado";
}

$arreglo 0 Iarray(1,2,3,4);
echo $arreglo[3];
//Solo obtiene el valor del arreglo
foreach ($arreglo as $r) {
  echo "<li>".$r."</li>";
}
echo "</ul>"

echo "<ul id='lista2'>";
//Solo obtiene el index y el $valor
foreach ($arreglo as $index=>$valor) {
  echo "<li>"x[$index].$valor."</li>";
}
echo "</ul>"

$arreglo=array("nombre"=>"Juan", "Apellido"=>"Lopez","Edad"=>21);
echo "<ul id='lista3'>";
//Solo obtiene el index y el $valor
foreach ($arreglo as $index=>$valor) {
  echo "<li>"x[$index].$valor."</li>";
}
echo "</ul>"
 ?>
