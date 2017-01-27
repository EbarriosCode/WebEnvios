<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Web - Envios Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>

<body>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Navegación</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">Web - Envios Admin</a>
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
<?php 
        include('../../model/Conexion.php');
         $bd = new Conexion();
        $conn = $bd->Conectar();
 ?>
<!DOCTYPE HTML>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Gráfica de Pie</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="view/images/php1.jpg" type="image/x-icon"/>

    <link rel="stylesheet" type="text/css" href="../../view/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../view/css/estilos.css">
    <link rel="stylesheet" type="text/css" href="../../view/css/css-font/fontello.css">
    <link rel="stylesheet" type="text/css" href="../../view/css/jquery.littlelightbox.css" >
      <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>-->
        <script src="../../view/js/ajaxGoogle.js"></script>
 
        <script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Reporte de Envios Kiwi por Mayor'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y} ',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Vendido',
            data: [

            <?php 
                if(isset($_POST['buscar']))
                {
                    $desdePost = $_POST['desde'];
                    $hastaPost = $_POST['hasta'];

                    $date = new DateTime($desdePost);
                    $desde = $date->format('Y-m-d');
                    $date = new DateTime($hastaPost);
                    $hasta = $date->format('Y-m-d');

                    $sql = "SELECT cliente,nombreProducto,cantidad FROM envios,productos WHERE envios.producto_fk = productos.id_producto AND fecha >= '$desde' AND fecha <= '$hasta'";
                        
                }

                else{
                    $sql = "SELECT cliente,nombreProducto,cantidad FROM envios,productos WHERE envios.producto_fk = productos.id_producto";
                }    

                $stmt = $conn->prepare($sql);
                $stmt->execute();
                
                while ($fila = $stmt->fetch()) 
                {
              ?>       
                ["<?php echo $fila['nombreProducto']; ?>",  <?php echo $fila['cantidad']; ?>],

                <?php } ?>
            ]
        }]
    });
});

</script>

<br>
<div class="pull-left"><a href="#modal-busqueda" data-toggle="modal"><button class="btn btn-warning">Consulta por Rango de Fechas <span class="icon-search"></span></button></a></div>

<br><hr><h4 class="center">Detalle de Productos más vendidos</h4>
<!-- MODAL PARA BUSCAR RANGO DE FECHA-->

                <div class="modal fade" id="modal-busqueda">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                 <h2 class="text-center "><strong>Realizar una Búsqueda</strong><span class="icon-search"></span></h2>
                            </div>
                            <div class="modal-body">
                                <h3>Rango de fechas por fecha de inicio</h3><br>
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label for="">Desde:</label>
                                            <input type="date" class="form-control" id="desde" name="desde"  value="<?php echo date('Y-m-d');?>" required>    
                                        </div>
                                        <div class="form-group">
                                            <label for="">Hasta:</label>
                                            <input type="date" class="form-control" id="hasta" name="hasta" value="<?php echo date('Y-m-d');?>" required>    
                                        </div>                            
                            </div>           

                            <div class="modal-footer">
                                <input type="submit" class="btn btn-warning" id="buscar" name="buscar" value="Buscar">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            </div>
                             </form>
                        </div>                     
                    </div>
                </div>


<!--<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>-->
<script type="text/javascript" src="../../view/js/jquery.min.js"></script>
<script type="text/javascript" src="../../view/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../view/js/jquery.littlelightbox.js"></script>
<script type="text/javascript" src="../../view/Highcharts-4.1.5/js/highcharts.js"></script>
<script type="text/javascript" src="../../view/Highcharts-4.1.5/js/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>


        <hr>
      <footer>
        <p>&copy; 2017 Kiwi Deals.</p>
      </footer>    


  
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery 
    <script src="../vendor/jquery/jquery.min.js"></script> -->

    <!-- Bootstrap Core JavaScript -->

    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script> 

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Flot Charts JavaScript -->
    <script src="../vendor/flot/excanvas.min.js"></script>
    <script src="../vendor/flot/jquery.flot.js"></script>
    <script src="../vendor/flot/jquery.flot.pie.js"></script>
    <script src="../vendor/flot/jquery.flot.resize.js"></script>
    <script src="../vendor/flot/jquery.flot.time.js"></script>
    <script src="../vendor/flot-tooltip/jquery.flot.tooltip.min.js"></script>
    <script src="../data/flot-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
