<script>

var variables = "";
var docente = "";
var estudiante = "";
var rol = "";

function deleteC(varisa,doc, est, r){
	variables = varisa;
	docente = doc;
	estudiante = est;
	rol = r;
}

function eliminar(){
	document.forms[2].action = "../controller/administracion.php?accion=eliminarUsuario&codigoEliminarID="+variables+"&codigoDocenteID="+docente+"&codigoEstudianteID="+estudiante+"&codigoRolID="+rol;
	document.forms[2].submit();
}

function abrirAsociar(){
	
}

</script>

<div class="container">
	 
	<div class="jumbotron">
		<h1>Gesti&oacute;n de Usuarios</h1>
		<p>En este módulo podrás gestionar toda la información referente a los usuarios, creación, modificación y eliminación de usuarios 
				también podrás, consultar los usuarios actuales.</p>
	</div>
	 
	<!-- filtros -->
	<form class="form-horizontal" method="post" action="../controller/administracion.php?accion=consultarUsuario">
		<fieldset>
			<div class="col-md-9 col-md-offset-2">
				<!-- Form Name -->
				<legend>Consulta</legend>
				
				<!-- Text input tipo usuario -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="tipoUsuarioID">Tipo Usuario:</label>
				  <div class="col-md-4">
					<select id="tipoUsuarioID" name="tipoUsuarioID" class="form-control">
					  <option value="">-- Seleccione una opción --</option>
					  <?php while($data = mysql_fetch_assoc($listaRolFiltro)){ ?>
						<option value="<?php echo $data['rol_codigo'] ?>" <?php if($data['rol_codigo'] == $filtrosUsuario['tipoUsuario']){ echo "selected";}else{echo "";}?> ><?php echo $data['rol_nombre'] ?></option>
					  <?php } ?>
					</select>
				  </div>
				</div>
				
				<!-- usuarios -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="usuariosID">Nombre: </label>
				  <div class="col-md-5">
					<input id="usuariosID" name="usuariosID" type="text" value="<?php echo $filtrosUsuario['usuarios'] ?>" placeholder="Usuario" class="form-control input-md">

				  </div>
				</div>

				<!-- Text input cedula -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="cedulaID">Cedula:</label>  
				  <div class="col-md-4">
				  <input id="cedulaID" name="cedulaID" type="text" value="<?php echo $filtrosUsuario['cedula'] ?>" placeholder="Cedula" class="form-control input-md">
					
				  </div>
				</div>
				
				<!-- Prepended text usuario -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="usuarioID">Usuario:</label>
				  <div class="col-md-4">
						<div class="input-group">
						  <input id="usuarioID" name="usuarioID" class="form-control" value="<?php echo $filtrosUsuario['usuario'] ?>" 
						     placeholder="Usuario" type="text" >
						  <span class="input-group-addon">@uJarrison.edu.co</span>
						</div>
					</div>	
				</div>
				

				<!-- Button -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="consultarID"></label>
				  <div class="col-md-4">
				    <br>
					<button class="btn btn-primary" type="submit" value="Consultar"><span class=" glyphicon glyphicon-search"> </span> Consultar</button>
				  </div>
				</div>
			</div>
		</fieldset>
	</form>
	<br></br>
	
	<!-- fin filtros -->

		
		
     <!-- tabla de lista de carreras -->
	  
	<div align="right">
	    <a>
			<a href="../controller/administracion.php?accion=agregarUsuario" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span> Agregar</a>
		</a>
	</div>
	<legend>Listado de Usuarios </legend>
			 
			 
	<div class="span7">   
		<div class="widget stacked widget-table action-table">
					
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th class="td-actions">Modificar</th>
							<th class="td-actions">Asociar Materia</th>
							<th class="td-actions">Eliminar</th>
							<th>Rol</th>
							<th>Cedula</th>
							<th>Nombre Completo</th>
							<th>Fecha Nacimiento</th>
							<th>Usuario</th>
							<th>Oficina</th>
							<th>Categoría</th>
							<th>Teléfono</th>
							<th>Apodo</th>
						</tr>
					</thead>
					<tbody>
						<?php while($data = mysql_fetch_assoc($listaUsuario)){ ?>
							<tr>
							
								<td class="td-actions">
									<p data-placement="top" data-toggle="tooltip" title="Modificar">
										<a class="btn btn-primary btn-xs" data-title="Modificar" href="../controller/administracion.php?accion=editarUsuario&id=<?php echo $data['per_codigo'] ?>" >
									 <span class="glyphicon glyphicon-pencil"></span></a></p>
								</td>
								<td>
								<!-- si es estudiante anexo opcion asociar materias -->
								<?php if($data['rol_codigo'] == '3' ){ ?>  
									<p data-placement="top" data-toggle="tooltip" title="Asociar Materias">
										<a class="btn btn-primary btn-xs" onclick="javascript:abrirAsociar('<?php echo $data['per_codigo'] ?>')" data-title="Asociar Materias" data-toggle="modal" data-target="#edit" >
									<span class="glyphicon glyphicon-plus"></span></a></p>
								<?php }else { ?> 
									&nbsp;
								<?php } ?> 
								</td>
								<td class="td-actions">								
									<p data-placement="top" data-toggle="tooltip" title="Delete">
										<a class="btn btn-danger btn-xs" onclick="javascript:deleteC('<?php echo $data['per_codigo'] ?>', '<?php echo $data['doc_codigo'] ?>', '<?php echo $data['est_codigo'] ?>', '<?php echo $data['rol_codigo'] ?>')" data-title="Eliminar" data-toggle="modal" data-target="#delete" >
									 <span class="glyphicon glyphicon-trash"></span></a></p>
								</td>
								<td><?php echo $data['rol_nombre'] ?></td>
								<td><?php echo $data['per_codigo'] ?></td>
								<td><?php echo $data['per_nombre_compl'] ?></td>
								<td><?php echo $data['per_fecha_nacimiento'] ?></td>
								<td><?php echo $data['per_usuario'] ?></td>
								<td><?php echo $data['doc_oficina'] ?></td>
								<td><?php echo $data['doc_categoria'] ?></td>
								<td><?php echo $data['doc_telefono'] ?></td>
								<td><?php echo $data['est_apodo'] ?></td>
							</tr>
							<?php } ?>

					</tbody>
				</table>
			</div>
			<div class="clearfix"></div>
						
		</div>		

	
	</div> <!-- /widget-content -->
					
</div> <!-- container -->


<form class="form-horizontal" method="post" action="../controller/administracion.php?accion=eliminarUsuario">
<!-- Dialogos para update y delete  ---------------------------------------------------------------------------------------------------------->	
	
<!--   modal para anexo de materias -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
				<h4 class="modal-title custom_align" id="Heading">Asociar Materias</h4>
			</div>
			<div class="modal-body">
			  
				<!-- usuario -->
				<div class="form-group">
					<label  for="materiaID">Estudiante:</label>
					Carlos Maria Rendon 
				</div>
			 
				<!-- materia a asociar -->
				<div class="form-group">
					<label  for="materiaID">Materia:</label>
					<select id="materiaID" name="materiaID" class="form-control">
					  <option value="0">-- Seleccione una opción --</option>
					  <option value="1">Fisica I</option>
					  <option value="2">Gerencia de proyectos</option>
					  <option value="3">Calculo I</option>
					</select>
					
					<select id="materiaAsocID" name="materiaAsocID" class="form-control" value="<?php echo $materia['docente_doc_codigo'] ?>" required="">
						<option value="">-- Seleccione una opci&oacute;n --</option>
						<?php while($data = mysql_fetch_assoc($listaDocenteSelec)){ ?>
							<option value="<?php echo $data['doc_codigo'] ?>" <?php if($data['doc_codigo'] == $materia['docente_doc_codigo']){ echo "selected";}else{echo "";}?> ><?php echo $data['per_nombre_compl'] ?></option>
						<?php } ?>
					</select>
					
					
				</div>
				
			</div>
				<div class="modal-footer ">
				<button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span>Asociar</button>
			</div>
		</div>
    
	</div> <!-- fin modal-content -->     
</div> <!-- fin modal-dialog --> 
<!--  fin modal para anexo de materias-->
    
<!-- modal para eliminacion -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
				<h4 class="modal-title custom_align" id="Heading">Eliminar Registro</h4>
			</div>
			<div class="modal-body">
		   
				<div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Esta seguro que desea eliminar el registro seleccionado?</div>
		   
			</div>
			<div class="modal-footer ">
				<a onclick="eliminar()" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span>S&iacute;</a>
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
			</div>
		</div>
    
	</div> <!-- fin modal-content --> 
</div> <!-- fin modal-dialog --> 
<!-- fin modal para eliminacion -->
<!-- fin modal para eliminacion y update ------------------------------------------------------------------------------------------ -->
</form>
