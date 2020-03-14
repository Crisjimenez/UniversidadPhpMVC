<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">  	
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Educativa">
    <meta name="author" content="Jarrison">
    <link rel="icon" href="../../favicon.ico">

    <title>Universidad Jarrison</title>
	
    <!-- Bootstrap core CSS -->
    <link href="../view/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../view/css/sticky-footer-navbar.css" rel="stylesheet">
    <script src="../view/js/ie-emulation-modes-warning.js"></script>
	<script src="../view/js/validacionCampos.js"></script> 

  </head>
  
  <script>
  $(document).ready(function(){
    //Handles menu drop down
    $('.dropdown-menu').find('form').click(function (e) {
        e.stopPropagation();
    });
});
  </script>
  <style>
	body { margin-top:30px; }
	#login-nav input { margin-bottom: 15px; }
  </style>

  <body>
  
  <?php session_start(); ?>
  
	<!-- Fixed navbar -->
	<form method="post" action="controller/administracion.php?accion=registrar">
	    <nav class="navbar navbar-inverse navbar-fixed-top" >
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-col-md-4="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
			<a  class="navbar-brand" href="../controller/administracion.php?accion=inicio">Universidad Jarrison</a>
		  </div>
		  <div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
			  <li ><a href="../controller/administracion.php?accion=inicio"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
			  <!-- Permisos de Administrador --> 
			  <?php if($_SESSION["rol"] == '1' ){?>
				<li><a href="../controller/administracion.php?accion=listarCarrera"><span class="glyphicon glyphicon-th-list"></span> Gesti&oacute;n de Carreras</a></li>
				<li><a href="../controller/administracion.php?accion=listarMaterias"><span class="glyphicon glyphicon-book"></span> Gesti&oacute;n de Materias</a></li> 
				<li><a href="../controller/administracion.php?accion=listarUsuarios"><span class="glyphicon glyphicon-user"></span> Gesti&oacute;n de Usuarios</a></li>
				
			<!-- Permisos de Docentes -->
			<?php }else if($_SESSION["rol"] == '2' ){ ?>  
				<li><a href="../controller/docente.php?accion=cursos"><span class="glyphicon glyphicon-align-justify"></span> Ver mis Cursos</a></li> 
				<li><a href="../controller/docente.php?accion=estudiantes"><span class="glyphicon glyphicon-education"></span> Estudiantes</a></li>
			  
			<!-- Permisos de Estudiantes -->
			<?php }else if($_SESSION["rol"] == '3' ){ ?>  
				<li><a href="../controller/estudiante.php?accion=materia"><span class="glyphicon glyphicon-duplicate"></span> Materias</a></li>
			
			<?php } ?>  
			
			  <ul class="nav navbar-nav navbar-right">
                <li class="dropdown" >
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-sunglasses"></span> 
                        <strong><?php echo $_SESSION["sessionUser"] ?></strong>
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                    <ul class="dropdown-menu" style="background-color:#222;">
                        <li>
                            <div class="navbar-login"  >
                                <div class="row" >
                                    <div class="col-lg-4">
                                        <f class="text-center">
                                            <span class="glyphicon glyphicon-user icon-size"></span>
                                        </f>
                                    </div>
                                    <div class="col-lg-8">
                                        <f class="text-left"><strong><?php echo $_SESSION["sessionNom"] ?></strong></f>
                                        <f class="text-left small"><?php echo $_SESSION["sessionEmail"] ?></f>
										<br></br>
                                        <f class="text-left">
                                            <a href="#" class="btn btn-primary btn-block btn-sm">Actualizar Datos</a>
                                        </f>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="navbar-login navbar-login-session">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>
                                            <a href="../index.php" class="btn btn-danger btn-block">Cerrar Sessi&oacute;n</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
			</ul>
		  </div><!--/.nav-collapse -->
		</div><!--/.container-fluid -->
	  </nav>
	  </form>
	<!-- Fin menu navbar -->
