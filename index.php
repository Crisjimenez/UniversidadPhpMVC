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
    <link href="view/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="view/css/sticky-footer-navbar.css" rel="stylesheet">
	<link href="view/css/theme.css" rel="stylesheet">
	<link href="view/css/bootstrap-theme.min.css" rel="stylesheet">
    <script src="view/js/ie-emulation-modes-warning.js"></script>

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

	<!-- Fixed navbar -->
	    <nav class="navbar navbar-inverse navbar-fixed-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
			<a class="navbar-brand" href="index.html">Universidad Jarrison</a>
		  </div>
		  <div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
			  <li class="active"><a href="index.html"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			   <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">Iniciar Sessi&oacute;n<b class="caret"></b></a>
                     <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;background-color:#222;">
                        <li>
                           <div class="row">
                              <div class="col-md-12">
                                 <form method="post" action="controller/login.php?accion=registrar">
                                    <div class="form-group">
                                       <label class="sr-only" for="exampleInputEmail2">Correo Electronico</label>
                                       <input type="email" class="form-control" name="correo" id="correo" placeholder="Correo Electronico" required>
                                    </div>
                                    <div class="form-group">
                                       <label class="sr-only" for="exampleInputPassword2">Contraseña</label>
                                       <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="Contraseña" required>
                                    </div>
                                    <div class="checkbox">
                                       <label>
                                       <input type="checkbox"> <f>Recordar</f>
                                       </label>
                                    </div>
                                    <div class="form-group">
										<input class="btn btn-success btn-block" type="submit" value="Iniciar Sessi&oacute;n"/>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </li>
                        <li class="divider"></li>
                     </ul>
                  </li>
               </ul>
			   
			   
			</ul>
		  </div><!--/.nav-collapse -->
		</div><!--/.container-fluid -->
	  </nav>
	<!-- Fin menu navbar -->

	 <div class="container">
	 
		 <div class="jumbotron">
			<h1>Proyecto Jarrison</h1>
			<p>Bienvenidos al proyecto, El proyecto simula una página web de una universidad la cual ha sido nombrada
			JarrisonUniversidad, espero les agrade. Gracias</p>
		</div>
		
		<!-- coursel de imagenes de U -->
		<div class="page-header">
        <h1>Nuestras Instalaciones</h1>
      </div>
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="view/images/img1.jpg" alt="imagen 1">
          </div>
          <div class="item">
            <img src="view/images/img2.jpg" alt="imagen 2">
          </div>
          <div class="item">
            <img src="view/images/img3.png" alt="imagen 3">
          </div>
        </div>
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
		<!--  fin coursel imagenes -->
		
    </div> <!-- /container -->
	
    <footer class="footer">
      <div class="container">
        <p class="text-muted">Jarrison Andrey Garcia Paniagua. Ing Sistemas. Poligran</p>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="view/js/bootstrap.min.js"></script>
    <script src="view/js/docs.min.js"></script>
    <script src="view/js/ie10-viewport-bug-workaround.js"></script>
	
  </body>
</html>
