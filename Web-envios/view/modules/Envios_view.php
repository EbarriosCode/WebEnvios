<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Control de Envios</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
    <link rel="stylesheet" type="text/css" href="../css/css-font/fontello.css"> 
    <link rel="stylesheet" type="text/css" href="../css/validarForm.css">
	
</head>
      <?php 
   /*     if($_SESSION['tipo'] == 'admin')
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
      <?php }*/ ?>
      <?php 
          if(isset($_GET['boolean']))
          {
            echo "<style>.elemento{display:inline;}</style>";
          }
       ?>

<body onload="lista_Envios('','1');">

    <div class="container">

         <div class="row form-horizontal">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_consultar" data-toggle="tab">Consulta</a></li>
              <li><a href="#tab_registrar" data-toggle="tab">Consulta Tipo B</a></li>
              
            </ul>
        </div>

        </br>


        <div class="tab-content">
            <div class="tab-pane active" id="tab_consultar">
                <div class="row form-horizontal">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h4>Envíos Realizados</h4></div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-xs-4  text-right">
                                    <label for="buscar" class="control-label">Buscar:</label>

                                </div>
                                
                                <div class="col-xs-4">
                                    <input  type="text" name="buscar" id="buscar" class="form-control" onkeyup="lista_Envios('this.value','1');" placeholder="Ingrese cualquier dato referente al envío" onkeypress="return validateInput(event)"  onpaste="return false"/>
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
        
            <div class="tab-pane" id="tab_registrar">
                <p>Presione click para Realizar la Consulta B</p><a href="../../controller/Consulta2Empresas_cliente_controlador.php" class="btn btn-info"><h4>Consulta Opción B <span class="icon-tripadvisor"></span></h4></a>
                     <hr>

      <footer>
        <p>&copy; 2016 Ingeniería en Sistemas, UMG.</p>
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
                                 <h2 class="text-center "><strong>Editar Empresa Cliente</strong></h2>
                            </div>
                             
                            <div class="modal-body">
                                <form id="formEmpresasCliente" action="../../controller/EmpresaClienteCRUD_controlador.php" method="POST">
                                    <div class="form-group">
                                        <label for="nombre">Nombre:</label>
                                        <input  type="hidden" id="idEmpresa" name="idEmpresa"/>
                                        <input type="text" id="nombre" name="nombre" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false">
                                    </div>

                                    <div class="form-group">
                                        <label for="descripcion">Descripcion:</label>
                                        <input type="text" id="descripcion" name="descripcion" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false">
                                    </div>

                                    <div class="form-group">
                                        <label for="direccion">Dirección:</label>
                                        <input type="text" id="direccion" name="direccion" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false">
                                    </div>

                                    <div class="form-group">
                                        <label for="responsable">Responsable:</label>
                                        <input type="text" id="responsable" name="responsable" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false">
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
											<h2 class="text-center "><strong>Agregar Nueva Empresa Cliente</strong></h2>
										</div>
										
										<!-- Contenido de la ventana -->
										<div class="modal-body">
											
											<form class="form-signi" action="../../controller/EmpresaClienteCRUD_controlador.php" method="POST" onSubmit="return validar();">
																	
											<div class="form-group">											
													<label for="nombre" class="sr-only">Nombre:</label>
													<input  class="form-control" onblur="this.className ='form-control campo';" type="text" id="nombre" name="nombre" placeholder="Nombre de Empresa Cliente" required autofocus>
                                                    <span></span>
											</div>

											<div class="form-group">
													<label for="descripcion" class="sr-only">Descripción:</label>
													<input value="" class="form-control" onblur="this.className ='form-control campo';" type="text" id="descripcion" name="descripcion" placeholder="Descripción Empresa Cliente" required>
                                                    <span></span>
											</div>
											
											<div class="form-group">
													<label for="direccion" class="sr-only">Dirección:</label>
													<input value="" class="form-control" onblur="this.className ='form-control campo';" type="text" id="direccion" name="direccion" placeholder="Dirección Empresa Cliente" required>	
                                                    <span></span>
											</div>
                                            
                                            <div class="form-group">
                                                    <label for="responsable" class="sr-only">Responsable:</label>
                                                    <input value="" class="form-control" onblur="this.className ='form-control campo';" type="text" id="responsable" name="responsable" placeholder="Responsable Empresa Cliente" required>  
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
    <script type="text/javascript" src="../js/bootstrap-modal.js"></script>
    <script src="../js/AsincronoEnvios.js"></script>
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
 