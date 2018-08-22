<pre>
<?php

  include_once("Libro.php");
  $libro = new Libro("El libro de C, Santos Pool, AA1/2018/CA");

  $libro->guardar();
  var_dump($libro);

    echo$libro ->getNombre();
    $data=Libro::ListarTodos();
    print_r($data);

    echo "Eliminar registro  978-970-37-0727-0";
    echo Libro::eliminar("978-970-37-0727-0");

    $data=Libro::buscarPorId("978-970-37-0727-0");

    echo $data -> getNombre();
    print_r($data);
 ?>
</pre>
