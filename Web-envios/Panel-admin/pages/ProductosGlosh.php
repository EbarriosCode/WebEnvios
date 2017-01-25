<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Web - Envios Admin (Bebe de Rayas)</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="../../view/css/css-font/fontello.css">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">


    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">


    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Navegación</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href>Web - Envios Admin (Bebe de Rayas)</a>
            </div>


            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i><?php echo $_SESSION['Usuario']; ?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="../controller/Perfil_controller.php"><i class="fa fa-user fa-fw"></i> Usuario <?php echo $_SESSION['Usuario']; ?> </a>
                        </li>
                        <li><a href="../../controller/PrincipalLogeado_controller.php"><i class="fa fa-home fa-fw"></i> Ir al Inicio</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../../controller/cerrar_sesion.php"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
    
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Buscar....">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="../index.php"><i class="fa fa-dashboard fa-fw"></i> Administración </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Reportes Gráficos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../controller/GraficaPie_controller.php"> Gráficas PIE</a>
                                </li>
                                <li>
                                    <a href="../controller/GraficaPiramide_controller.php"> Gráficas PIRAMIDE</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i> Mantenimiento de Productos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../controller/Productos_controller.php">Productos Kiwi</a>
                                </li>
                                <li>
                                    <a href="../controller/ProductosGlosh_controller.php">Productos Glosh</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>        
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Mantenimiento de Envios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../controller/Envios_controller.php"> Envios Kiwi</a>
                                </li>
                                <li>
                                    <a href="../controller/EnviosGlosh_controller.php"> Envios Glosh</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        <li>
                        <li>
                            <a href="../controller/Usuarios_controller.php"><i class="fa fa-sitemap fa-fw"></i> Administración de Usuarios</a>
                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>

        </nav>
    
        <div id="page-wrapper">
        <br>    
        <div class="tab-content">
            <div class="tab-pane active" id="tab_consultar">
                <div class="row form-horizontal">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h2>Productos Registrados Kiwi por Mayor</h2></div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-xs-4 text-right">
                                    <label for="buscar" class="control-label">Buscar:</label>

                                </div>
                                
                                <div class="col-xs-4 text-rigt">
                                    <form action="../controller/Productos_controller.php" method="POST"><input  type="text" name="buscar" id="buscar" class="form-control"  placeholder="Ingrese cualquier dato referente al producto"/>
                                </div>

                                <div class="col-xs-4 text-left">
                                     <button class="btn btn-warning" type="submit">Buscar <span class="icon-search"></span></button>
                                     <!--<button class="btn btn-warning" type="submit">Regresar Lista</button>  -->
                                     </form>
                                     <a href="#modal-insertar" data-toggle="modal"><button type="button" class="btn btn-primary" ><span class="icon-plus"></span>Agregar / Nuevo</button></a>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                
                                    <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr class="success">
                                                <td><strong>ID</strong></td>
                                                <td><strong>NOMBRE DEL PRODUCTO</strong></td>
                                                <td><strong>PRECIO</strong></td>
                                                <td><strong>DESCRIPCION</strong></td>
                                                <td><strong>EXISTENCIA</strong></td>
                                                <td colspan="2"><strong>OPCIONES</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($productos as $item): ?>
                                            <tr>
                                                <td><?php echo $item['id_producto']; ?></td>
                                                <td><?php echo $item['nombreProducto']; ?></td>
                                                <td><?php echo $item['precio']; ?></td>
                                                <td><?php echo $item['descripcion']; ?></td>
                                                <td><?php echo $item['existencia']; ?></td>                                          
                                                <td><button class='btn btn-success' data-toggle='modal' data-target='#modal-editar' onclick="CargarDatos('<?php echo $item['id_producto'];?>','<?php echo $item['nombreProducto']; ?>','<?php echo $item['precio'];?>','<?php echo $item['descripcion'];?>','<?php echo $item['existencia'];?>');">Editar <span class="icon-pencil"></span></button></td>
                                                <td><button class="btn btn-danger" onclick="confirmarRegistro('<?php echo $item['id_producto'];?>');">Borrar <span class="icon-trash"></span></button> </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>                             
                        </div>
                        
                    </div>
                </div>
        </div>
                <!--PAGINACION --> 

    <div class="text-center">
        <nav aria-label="Page navigation">
              <ul class="pagination">
               <!-- <li class="disabled">
                  <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li> -->
               <?php 
                

                    for($i=1;$i<=$total_paginas;$i++)
                    {
                        if($i == $inicio ){
                             echo "<li class='active'><a>".$i." </a></li>";
                        }    
                        else{
                             echo "<li><a href='?pagina=".$i."'>".$i." </a></li>";  
                        }    
                    
                    }   
                
               /* if($inicio < $total_paginas){
                    echo "<li>
                      <a href='#' aria-label='Next'>
                        <span aria-hidden='true'>&raquo;</span>
                      </a>
                    </li>";
                }*/
                 ?>
              </ul>
        </nav> 
    </div>
    

        <h5 class="text-left">
            <strong>
                    <?php 
                        if($inicio == 0) $inicioPag = 1;
                        else $inicioPag = $inicio;
                        echo "Página ".$inicioPag." de ".$total_paginas;
                        echo " (Total de registros ".$total_registros.")"; 
                        
                    ?>
            </strong>
        </h5>
        <hr>
        <footer>
            <p>&copy; 2016 Kiwi Deals.</p>
        </footer> 
 
                 




    <!-- MODAL PARA EDITAR -->

                <div class="modal fade" id="modal-editar">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                 <h2 class="text-center "><strong>Editar Producto <span class="icon-pencil"></span></strong></h2>
                            </div>
                             
                            <div class="modal-body">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="nombre">Nombre Producto:</label>
                                        <input  type="hidden" id="idProducto" name="idProducto"/>
                                        <input type="text" id="nombre" name="nombre" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false">
                                    </div>

                                    <div class="form-group">
                                        <label for="descripcion">Precio:</label>
                                        <input type="text" id="precio" name="precio" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false">
                                    </div>

                                    <div class="form-group">
                                        <label for="direccion">Descripción:</label>
                                        <input type="text" id="descripcion" name="descripcion" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false">
                                    </div>

                                    <div class="form-group">
                                        <label for="responsable">Existencia:</label>
                                        <input type="number" id="existencia" name="existencia" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false" >
                                    </div>

                            </div>           

                            <div class="modal-footer">
                                <input type="submit" class="btn btn-success" id="actualizar" name="actualizar" value="Actualizar">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            </div>
                             </form>
                        </div>                     
                    </div>
                </div>

    <!-- CODIGO MODAL NUEVA EMPRESA CLIENTE  -->
                            <div class="modal fade" id="modal-insertar">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        
                                        <!-- CONTENIDO DEL HEAD - MODAL -->
                                        
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h2 class="text-center "><strong>Agregar Nuevo Producto <span class="icon-plus"></span></strong></h2>
                                        </div>
                                        
                                        <!-- Contenido de la ventana -->
                                        <div class="modal-body">
                                            
                                            <form method="POST" onSubmit="return validar();">
                                                                    
                                            <div class="form-group">                                            
                                                    <label for="nombre" class="sr-only">Nombre:</label>
                                                    <input  class="form-control" onblur="this.className ='form-control campo';" type="text" id="nombre" name="nombre" placeholder="Nombre del Producto" required autofocus>
                                                    <span></span>
                                            </div>

                                            <div class="form-group">
                                                    <label for="precio" class="sr-only">Precio:</label>
                                                    <input value="" class="form-control" onblur="this.className ='form-control campo';" type="text" id="precio" name="precio" placeholder="Precio" required>
                                                    <span></span>
                                            </div>
                                            
                                            <div class="form-group">
                                                    <label for="direccion" class="sr-only">Descripción</label>
                                                    <input value="" class="form-control" onblur="this.className ='form-control campo';" type="text" id="descripcion" name="descripcion" placeholder="Descripción" required>   
                                                    <span></span>
                                            </div>
                                            
                                            <div class="form-group">
                                                    <label for="responsable" class="sr-only">Existencia:</label>
                                                    <input type="number" class="form-control" onblur="this.className ='form-control campo';" type="text" id="existencia" name="existencia" placeholder="Existencia" required>  
                                                    <span></span>
                                            </div>

                                        <div class="modal-footer">
                                                <input type="submit" class="btn btn-primary" id="insertar" name="insertar"  value="Agregar">
                                                <!--<input type="reset" class="btn btn-danger" value="Limpiar Formulario">-->
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        </div>
 
                                        </form>
                                    </div>
                                </div>
                            </div>

    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <script>
        function CargarDatos(id,producto,precio,descripcion,existencia)
        {
            //alert(id+" "+producto);
            $("#idProducto").val(id);
            $("#nombre").val(producto);
            $("#precio").val(precio);
            $("#descripcion").val(descripcion);
            $("#existencia").val(existencia);
        }

        function confirmarRegistro(id)
        {
           if (window.confirm("Esta seguro que desea eliminar este registro?") == true)
              {
                 window.location = "Productos_controller.php?idProducto="+id+"&accion=borrar";
              }
        }
    </script>

</body>

</html>
