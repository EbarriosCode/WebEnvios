<?php require_once("header.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edición Envios Kiwi</title>
</head>
<body>
    <div class="container">
        <!--  FORMULARIO PARA EDITAR -->
        <br>    
        <h2 class="text-center">Edición de Registro de Envios <span class="icon-pencil"></span></h2><hr>    
        <div class="row">
            <form action="EnviosKiwiEdit_controller.php" method="POST">
            <?php foreach($envios as $item){ ?>
                <div class="form-group col-md-6">               
                    <input type="hidden" id="id" name="id" value="<?php echo $item['id_envio']; ?>">
                    <label for="nombre">Nombre del Cliente:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $item['cliente']; ?>" onkeypress="return validateInput(event)" onpaste="return false">
                </div>
                <div class="form-group col-md-6">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" id="telefono" name="telefono" class="form-control" value="<?php echo $item['telefono']; ?>" onkeypress="return validateInput(event)" onpaste="return false">
                </div>
                <div class="form-group col-md-6">
                    <label for="numeroGuia">Número de Guía</label>
                    <input type="text" id="numeroGuia" name="numeroGuia" class="form-control" value="<?php echo $item['numeroGuia']; ?>" onkeypress="return validateInput(event)" onpaste="return false">
                </div>

                <div class="form-group col-md-6">
                    <label for="departamento">Departamento:</label>
                    <select name="departamento" id="departamento" class="form-control">
                        <?php 
                            foreach ($departamentos as $deptos) {
                                echo "<option value='$deptos[id_departamento]'";
                                    if($deptos['id_departamento']==$item['departamento_fk']){
                                        echo "selected";
                                    }
                                echo ">".$deptos['nombreDepartamento']."</option>";
                            }
                         ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="producto">Producto:</label>
                    <select name="producto" id="producto" class="form-control">
                        <?php 
                            foreach ($productos as $prod) {
                                echo "<option value='$prod[id_producto]'";
                                    if($prod['id_producto']==$item['producto_fk']){
                                        echo "selected";
                                    }
                                echo ">".$prod['nombreProducto']."</option>";
                            }
                         ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="cantidad">Cantidad:</label>
                    <input type="number" id="cantidad" name="cantidad" class="form-control" value="<?php echo $item['cantidad']; ?>" onkeypress="return validateInput(event)" onpaste="return false">
                </div>
                <div class="form-group col-md-6">
                    <label for="precio">Precio:</label>
                    <input type="number" id="precio" name="precio" class="form-control" value="<?php echo $item['precio_envio']; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="fecha">Fecha:</label>
                    <input type="date" id="fecha" name="fecha" class="form-control" value="<?php echo $item['fecha']; ?>">
                </div>
                 <div class="form-group col-md-12">
                    <label for="status">Estado:</label><br>                   
                    <label class="radio-inline">
                   
                      <input type="radio" name="status" id="Radio1" value="1" <?php if($item['estado_entrega']==1){echo "checked";} ?>> Entregado
                   
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="status" id="Radio2" value="0" <?php if($item['estado_entrega']==0){echo "checked";} ?>> Pendiente
                      
                    </label>

                    <label class="radio-inline">
                      <input type="radio" name="status" id="Radio3" value="2" <?php if($item['estado_entrega']==2){echo "checked";} ?>> Devolución
                      
                    </label>
                </div>
                <!--Validación de no permitir editar si el envío ya esta entregado y pagado pagado por Cargo Expreso-->
                <?php  
                    $dis;

                    if($item['estado_entrega'] == 1 && $item['pago_cargo'] == 1)
                        $dis = "disabled";
                    else
                        $dis = null;
                ?>
                <div class="form-group col-md-12 text-center">
                    <button type="submit" class="btn btn-info" id="actualizar" name="actualizar" <?php echo $dis; ?>>Actualizar <span class="icon-ok"></span></button>
                    <a href="EnviosKiwi_controller.php" class="btn btn-warning">Cancelar y Regresar<span class="icon-reply-all"></span></a>
                </div>   
            </form>
            <?php } ?>
        </div>
        
        <?php if($dis != null){ ?>
        <div id="alerta-roja" class="elemento">
            <div id="alerta" class="alert alert-danger text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Imposible Editar:</strong> Este Envío es imposible de editar por razones de seguridad e integridad de la información.
            </div>
        </div>
        <?php }  ?>
        <hr>
        <footer>
            <p>&copy; 2017 Kiwi Deals.</p>
        </footer> 

    </div>

    <script>
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
