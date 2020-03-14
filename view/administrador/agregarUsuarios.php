<script>

function recargar(){

	document.forms[1].action = "../controller/administracion.php?accion=recargarUsuario";
	document.forms[1].submit();
}
</script>

<div class="container">
	 <div class="jumbotron">
        <h1>Gesti&oacute;n de Usuarios</h1>
        <p>En este módulo podrás gestionar toda la información referente a los usuarios, creación, modificación y eliminación de usuarios 
				también podrás, consultar los usuarios actuales.</p>
      </div>
	 
	 
	 <!-- gestion de Usuarios -->
	 <form class="form-horizontal" id="idForma" method="post" action="../controller/administracion.php?accion=guardarUsuario">
		<fieldset>
		
		<input type="hidden" name="estudianteID" value="<?php echo $usuario['est_codigo'] ?>"  id="estudianteID" />
		<input type="hidden" name="docenteID" value="<?php echo $usuario['doc_codigo'] ?>"  id="docenteID" />
		
		<!-- Text input tipo usuario -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="tipoUsuarioID">Tipo Usuario:</label>
		  <div class="col-md-4">
			<select id="tipoUsuarioID" name="tipoUsuarioID" class="form-control" onchange="recargar()">
			  <?php while($data = mysql_fetch_assoc($listaRolFiltro)){ ?>
				<option value="<?php echo $data['rol_codigo'] ?>" <?php if($data['rol_codigo'] == $usuario['rol_codigo']){ echo "selected";}else{echo "";}?> ><?php echo $data['rol_nombre'] ?></option>
			  <?php } ?>
			</select>
		  </div>
		</div>
		
		<!-- Text input cedula -->
		<?php if($_SESSION["operacion"] == 'guardar' ){ ?>
			<div class="form-group">
			  <label class="col-md-4 control-label" for="cedulaID">Cedula: *</label>  
			  <div class="col-md-4">
			  <input id="cedulaID" name="cedulaID" type="text" placeholder="Cedula" value="<?php echo $usuario['per_codigo'] ?>" class="form-control input-md" required="">
				
			  </div>
			</div>
		<?php }else if($_SESSION["operacion"] == 'modificar' ){ ?>  
			<input type="hidden" name="cedulaID" value="<?php echo $usuario['per_codigo'] ?>"  id="cedulaID" />
			<div class="form-group">
			  <label class="col-md-4 control-label" for="cedulaID">Cedula: </label>  
			  <div class="col-md-4">
				<?php echo $usuario['per_codigo'] ?>
			  </div>
			</div>
		<?php } ?> 

		<!-- Text input nombre completo -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="nombreCompletoID">Nombre Completo : *</label>  
		  <div class="col-md-5">
		  <input id="nombreCompletoID" name="nombreCompletoID" type="text" value="<?php echo $usuario['per_nombre_compl'] ?>" placeholder="Nombre Completo" class="form-control input-md" required="">
		  </div>
		</div>

		<!-- Text input fecha nacimiento -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="fechaNacimientoID">Fecha Nacimiento : *</label>  
		  <div class="col-md-5">
		  
		  <div class='input-group date' id='datetimepicker8' >
			<input type='text' class="form-control" id="fechaNacimientoID" name="fechaNacimientoID"  placeholder="YYYY/MM/DD" value="<?php echo $usuario['per_fecha_nacimiento'] ?>" />
			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar">
			</span>
			</span>
		   </div>

		  <!-- input id="nombreCompletoID" name="nombreCompletoID" type="text" placeholder="Nombre Completo" class="form-control input-md" required="" -->
		  </div>
		</div>

		<!-- Text input email -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="usuarioID">Usuario: *</label>
		  <div class="col-md-4">
			<div class="input-group">
			  <input id="usuarioID" name="usuarioID" class="form-control"value="<?php echo $usuario['per_usuario'] ?>" placeholder="Usuario" type="text" required="">
			  <span class="input-group-addon">@uJarrison.edu.co</span>
			</div>
		</div>	
		</div>	
		
		<!-- Text input contraseña  -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="passID">Contrase&ntilde;a : *</label>  
		  <div class="col-md-5">
		  <input id="passID" name="passID" type="password" placeholder="Contrase&ntilde;a" value="<?php echo $usuario['per_password'] ?>" class="form-control input-md" required="">
		  </div>
		</div>
		
		<!-- valores solo para docentes -->
		
		
			<!-- valores para docentes -->
			<!-- Text input oficina -->
			<div class="form-group" style="display:<?php if($usuario['rol_codigo']  == '2' ){ echo ""; }else{echo "none;";} ?>">
			  <label class="col-md-4 control-label" for="oficinaID">Oficina: *</label>  
			  <div class="col-md-4">
			  <input id="oficinaID" name="oficinaID" type="text" placeholder="Oficina" onkeypress="return validarNumeros(event)" value="<?php echo $usuario['doc_oficina'] ?>" 
					class="form-control input-md" <?php if($usuario['rol_codigo']  == '2' ){ echo "required"; }else{echo "";} ?>>
				
			  </div>
			</div>
			
			<!-- Text input categoria -->
			<div class="form-group" style="display:<?php if($usuario['rol_codigo']  == '2' ){ echo ""; }else{echo "none;";} ?>">
			  <label class="col-md-4 control-label" for="categoriaID">Categoria: *</label>  
			  <div class="col-md-4">
			  <input id="categoriaID" name="categoriaID" type="text" placeholder="Categoria" value="<?php echo $usuario['doc_categoria'] ?>" 
					class="form-control input-md" <?php if($usuario['rol_codigo']  == '2' ){ echo "required"; }else{echo "";} ?>>
				
			  </div>
			</div>
			
			<!-- Text input telefono -->
			<div class="form-group" style="display:<?php if($usuario['rol_codigo']  == '2' ){ echo ""; }else{echo "none;";} ?>">
			  <label class="col-md-4 control-label" for="telefonoID">Teléfono: *</label>  
			  <div class="col-md-4">
			  <input id="telefonoID" name="telefonoID" type="text" placeholder="Teléfono" onkeypress="return validarNumeros(event)" 
					value="<?php echo $usuario['doc_telefono'] ?>" class="form-control input-md" <?php if($usuario['rol_codigo']  == '2' ){ echo "required"; }else{echo "";} ?>>
				
			  </div>
			</div>
			<!-- fin valores docente -->

		
			<!-- valores estudiante -->
			<!-- Text input apodo -->
			<div class="form-group" style="display:<?php if($usuario['rol_codigo']  == '3' ){ echo ""; }else{echo "none;";} ?>">
			  <label class="col-md-4 control-label" for="apodoID">Apodo: *</label>  
			  <div class="col-md-4">
			  <input id="apodoID" name="apodoID" type="text" placeholder="Apodo" value="<?php echo $usuario['est_apodo'] ?>" 
					class="form-control input-md" <?php if($usuario['rol_codigo']  == '3' ){ echo "required"; }else{echo "";} ?>>
				
			  </div>
			</div>
			
			<!-- Text input carrera estudiante -->
			<div class="form-group" style="display:<?php if($usuario['rol_codigo']  == '3' ){ echo ""; }else{echo "none;";} ?>">
			  <label class="col-md-4 control-label" for="carreraID">Carrera: *</label>  
			  <div class="col-md-4">
				<select id="carreraID" name="carreraID" class="form-control"  <?php if($usuario['rol_codigo']  == '3' ){ echo "required"; }else{echo "";} ?>>
					
					<?php while($data = mysql_fetch_assoc($listaCarreraFiltro)){ ?>
						<option value="<?php echo $data['car_codigo'] ?>" <?php if($data['car_codigo'] == $usuario['car_codigo']){ echo "selected";}else{echo "";}?> ><?php echo $data['car_nombre'] ?></option>
						
					<?php } ?>
				</select>
				
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
			
			<a href="../controller/administracion.php?accion=listarUsuarios" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</a>
		  </div>
		</div>

		</fieldset>
	</form>
	 <!-- gestion de carreras -->

</div> <!-- /container -->
