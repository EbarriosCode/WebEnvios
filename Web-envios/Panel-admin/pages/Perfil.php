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
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Usuario <?php echo $_SESSION['Usuario']; ?> </a>
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
                            <a href="../controller/Usuarios_controller.php"><i class="fa fa-sitemap fa-fw"></i> Administración de Usuarios</a>
                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>

        </nav>
            <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">Perfil de Usuario</h1>
                </div>
                
                <div class="col-md-8">
                    <form action="Perfil_controller.php" method="POST">
                    <?php foreach($user as $dato): ?>
                        <div class="form-group">
                            <label for="nick">Nombre de Usuario:</label>                            
                            <input type="hidden" id="id" name="id" value="<?php echo $dato['id']; ?>">
                            <input type="text" class="form-control" value="<?php echo $dato['usuario']; ?>">
                        
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input type="password" class="form-control" value="<?php echo $dato['password']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="rol">Rol de Usuario:</label>
                            <input type="text" id="rol" name="rol" class="form-control" disabled value="<?php  if($dato['tipo']==1) echo 'Administrador'; else echo 'Usuario'; ?>">
                        </div>
                        <div class="form-group">
                            <label for="newPassnewPass">Nueva Contraseña:</label>
                            <input type="password" id="newPass" name="newPass" class="form-control">
                        </div>
                    <?php endforeach; ?>
                        <input type="submit" class="btn btn-info" value="Guardar" id="guardar" name="guardar">
                    </form>

                </div>

            </div>

                <hr>
      <footer>
        <p>&copy; 2017 Kiwi Deals.</p>
      </footer> 
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


</body>

</html>
