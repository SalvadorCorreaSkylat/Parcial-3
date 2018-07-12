<?php
 define("RUTA","/parcial3")
?>

<¡DOCTYPE html>
<html lag="en">
<head>
  <meta charset="utf-8">
  <meta  name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="id=edge">
  <title> Ejemplo3 </title>
</head>
<body>
  <?php
 $valor = 5;
 echo "El valor es: ".$valor."\n<br>";
echo "El valor es: $valor\n"; //ojo: comilas dobles

echo RUTA;
echo "<pre>";
print_r($_SERVER);
echo "</pre>";
  ?>
</body>
</html>
