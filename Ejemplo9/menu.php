<?php

  include_once("Libro.php");
    $data = Libro::ListarTodos();
 ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title> Formulario </title>


     <link rel="stylesheet" href="recursos/css/bootstrap.min.css" />
     <link rel="stylesheet" href="recursos/css/style.css" media="screen" />

 </head>
     <body>
         <div class="container-fluid h-100">
             <div class="row h-100">
                 <div class="col-2 collapse d-md-flex bg-light pt-2 h-100" id="sidebar">
                     <ul class="nav flex-column flex-nowrap">
                        <li class="nav-item"><a class="nav-link" href="#">menu 1</a></li>
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="#submenu1" data-toggle="collapse" data-target="#submenu1">Menu 2</a>
                            <div id="submenu1" class="collapse" aria-expanded="false">
                                 <ul class="flex-column pl-2 nav">
                                     <li class="nav-item"><a class="nav-link" href="#">
                                         submenu 2.1</a></li>
                                     <li class="nav-item"><a class="nav-link" href="#">
                                         submenu 2.2</a></li>
                                     <li class="nav-item"><a class="nav-link" href="#">
                                         submenu 2.3</a></li>
                                </ul>
                            </div>
                         </li>
                        <li class="nav-item"><a class="nav-link" href="#">menu3</a></li>
                     </ul>
                 </div>
                 <div class="col pt-2">
                     <h2>Registros</h2>
                     <table class="table table-responsive">
                         <thead>
                             <tr>
                                 <td>ISBN</td>
                                 <td>Nombre</td>
                                 <td>Autor</td>
                                 <td>Editorial</td>
                                 <td>Activo</td>
                                 <td>Operaciones</td>
                             </tr>
                         </thead>
                         <tbody>
                             <?php
                             foreach($data as $d){
                             ?>
                             <tr>
                                 <td><?php echo $d['isbn'];?></td>
                                 <td><?php echo $d['nombre'];?></td>
                                 <td><?php echo $d['nombre2']." ".$d['apellido_p']." ".$d['apellido_m'];?></td>
                                 <td><?php echo $d['nombre3'];?></td>
                                 <td><?php echo ($d['activo'])?'<span class="badge badge-success">Disponible</span>':'<span class="badge badge-danger">No disponible</span>';?></td>
                                 <td><span>Editar</span> <span>Eliminar</span> </td>
                             </tr>
                             <?php
                             }
                             ?>
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     <!--Librerias Bootstrap4-->
     <script src="recursos/js/jquery-3.3.1.min.js"></script>
     <script src="recursos/js/popper.min.js"></script>
     <script src="recursos/js/bootstrap.min.js"></script>
     </body>
 </html>
