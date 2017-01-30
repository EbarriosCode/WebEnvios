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
                        <li><a href="../controller/profile_controller.php"><i class="fa fa-user fa-fw"></i> Usuario <?php echo $_SESSION['Usuario']; ?> </a>
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
                                    <a href="#">Gráficas Kiwi <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="../controller/GraficaPie_controller.php">Gráfica PIE</a>
                                        </li>
                                        <li>
                                            <a href="../controller/GraficaPiramide_controller.php">Gráfica PIRAMIDE</a>
                                        </li>                                        
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li>
                                    <a href="#">Gráficas Glosh <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="../controller/GraficaPieGlosh_controller.php">Gráfica PIE</a>
                                        </li>
                                        <li>
                                            <a href="../controller/GraficaPiramideGlosh_controller.php">Gráfica PIRAMIDE</a>
                                        </li>                                        
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li> 
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Mantenimiento de Productos<span class="fa arrow"></span></a>
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
                            <a href="#"><i class="icon-truck"></i> Mantenimiento de Envios<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="../controller/Envios_controller.php"> Envios Kiwi</a>
                                </li>
                                <li>
                                    <a href="../controller/EnviosGlosh_controller.php"> Envios Glosh</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <!-- fin envios -->
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
                        <div class="panel-heading">
                                <h2>Reporte de Envios por Rango de Fecha o Estado</h2>
                                <div class="text-right"><button class="btn" data-toggle='modal' data-target='#modal-busqueda'>Consulta por Rango de Fechas <span class="icon-calendar"></span>
                                </button></div>                                
                        </div>
                        <div class="panel-body">

                            <div class="form-group">
                                
                                    <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr class="success">
                                                <td><strong>ID</strong></td>
                                                <td><strong>CLIENTE</strong></td>
                                                <td><strong>TELEFONO</strong></td>
                                                <td><strong>NUMERO DE GUIA</strong></td>
                                                <td><strong>DEPARTAMENTO</strong></td>
                                                <!--<td><strong>DIRECCION</strong></td>-->
                                                <td><strong>PRODUCTO</strong></td>
                                                <td><strong>CANTIDAD</strong></td>
                                                <td><strong>PRECIO</strong></td>
                                                <td><strong>FECHA</strong></td>
                                                <td><strong>ESTADO</strong></td>
                                                <td colspan="2"><strong>OPCIONES</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($reporte as $item): ?>
                                            <tr <?php  if($item['pago_cargo']==1) echo "class=danger"; ?>>
                                                <td><?php echo $item['id_envio']; ?></td>
                                                <td><?php echo $item['cliente']; ?></td>
                                                <td><?php echo $item['telefono']; ?></td>
                                                <td><?php echo $item['numeroGuia']; ?></td>
                                                <td><?php echo $item['nombreDepartamento']; ?></td>
                                                <td><?php echo $item['nombreProducto']; ?></td>
                                                <td><?php echo $item['cantidad']; ?></td>
                                                <td><?php echo $item['precio_envio']; ?></td>
                                                <td><?php 
                                                        $fecha = date_create($item['fecha']);
                                                        echo date_format($fecha, 'd/m/Y');
                                                        //echo $item['fecha']; 
                                                    ?></td>
                                                <td>
                                                    <?php 
                                                        if($item['estado_entrega']=='1')
                                                        {
                                                            echo 'Entregado';
                                                        } 
                                                        else
                                                            echo "Pendiente";    
                                                     ?>

                                                </td>
                                                <td><a href="EnviosEdit_controller.php?id=<?php echo $item['id_envio']; ?>"><button class='btn btn-success' data-toggle='modal' data-target="#modl-editar" >Editar<span class="icon-pencil"></span></button></a></td>                                          

                                                <!--<td><button class='btn btn-success' data-toggle='modal' data-target='#modal-editar' onclick="CargarDatos('<?php /*echo $item['id_envio'];?>','<?php echo $item['cliente']; ?>','<?php echo $item['telefono'];?>','<?php echo $item['numeroGuia'];?>','<?php echo $item['nombreDepartamento'];?>','<?php echo $item['nombreProducto']; ?>','<?php echo $item['cantidad']; ?>','<?php echo $item['precio_envio']; ?>','<?php echo $item['fecha']; ?>','<?php echo $item['estado_entrega']; */ ?>');">Editar <span class="icon-pencil"></span></button></td>
                                                -->
                                                
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    </div>
                            </div>  
                            <?php   
                                if(isset($num_registrosBusqueda) && strcmp($buscar,"") !== 0)
                                {                                                             
                                    if($num_registrosBusqueda > 0)
                                    {
                                        echo "<h4>Se encontraron ".$num_registrosBusqueda." Resultados";
                                    }
                                    else
                                       echo "<h4>No Se encontraron Resultados"; 
                                }
                            ?>                           
                        </div>
                        
                    </div>
                </div>
        </div>
                <!--PAGINACION --> 
    <?php if (count($reporte)==0) { 
        echo "<h4>No se Encontraron registros</h4>";
    }
    else{
        echo "<h4>Se encontraron ".count($reporte)." Resultados<br><br></h4>";
     } ?>
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
                                 <h2 class="text-center "><strong>Editar Envios <span class="icon-pencil"></span></strong></h2>
                            </div>
                             
                            <div class="modal-body">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="nombre">Nombre del Cliente:</label>
                                        <input  type="hidden" id="idEnvio" name="idEnvio"/>
                                        <input type="text" id="nombre" name="nombre" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false">
                                    </div>

                                    <div class="form-group">
                                        <label for="descripcion">Teléfono:</label>
                                        <input type="text" id="telefono" name="telefono" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false">
                                    </div>

                                    <div class="form-group">
                                        <label for="direccion">No. de Guía:</label>
                                        <input type="text" id="numeroGuia" name="numeroGuia" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false">
                                    </div>

                                    <div class="form-group">
                                        <label for="responsable">Departamento:</label>
                                        <select id="departamento" name="departamento" class="form-control"> 
                                            <option selected>Seleccione:</option>
                                                    <?php 
                                                        foreach($Departamentos as $depto)
                                                        {
                                                            echo "<option value='$depto[id_departamento]'>".$depto['nombreDepartamento']."</option>";
                                                        }
                                                     ?>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="responsable">Producto:</label>
                                        <select id="producto" name="producto" class="form-control" required>
                                            <option selected>Seleccione:</option>
                                                <?php 
                                                    foreach($Productos as $prod)
                                                    {
                                                        echo "<option value='$prod[id_producto]'>".$prod['nombreProducto']."</option>";
                                                    }
                                                ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="descripcion">Cantidad:</label>
                                        <input type="number" id="cantidad" name="cantidad" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false">
                                    </div>

                                    <div class="form-group">
                                        <label for="direccion">Precio:</label>
                                        <select id="precio" name="precio" class="form-control" required>
                                            <option selected="">Seleccione:</option>
                                                <?php 
                                                    foreach($Productos as $prod)
                                                    {
                                                        echo "<option value='$prod[precio]'>".$prod['precio']."</option>";
                                                    }
                                                ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="direccion">Fecha:</label>
                                        <input type="date" id="fecha" name="fecha" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false">
                                    </div>
                                    
                                    <br>
                                    <div class="form-group"><label for="">Estado:</label><br>
                                        <label class="radio-inline">
                                          <input type="radio" name="estado" id="Radio1" value="option1"> Entregado
                                        </label>
                                        <label class="radio-inline">
                                          <input type="radio" name="estado" id="Radio2" value="option2"> Pendiente
                                        </label>
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

<!-- MODAL PARA FILTRAR POR RANGO DE FECHA -->

                <div class="modal fade" id="modal-busqueda">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                 <h2 class="text-center "><strong>Consulta por Rango de Fecha <span class="icon-calendar"></span></strong></h2>
                            </div>
                             
                            <div class="modal-body">
                                <form action="ReporteEnviosFE_controller.php" method="POST">                                   

                                    <div class="form-group">
                                        <label for="desde">Desde:</label>
                                        <input type="date" id="desde" name="desde" class="form-control" value="<?php echo date('Y-m-d');?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="hasta">Hasta:</label>
                                        <input type="date" id="hasta" name="hasta" class="form-control" value="<?php echo date('Y-m-d');?>">
                                    </div>          

                                    <div class="form-group"><label for="">Estado:</label><br>
                                                <label class="radio-inline">
                                                  <input type="radio" name="status" id="Radio3" value="2" checked> Todos
                                                </label>
                                                <label class="radio-inline">
                                                  <input type="radio" name="status" id="Radio1" value="1"> Entregados
                                                </label>
                                                <label class="radio-inline">
                                                  <input type="radio" name="status" id="Radio2" value="0"> Pendientes
                                                </label>
                                    </div>                  
                                    
                            </div>           

                            <div class="modal-footer">
                                <input type="submit" class="btn btn-warning" id="busqueda-fechas" name="busqueda-fechas" value="Consultar">
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
        /*function CargarDatos(id,cliente,telefono,numeroGuia,departamento,producto,cantidad,precio,fecha,estado)
        {
            //alert(departamento+" "+producto);
            $("#idEnvio").val(id);
            $("#nombre").val(cliente);
            $("#telefono").val(telefono);
            $("#numeroGuia").val(numeroGuia);
            $("#departamento").val(departamento);
            $("#producto").val(producto);
            $("#cantidad").val(cantidad);
            $("#precio").val(precio);
            $("#fecha").val(fecha);
            $("#estado").val(estado);
        }*/

        function confirmarRegistro(id)
        {
           if (window.confirm("Esta seguro que desea eliminar este registro?") == true)
              {
                 window.location = "Envios_controller.php?idEnvio="+id+"&accion=borrar";
              }
        }
    </script>

</body>

</html>
