	 <div class="container">
		<div class="jumbotron">
			<h1>Gesti&oacute;n de Carreras</h1>
			<p>En este módulo podrás gestionar toda la información referente a las carreras, creación, modificación y eliminación de carreras 
				también podrás, consultar las carreras actuales.</p>
		</div>
	 
	 
		<!-- gestion de carreras -->
		<form class="form-horizontal" method="post" action="../controller/administracion.php?accion=guardarCarrera">
			<fieldset>

		<!-- Text input codigo carrera-->
		<?php if($_SESSION["operacion"] == 'guardar' ){?>
			<div class="form-group">
			  <label class="col-md-4 control-label" for="codigoCarreraID">Código Carrera: *</label>  
			  <div class="col-md-4">
			  <input id="codigoCarreraID" name="codigoCarreraID" type="text" placeholder="Código" value="<?php echo $carrera['car_codigo'] ?>" class="form-control input-md" required="">
				
			  </div>
			</div>
		<?php }else if($_SESSION["operacion"] == 'modificar' ){ ?>  
			<input type="hidden" name="codigoCarreraID" value="<?php echo $carrera['car_codigo'] ?>"  id="codigoCarreraID" />
			<div class="form-group">
			  <label class="col-md-4 control-label" for="codigoCarreraID">Código Carrera: </label>  
			  <div class="col-md-4">
				<?php echo $carrera['car_codigo'] ?>
				
			  </div>
			</div>
		<?php } ?> 

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="nombreCarreraID">Nombre Carrera : *</label>  
		  <div class="col-md-5">
		  <input id="nombreCarreraID" name="nombreCarreraID" type="text" placeholder="Nombre Carrera" value="<?php echo $carrera['car_nombre'] ?>" class="form-control input-md" required="">
			
		  </div>
		</div>

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="numCreditosID">Número Créditos: *</label>  
		  <div class="col-md-4">
		  <input id="numCreditosID" name="numCreditosID" type="text" onkeypress="return validarNumeros(event)" placeholder="###" value="<?php echo $carrera['car_numero_creditos'] ?>" class="form-control input-md" required="">
			
		  </div>
		</div>

		<!-- Prepended text-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="valorSemestreID">Valor Semestre: *</label>
		  <div class="col-md-4">
			<div class="input-group">
			  <span class="input-group-addon">$</span>
			  <input id="valorSemestreID" name="valorSemestreID" onkeypress="return validarNumeros(event)" class="form-control" value="<?php echo $carrera['car_valor_semestre'] ?>" placeholder="#########" type="text" required="">
			</div>
			
		  </div>
		</div>

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="numSemestreID">Número Semestres: *</label>  
		  <div class="col-md-2">
		  <input id="numSemestreID" name="numSemestreID" type="text" onkeypress="return validarNumeros(event)" placeholder="##" value="<?php echo $carrera['car_numero_semestre'] ?>" class="form-control input-md" required="">
			
		  </div>
		</div>

		<!-- Button (Double) -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="guardarID"></label>
		  <div class="col-md-8">
			<?php if($_SESSION["operacion"] == 'guardar' ){?>
				<button class="btn btn-primary" type="submit" value="Guardar"><span class=" glyphicon glyphicon-floppy-saved"> </span> Guardar</button>				
			<?php }else if($_SESSION["operacion"] == 'modificar' ){ ?>  
				<button class="btn btn-primary" type="submit" value="Modificar"><span class=" glyphicon glyphicon-floppy-saved"> </span> Modificar</button>	
			<?php } ?>  
			
			<a href="../controller/administracion.php?accion=listarCarrera" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</a>
		  </div>
		</div>

		</fieldset>
	</form>
	 <!-- gestion de carreras -->

    </div> <!-- /container -->