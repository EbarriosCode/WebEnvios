<?php require_once("header.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reporte Kiwi</title>
</head>
<body>
<div class="container">   
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
                                                <td><a href="EnviosKiwiEdit_controller.php?id=<?php echo $item['id_envio']; ?>"><button class='btn btn-success' data-toggle='modal' data-target="#modl-editar" >Editar<span class="icon-pencil"></span></button></a></td>                                          

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
                                <form action="ReporteEnviosKiwi_controller.php" method="POST">                                   

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
</body>
</html>