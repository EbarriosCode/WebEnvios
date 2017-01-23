<?php 
    session_start();
        //echo $_SESSION['Usuario'];
    if (!isset($_SESSION['Usuario'])) {
            header(("Location:../index.php"));
    } 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Control de Productos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
    <link rel="stylesheet" type="text/css" href="../css/css-font/fontello.css"> 
    <link rel="stylesheet" type="text/css" href="../css/validarForm.css">
    
</head>
      <?php 
        if($_SESSION['tipo'] == 1)
          {
         ?>
              <style>.dis{
                        pointer-events:default;
                        opacity: 1;
                        cursor: default;
                        }
              </style> 
          <?php } 
          else{
          ?>
          <style>
          .dis{
            pointer-events:none;
            opacity: .3;
            cursor: none;
          } 
      </style>
      <?php } ?>
      <?php 
          if(isset($_GET['boolean']))
          {
            echo "<style>.elemento{display:inline;}</style>";
          }
       ?>

<body onload="lista_Productos('','1')">
    <div class="container">
    <br>    
        <header>
            <nav class="navbar navbar-default nabar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1" aria-expanded="false">
                            <span class="sr-only">Menu</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <strong href="#" class="navbar-brand">Web - Envios</strong>
                    </div>

                    <div class="collapse navbar-collapse" id="navbar-1">
                
                        <ul class="nav navbar-nav navbar-right" >
                            
                            <li class="hovered"> <a href="../../controller/PrincipalLogeado_controller.php">Inicio<span class="icon-home"></span></a></li>
                            <!-- empieza dropdown -->
                            <li class="dropdown hovered">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mantenimiento<span class="icon-cogs"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="../view/modules/EmpresasClientebuscar_vista.php">Productos<span class="icon-users"></span></a></li>                            
                              </ul>
                            </li>
                            <li class="dropdown hovered">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Consulta de Envios<span class="icon-pencil"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="hovered "> <a href="ControlService_controlador.php">Filtrar Envios<span class="icon-search"></span></a></li>
                                </ul>
                            </li>

                            <li class=" hovered dis ">
                                <a href="../Panel-admin">P-admin<span class="icon-chart-line"></span></a>
                            </li>
                            
                            <li class="hovered"><a href="../controller/cerrar_sesion.php">Salir<span class="icon-reply-all"></span></a></li>
                        </ul>

                    </div>
                </div>
                
            </nav>
        </header>
    </div>


    <div class="container">

         <div class="row form-horizontal">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_consultar" data-toggle="tab">Consulta de productos <span class="icon-basket"></span></a></li>              
            </ul>
        </div>

        <br>


        <div class="tab-content">
            <div class="tab-pane active" id="tab_consultar">
                <div class="row form-horizontal">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h4>Productos Registrados</h4></div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-xs-4  text-right">
                                    <label for="buscar" class="control-label">Buscar:</label>

                                </div>
                                
                                <div class="col-xs-4">
                                    <input  type="text" name="buscar" id="buscar" class="form-control" onkeyup="lista_Productos(this.value,'1');" placeholder="Ingrese cualquier dato referente al producto" onkeypress="return validateInput(event)"  onpaste="return false"/>
                                </div>

                                <div class="col-xs-4 text-left">
                                     <a href="#modal-insertar" data-toggle="modal"><button type="button" class="btn btn-primary" ><span class="icon-plus"></span>Agregar / Nuevo</button></a>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <div id="lista"></div> 
                                <div id="paginacion" class="text-center"></div>
                            </div> 
                            
                        </div>
                        
                    </div>
                </div>
              <hr>

      <footer>
        <p>Derechos Reservados &copy; 2016 Kiwi por Mayor.</p>
      </footer>
            </div>
         
        </div><!-- tab content -->
    </div>

     <!-- MODAL PARA EDITAR -->

                <div class="modal fade" id="modal-editar">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                 <h2 class="text-center "><strong>Editar Producto <span class="icon-pencil"></span></strong></h2>
                            </div>
                             
                            <div class="modal-body">
                                <form action="../../controller/Productos_controller.php" method="POST">
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
                                        <input type="number" id="existencia" name="existencia" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false" disabled>
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
                                            
                                            <form action="../../controller/Productos_controller.php" method="POST" onSubmit="return validar();">
                                                                    
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
                                                    <input value="" class="form-control" onblur="this.className ='form-control campo';" type="text" id="existencia" name="existencia" placeholder="Existencia" required>  
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

        <!-- carga de scripts-->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/AsincronoProductos.js"></script>
    <!--<script type="text/javascript" src="../js/validaFormEmpresasCliente.js"></script>-->
    <script>
                   function validateInput(e){
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
</body>
</html>
 