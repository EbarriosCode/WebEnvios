<?php 
    require_once("header.php");
?> 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos Kiwi</title>
</head>
<body>
    <div class="container">
        <div class="tab-content">
            <div class="tab-pane active" id="tab_consultar">
                <div class="row form-horizontal">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h2>Productos Registrados Glosh</h2></div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-xs-4 text-right">
                                    <label for="buscar" class="control-label">Buscar:</label>

                                </div>
                                
                                <div class="col-xs-4 text-rigt">
                                    <form action="ProductosGlosh_controller.php" method="POST"><input  type="text" name="buscar" id="buscar" class="form-control" placeholder="Ingrese cualquier dato referente al producto" onkeypress="return validateInput(event)" onpaste="return false"/>
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
                                            <tr <?php if($item['existencia'] <= 5) echo "class=danger"; ?>>
                                                <td><?php echo $item['id_producto']; ?></td>
                                                <td><?php echo $item['nombreProducto']; ?></td>
                                                <td><?php echo $item['precio']; ?></td>
                                                <td><?php echo $item['descripcion']; ?></td>
                                                <td>
                                                    <?php echo $item['existencia']; ?>
                                                    <?php 
                                                        if($item['existencia'] <= 5 && $item['existencia'] >= 1 )
                                                            echo "<strong> Pronto a Terminarse</strong>";
                                                        if ($item['existencia'] == 0)
                                                            echo "<strong> Agotado! :(</strong>";
                                                     ?> 
                                                </td>                                          
                                                <td><button class='btn btn-success' data-toggle='modal' data-target='#modal-editar' onclick="CargarDatos('<?php echo $item['id_producto'];?>','<?php echo $item['nombreProducto']; ?>','<?php echo $item['precio'];?>','<?php echo $item['descripcion'];?>','<?php echo $item['existencia'];?>');">Editar <span class="icon-pencil"></span></button></td>
                                                <td><button class="btn btn-danger" onclick="confirmarRegistro('<?php echo $item['id_producto'];?>');" <?php if($_SESSION['tipo']!=1) echo "disabled"; ?>>Borrar <span class="icon-trash"></span></button> </td>
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
            <p>&copy; 2017 Kiwi Deals.</p>
        </footer> 
 
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
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="nombre">Nombre Producto:</label>
                                        <input  type="hidden" id="idProducto" name="idProducto"/>
                                        <input type="text" id="nombre" name="nombre" class="form-control" onkeypress="return validateInput(event)" onpaste="return false">
                                    </div>

                                    <div class="form-group">
                                        <label for="descripcion">Precio:</label>
                                        <input type="number" id="precio" name="precio" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false">
                                    </div>

                                    <div class="form-group">
                                        <label for="direccion">Descripción:</label>
                                        <input type="text" id="descripcion" name="descripcion" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false">
                                    </div>

                                    <div class="form-group">
                                        <label for="responsable">Existencia:</label>
                                        <input type="number" id="existencia" name="existencia" class="form-control" onkeypress="return validateInput(event)" <?php if($_SESSION['tipo']!=1) echo "disabled"; ?> onpaste="return false" >
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
                                                    <input  class="form-control" onblur="this.className ='form-control campo';" type="text" id="nombre" name="nombre" placeholder="Nombre del Producto" required autofocus onkeypress="return validateInput(event)" onpaste="return false">
                                                    <span></span>
                                            </div>

                                            <div class="form-group">
                                                    <label for="precio" class="sr-only">Precio:</label>
                                                    <input class="form-control" onblur="this.className ='form-control campo';" type="number" id="precio" name="precio" placeholder="Precio" required onkeypress="return validateInput(event)" onpaste="return false">
                                                    <span></span>
                                            </div>
                                            
                                            <div class="form-group">
                                                    <label for="direccion" class="sr-only">Descripción</label>
                                                    <input value="" class="form-control" onblur="this.className ='form-control campo';" type="text" id="descripcion" name="descripcion" placeholder="Descripción" required onkeypress="return validateInput(event)" onpaste="return false">   
                                                    <span></span>
                                            </div>
                                            
                                            <div class="form-group">
                                                    <label for="responsable" class="sr-only">Existencia:</label>
                                                    <input type="number" class="form-control" onblur="this.className ='form-control campo';" id="existencia" name="existencia" placeholder="Existencia" required onkeypress="return validateInput(event)" onpaste="return false">  
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
                 window.location = "ProductosGlosh_controller.php?idProducto="+id+"&accion=borrar";
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
</body>
</html>