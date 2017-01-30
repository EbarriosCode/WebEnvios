<!DOCTYPE html>
<html lang="es">

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
                        <div class="panel-heading"><h2>Usuarios del Sistema</h2></div>
                        <div class="panel-body">
                            <div class="form-group">                              

                                <div class="col-xs-4 text-left">                                     
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
                                                <td><strong>NOMBRE</strong></td>
                                                <td><strong>USUARIO</strong></td>
                                                <td><strong>CONTRASEÑA</strong></td>
                                                <td><strong>TIPO USUARIO</strong></td>
                                                <td><strong>ESTADO</strong></td>
                                                <td><strong>NIVEL ACCESO</strong></td>
                                                <td colspan="2"><strong>OPCIONES</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($Usuarios as $item): ?>
                                            <tr>
                                                <td><?php echo $item['id']; ?></td>
                                                <td><?php echo $item['nombre']." ".$item['apellido'];; ?></td>
                                                <td><?php echo $item['usuario']; ?></td>
                                                <td><?php echo $item['password']; ?></td>
                                                <td><?php echo $item['nombreRol']; ?></td>   
                                                <td><?php echo $item['nombre_estado_usuarios']; ?></td>
                                                <td><?php echo $item['nombreAcceso']; ?></td>

                                                <td><button class='btn btn-success' data-toggle='modal' data-target='#modal-editar' onclick="CargarDatos('<?php echo $item['id'];?>','<?php echo $item['nombre']; ?>','<?php echo $item['apellido'];?>','<?php echo $item['usuario'];?>','<?php echo $item['password'];?>','<?php echo $item['tipo'];?>','<?php echo $item['estado'];?>','<?php echo $item['acceso'];?>');">Editar <span class="icon-pencil"></span></button></td>
                                                <td><button class="btn btn-danger" onclick="confirmarRegistro('<?php echo $item['id_producto'];?>');" disabled>Borrar <span class="icon-trash"></span></button> </td>
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
    

        <h5 class="text-left">
            <strong>
                    <?php 
                        echo "<h4>Total de Usuarios ".$obj->numRegistros()."</h4>";  
                    ?>
            </strong>
        </h5>
        <hr>
        <footer>
            <p>&copy; 2017 Kiwi Deals.</p>
        </footer> 
 
                 




    <!-- MODAL PARA EDITAR -->

                <div class="modal fade" id="modal-editar">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                 <h2 class="text-center "><strong>Editar Usuario <span class="icon-pencil"></span></strong></h2>
                            </div>
                             
                            <div class="modal-body">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="nombre">Nombre:</label>
                                        <input  type="hidden" id="idUsuario" name="idUsuario"/>
                                        <input type="text" id="nombre" name="nombre" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false">
                                    </div>

                                    <div class="form-group">
                                        <label for="descripcion">Apellido:</label>
                                        <input type="text" id="apellido" name="apellido" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false">
                                    </div>

                                    <div class="form-group">
                                        <label for="direccion">Nick Usuario:</label>
                                        <input type="text" id="nick" name="nick" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false">
                                    </div>

                                    <div class="form-group">
                                        <label for="direccion">Contraseña Usuario:</label>
                                        <input type="password" id="password" name="password" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false">
                                    </div>
									
									<div class="form-group"><label for="">Rol Usuario:</label><br>                                                
                                          <select name="rol" id="rol" class="form-control">
                                          		<?php 
                                                        foreach($Roles as $item)
                                                        {
                                                            echo "<option value='$item[id_rol]'";
                                                            		if($item['id_rol']==1)
                                                            		{
                                                            			echo "selected";
                                                            		}
                                                            		
                                                            echo ">".$item['nombreRol']."</option>";
                                                        }
                                                     ?>
                                          </select>
                                    </div>

                                    <div class="form-group"><label for="">Nivel de Acceso:</label><br>                                                                    
                                        <select name="acceso" id="acceso" class="form-control" required>
                                            <option value="">Seleccione: </option>
                                                <?php 
                                                        foreach($Accesos as $item)
                                                        {
                                                            echo "<option value='$item[id_acceso]'";
                                                                    /*if($item['id_acceso']==1 || $item['id_acceso']==2)
                                                                    {
                                                                        echo "selected";
                                                                    }*/
                                                            echo ">".$item['nombreAcceso']."</option>";
                                                        }
                                                     ?>
                                          </select> 
                                          
                                    </div> 

                                    <div class="form-group"><label for="">Estado:</label><br>                                      	                             
                                                <label class="radio-inline">
                                                  <input type="radio" name="status" id="Radio1" value="1"> Activo
                                                </label>
                                                <label class="radio-inline">
                                                  <input type="radio" name="status" id="Radio2" value="0"> Inactivo
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

    <!-- CODIGO MODAL NUEVO USUARIO  -->
                            <div class="modal fade" id="modal-insertar">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        
                                        <!-- CONTENIDO DEL HEAD - MODAL -->
                                        
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h2 class="text-center "><strong>Agregar Nuevo Usuario <span class="icon-plus"></span></strong></h2>
                                        </div>
                                        
                                        <!-- Contenido de la ventana -->
                                       <div class="modal-body">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="nombre">Nombre:</label>
                                        <input  type="hidden" id="idUsuario" name="idUsuario"/>
                                        <input type="text" id="nombre" name="nombre" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="descripcion">Apellido:</label>
                                        <input type="text" id="apellido" name="apellido" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="direccion">Nick Usuario:</label>
                                        <input type="text" id="nick" name="nick" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="direccion">Contraseña Usuario:</label>
                                        <input type="password" id="password" name="password" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false" required>
                                    </div>
									
									<div class="form-group"><label for="">Rol Usuario:</label><br>                                                
                                          <select name="rol" id="rol" class="form-control" required>
                                          	<option value="">Seleccione: </option>
                                          		<?php 
                                                        foreach($Roles as $item)
                                                        {
                                                            echo "<option value='$item[id_rol]'>".$item['nombreRol']."</option>";
                                                        }
                                                     ?>
                                          </select>
                                    </div> 

                                     <div class="form-group"><label for="">Nivel de Acceso:</label><br>                                                                    
                                        <select name="acceso" id="acceso" class="form-control" required>
                                            <option value="">Seleccione: </option>
                                                <?php 
                                                        foreach($Accesos as $item)
                                                        {
                                                            echo "<option value='$item[id_acceso]'>".$item['nombreAcceso']."</option>";
                                                        }
                                                     ?>
                                          </select> 
                                          
                                    </div>


                                    <div class="form-group"><label for="">Estado:</label><br>                                      	                             
                                                <label class="radio-inline">
                                                  <input type="radio" name="status" id="Radio1" value="1" checked> Activo
                                                </label>
                                                <label class="radio-inline">
                                                  <input type="radio" name="status" id="Radio2" value="0"> Inactivo
                                                </label> 
                                          
                                    </div>                                    
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
        function CargarDatos(id,nombre,apellido,usuario,password,tipo,estado,acceso)
        {
            //alert(id+" tipo: "+tipo+" status: "+estado);
            $("#idUsuario").val(id);
            $("#nombre").val(nombre);
            $("#apellido").val(apellido);
            $("#nick").val(usuario);
            $("#password").val(password);
            $("#rol").val(tipo);
            
            if(estado == 1)
            	$("#Radio1").prop("checked",true);
            else
            	$("#Radio2").prop("checked",true);

            $("#acceso option[value="+ acceso +"]").attr("selected",true);
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
