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

    <style>
        .color{
            color: #DF0101;
        }

        .botonNuevo{
            float: right;
        }

        .devolucion{
            background: #F3F781;
        }
    </style>


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
                        <!-- envios -->
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
                                <h2>Envios Registrados Kiwi por Mayor</h2>
                                <div class="text-right"><button class="btn" data-toggle='modal' data-target='#modal-busqueda'>Consulta por Rango de Fechas <span class="icon-calendar"></span>
                                </button></div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-xs-4 text-right">
                                    <label for="buscar" class="control-label">Buscar:</label>

                                </div>
                                
                                <div class="col-xs-5 text-left">
                                    <form action="../controller/Envios_controller.php" method="POST"><input  type="text" name="buscar" id="buscar" class="form-control"  placeholder="Cliente, Departamento, Número de guía, Producto o Estado" onkeypress="return validateInput(event)"  onpaste="return false"/>
                                </div>
                                
                                <br><br>
                                <div class="col-xs-8 text-right">
                                     <button class="btn btn-warning" type="submit">Buscar <span class="icon-search"></span></button>
                                     <!--<button cla        ss="btn btn-warning" type="submit">Regresar Lista</button>  -->
                                     </form>
                                     <a href="#modal-insertar" data-toggle="modal"><button type="button" class="btn btn-primary" ><span class="icon-plus"></span>Registrar / Nuevo</button></a>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                
                                    <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr class="info">
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
                                                <td><strong>CAEX</strong></td>                                                
                                                <td colspan="2" class="text-center"><strong>OPCIONES</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($envios as $item): ?>
                                            <tr <?php  if($item['pago_cargo']==1) echo "class=danger"; ?> <?php if($item['estado_entrega']==2) echo "class=devolucion"; ?>>
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
                                                        echo $item['nombreEstado'];
                                                        /*if($item['estado_entrega']=='1')
                                                        {
                                                            echo 'Entregado';
                                                        } 
                                                        else
                                                            echo "Pendiente";    */
                                                     ?>

                                                </td>
                                                <td> 
                                                    <form id="formulario" action="" method="POST">                            
                                                    <input type="hidden" name="id" value="<?php echo $item['id_envio']; ?>">
                                                    <input type="hidden" name="numeroGuia" value="<?php echo $item['numeroGuia']; ?>">                                               
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" name="pagado" id="pagado" <?php if($item['pago_cargo']==1){ ?> checked   <?php } ?> value="1">
                                                                <button  type="submit" name="btn-pagar"><span class="glyphicon glyphicon-usd"></span></button>
                                                            </label> 
                                                            
                                                      
                                                    </form>                                                       
                                                </td>                                                
                                                <td><a href="EnviosEdit_controller.php?id=<?php echo $item['id_envio']; ?>"><button class='btn btn-success' data-toggle='modal' data-target="#modl-editar" >Editar<span class="icon-pencil"></span></button></a></td>                         

                                                <td><button class="btn btn-danger" onclick="confirmarRegistro('<?php echo $item['id_envio'];?>');">Borrar <span class="icon-trash"></span></button> </td>
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
        
<!--PAGINACION --> 

    <div class="text-center">
        <nav aria-label="Page navigation">
              <ul class="pagination">
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
            <p>&copy; 2017 Kiwi Deals.</p>
        </footer>
    </div>

    <!--  Function ajax para reucperar la existencia en el combo productos-->
    <script type="text/javascript">
        function ajax(str){
            var peticion;

            if(str=="")
            {
                document.getElementById("txtHint").innerHTML = "";
                return;
            }   

            else
            {
                if(window.XMLHttpRequest){
                peticion = new XMLHttpRequest();
                
                }else{
                    peticion = new ActiveXObject("Microsoft.XMLHTTP");
                }
            }

            peticion.onreadystatechange = function(){
                if ( peticion.readyState == 4 && peticion.status == 200 )
                {
                    document.getElementById("txtHint").innerHTML = peticion.responseText;
                }
            };
            
            peticion.open("GET","RecuperarExistencia_controller.php?parametro="+str,true);
            peticion.send();
        }
    </script>

    <!-- CODIGO MODAL PARA NUEVO ENVIO DE KIWI -->
                            <div class="modal fade" id="modal-insertar">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        
                                        <!-- CONTENIDO DEL HEAD - MODAL -->
                                        
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h2 class="text-center "><strong>Agregar Nuevo Envio <span class="icon-plus"></span></strong></h2>
                                        </div>
                                        
                                        <!-- Contenido de la ventana -->
                                        <div class="modal-body">
                                            
                                            <form method="POST">
                                                                    
                                            <div class="form-group">                                            
                                                    <label for="nombre">Nombre del Cliente:</label>
                                                    <input type="text" id="nombre" name="nombre" class="form-control" onkeypress="return validateInput(event)" onpaste="return false" required>
                                            </div>

                                            <div class="form-group">
                                            <label for="telefono">Teléfono:</label>
                                            <input type="number" id="telefono" name="telefono" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="numeroGuia">No. de Guía:</label>
                                                <input type="text" id="numeroGuia" name="numeroGuia" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="departamento">Departamento:</label>
                                                <select id="departamento" name="departamento" class="form-control" required>
                                                    <option selected="">Seleccione:</option>
                                                    <?php 
                                                        foreach($Departamentos as $depto)
                                                        {
                                                            echo "<option value='$depto[id_departamento]'>".$depto['nombreDepartamento']."</option>";
                                                        }
                                                     ?>
                                                </select>
                                            </div>


                                            <div class="form-group">
                                                <label for="direccion">Direccion Exacta:</label>
                                                <textarea id="direccion" name="direccion" class="form-control" onkeypress="return validateInput(event)" onpaste="return false" required></textarea>
                                            </div>                                        
    
                                            <div class="form-group">
                                                <button type="button" id="btn-add" class="btn btn-primary">Agregar Otro Producto <span class="icon-plus"></span></button>
                                                <br>
                                                <table class="table table-bordered" id="tablaProductos">
                                                    <tr>
                                                        <th><label for="producto">Producto</label></th>
                                                        <th class="text-center">Cantidad</th>    
                                                        <th><label for="">Opción</label></th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <select id="producto" name="productos[]" class="form-control" onchange="ajax(this.value)" required>
                                                                <option selected="">Seleccione:</option>
                                                                <?php 
                                                                    foreach($Productos as $prod)
                                                                    {
                                                                        echo "<option value='$prod[id_producto]'>".$prod['nombreProducto']." <i>[Existencia $prod[existencia]]</i></option>";
                                                                    }
                                                                 ?>
                                                            </select>
                                                        </td>
                                                        <td><input type="number" id="cantidadN" name="cantidadN[]" class="form-control" placeholder="Cantidad" required></td>
                                                    
                                                        <td class="text-center"><button class="btn btn-danger" disabled>Quitar</button></td>
                                                    </tr>                                                   
                                                </table>  
                                                <div id="txtHint" class="color"></div>
                                                <div id="alerta-roja" class="elemento">
                                                    <div id="alerta" class="alert alert-danger" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;
                                                          </span></button>
                                                          <strong>Error :</strong> Esta queriendo enviar más productos de los que hay en existencia. El botón agregar se ha bloqueado hasta que corrija el error.
                                                    </div>
                                                </div>  
                                                
                                            </div>

                                            <!--<div class="form-group">                                                
                                                <label for="cantidad">Cantidad:</label>
                                                <input type="number" id="cantidadN" name="cantidadN" class="form-control" required>
                                                <br>    
                                                <div id="alerta-roja" class="elemento">
                                                    <div id="alerta" class="alert alert-danger" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;
                                                          </span></button>
                                                          <strong>Error :</strong> Esta queriendo enviar más productos de los que hay en existencia. El botón agregar se ha bloqueado hasta que corrija el error.
                                                    </div>
                                                </div>
                                            </div>  -->

                                            <div class="form-group">
                                                <label for="precio">Precio:</label>
                                                <input type="number" id="precio" name="precio" class="form-control" required>
                                                <!--<select id="precio" name="precio" class="form-control" required>
                                                    <option selected="">Seleccione:</option>
                                                    <?php 
                                                        /*foreach($Productos as $prod)
                                                        {
                                                            echo "<option value='$prod[precio]'>".$prod['precio']."</option>";
                                                        }*/
                                                     ?>
                                                </select> -->
                                            </div>

                                            <div class="form-group">
                                                <label for="status">Fecha:</label>
                                                <input type="date" id="fecha" name="fecha" class="form-control" value="<?php echo date('Y-m-d');?>" required>
                                            </div>
                                            
                                            <br>
                                            <div class="form-group"><label for="">Estado:</label><br>
                                                <label class="radio-inline">
                                                  <input type="radio" name="status" id="Radio1" value="1"> Entregado
                                                </label>
                                                <label class="radio-inline">
                                                  <input type="radio" name="status" id="Radio2" value="0" checked> Pendiente
                                                </label>
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
                            </div>    

<!-- MODAL PARA FILTRAR POR RANGO DE FECHA ENVIOS DE KIWI -->

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
                                                  <input type="radio" name="status" id="Radio3" value="3" checked> Todos
                                                </label>
                                                <label class="radio-inline">
                                                  <input type="radio" name="status" id="Radio1" value="1"> Entregados
                                                </label>
                                                <label class="radio-inline">
                                                  <input type="radio" name="status" id="Radio2" value="0"> Pendientes
                                                </label>
                                                <label class="radio-inline">
                                                  <input type="radio" name="status" id="Radio4" value="2"> Devolución
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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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
        // alerta por si lo despachado es mayor que la existencia en formulario de nuevo desactivada
        $(document).ready(function(){
            $("#alerta").hide();            

            // agregar más productos
            $("#btn-add").click(function(){
                $("#tablaProductos").append("<tr><td><select name='productos[]' class='form-control'><option>Seleccione:</option><?php foreach($Productos as $prod){echo "<option value='$prod[id_producto]'>".$prod['nombreProducto']."<i> [Existencia $prod[existencia]]</i></option>";} ?></select></td><td><input type='number' id='cantidadM' name='cantidadN[]' class='form-control' placeholder='Cantidad' required></td><td><button type='button' class='btn btn-danger btn-danger-quitar'>Quitar</button></td></tr>");
            });
            // fin agregar más productos

            // llamado a funcion par quitar productos
            $("body").on('click',".btn-danger-quitar",EliminarFila);

            // alerta por si lo despachado es mayor que la existencia en formulario de nuevo desactivada
            $("#cantidadN").blur(function(){
                var cantidadInput = parseInt($("#cantidadN").val());
                var existencia = parseInt($("#existenciaBD").val());
                //alert("Cantidad en el input: "+cantidadInput +" existencia: "+existencia);
                if(cantidadInput > existencia)
                {
                    $("#alerta").show();
                    $('#insertar').attr("disabled", true);
                    return false;
                }
                if(!(cantidadInput > existencia))
                {
                    $("#alerta").hide();
                    $('#insertar').attr("disabled", false);
                    return false;
                } 
            });

        });

        // function para quitar productos del modal del nuevo envio
        function EliminarFila()
        {
            $(this).parent().parent().fadeOut("slow",function(){$(this).remove();});
        }

        function confirmarRegistro(id)
        {
           if (window.confirm("Esta seguro que desea eliminar este registro?") == true)
              {
                 window.location = "Envios_controller.php?idEnvio="+id+"&accion=borrar";
              }
        }

        function validateInput(e)
        {
            key = e.keyCode || e.which;
            teclado = String.fromCharCode(key);
            caracteres = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ´áéíóúÁÉÍÓÚ0123456789-";
            especiales = "8-37-38-46-164";
            teclado_especial = false;

                for(var i in especiales)
                {
                    if(key==especiales[i])
                    {
                        teclado_especial = true;
                        break;
                    }
                }

                if(caracteres.indexOf(teclado) == -1 && !teclado_especial)
                {
                    return false;
                }
        }
    </script>
    <!--<script src="../js/tablaProductos.js"></script>-->

</body>

</html>
