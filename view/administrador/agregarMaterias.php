	 <div class="container">
	 
	 <div class="jumbotron">
        <h1>Gesti&oacute;n de Materias</h1>
        <p>En este módulo podrás gestionar toda la información referente a las materias, creación, modificación y eliminación de materias 
				también podrás, consultar las materias actuales.</p>
      </div>
	 
	 
	 <!-- gestion de carreras -->
	 <form class="form-horizontal" method="post" action="../controller/administracion.php?accion=guardarMateria">
		<fieldset>

		<!-- Form Name -->
		<!-- legend>Gestionar Materias</legend -->

		<!-- Text input-->
		<?php if($_SESSION["operacion"] == 'guardar' ){?>
			<div class="form-group">
			  <label class="col-md-4 control-label" for="codigoMateriaID">Código Materia: *</label>  
			  <div class="col-md-4">
			  <input id="codigoMateriaID" name="codigoMateriaID" type="text" placeholder="Código" value="<?php echo $materia['mat_codigo'] ?>" class="form-control input-md" required="">
				
			  </div>
			</div>
		<?php }else if($_SESSION["operacion"] == 'modificar' ){ ?> 
			<input type="hidden" name="codigoMateriaID" value="<?php echo $materia['mat_codigo'] ?>"  id="codigoMateriaID" />
			<div class="form-group">
			  <label class="col-md-4 control-label" for="codigoMateriaID">Código Materia: </label>  
			  <div class="col-md-4">
				<?php echo $materia['mat_codigo'] ?>
				
			  </div>
			</div>
		<?php } ?> 

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="nombreMateriaID">Nombre Materia : *</label>  
		  <div class="col-md-5">
		  <input id="nombreMateriaID" name="nombreMateriaID" type="text" placeholder="Nombre Materia" value="<?php echo $materia['mat_nombre'] ?>" class="form-control input-md" required="">
		  </div>
		</div>

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="numCreditosID">Número Créditos: *</label>  
		  <div class="col-md-4">
		  <input id="numCreditosID" name="numCreditosID" type="text" onkeypress="return validarNumeros(event)" placeholder="###" value="<?php echo $materia['mat_numero_creditos'] ?>" class="form-control input-md" required="">
		  </div>
		</div>
		
		<!-- Text input ciclo -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="cicloID">Ciclo : *</label>  
		  <div class="col-md-5">
		  <input id="cicloID" name="cicloID" type="text" placeholder="Ciclo" onkeypress="return validarNumeros(event)" value="<?php echo $materia['mat_ciclo'] ?>" class="form-control input-md" required="">
		  </div>
		</div>
		
		<!-- Text input aula -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="aulaID">Aula : *</label>  
		  <div class="col-md-5">
		  <input id="aulaID" name="aulaID" type="text" placeholder="Aula" onkeypress="return validarNumeros(event)" value="<?php echo $materia['mat_aula'] ?>" class="form-control input-md" required="">
		  </div>
		</div>
		
		<!-- Text input descipcion -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="descipcionID">Descripción : </label>  
		  <div class="col-md-5">
		  <input id="descipcionID" name="descipcionID" type="text" placeholder="Descipcion" value="<?php echo $materia['mat_descripcion'] ?>" class="form-control input-md" >
		  </div>
		</div>
		
		<!-- Text input numero horas -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="numHorasID">Número de Horas: *</label>  
		  <div class="col-md-2">
		  <input id="numHorasID" name="numHorasID" type="text" onkeypress="return validarNumeros(event)" placeholder="####" value="<?php echo $materia['mat_horas_semanales'] ?>" class="form-control" required="">
			
		  </div>
		</div>

		<!-- Prepended text cupos disponibles-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="cuposDisponiblesID">Cupos Disponibles *</label>
		  <div class="col-md-2">
			<div class="input-group">
			  <input id="cuposDisponiblesID" name="cuposDisponiblesID" class="form-control" 
			     onkeypress="return validarNumeros(event)" value="<?php echo $materia['mat_cupos_disponibles'] ?>" placeholder="###" type="text" required="">
			</div>
			
		  </div>
		</div>
		
		<!-- Prepended text carrera -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="carreraID">Carrera *</label>
		  <div class="col-md-2">
			<div class="input-group">
				<select id="carreraID" name="carreraID" class="form-control" value="<?php echo $materia['carrera_car_codigo'] ?>" required="">
					<option value="">-- Seleccione una opci&oacute;n --</option>
					<?php while($data = mysql_fetch_assoc($listaCarreraSelec)){ ?>
						<option value="<?php echo $data['car_codigo'] ?>" <?php if($data['car_codigo'] == $materia['carrera_car_codigo']){ echo "selected";}else{echo "";}?> ><?php echo $data['car_nombre'] ?></option>
					<?php } ?>
				</select>
			</div>
			
		  </div>
		</div>
		
		<!-- Prepended text docente -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="docenteID">Docente *</label>
		  <div class="col-md-2">
			<div class="input-group">
				<select id="docenteID" name="docenteID" class="form-control" value="<?php echo $materia['docente_doc_codigo'] ?>" required="">
					<option value="">-- Seleccione una opci&oacute;n --</option>
					<?php while($data = mysql_fetch_assoc($listaDocenteSelec)){ ?>
						<option value="<?php echo $data['doc_codigo'] ?>" <?php if($data['doc_codigo'] == $materia['docente_doc_codigo']){ echo "selected";}else{echo "";}?> ><?php echo $data['per_nombre_compl'] ?></option>
					<?php } ?>
				</select>
			</div>
			
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
			
			<a href="../controller/administracion.php?accion=listarMaterias" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</a>
		  </div>
		</div>

		</fieldset>
	</form>
	 <!-- gestion de carreras -->

    </div> <!-- /container -->