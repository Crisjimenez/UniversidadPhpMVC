<script>

var variables = "";

function deleteC(varisa){
	variables = varisa;
}

function eliminar(){
	document.forms[2].action = "../controller/administracion.php?accion=eliminarCarrera&codigoEliminarID="+variables;
	document.forms[2].submit();
}

</script>



<div class="container">
	<div class="jumbotron">
		<h1>Gesti&oacute;n de Carreras</h1>
		<p>En este módulo podrás gestionar toda la información referente a las carreras, creación, modificación y eliminación de carreras 
			también podrás, consultar las carreras actuales.</p>
	</div>
	 
	 
	<!-- filtros -->
	 
	<form class="form-horizontal" method="post" action="../controller/administracion.php?accion=consultarCarrera">

		<fieldset>
			<div class="col-md-8 col-md-offset-2">
				<!-- Form Name -->
				<legend>Consulta</legend>

				<!-- Select Multiple -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="carreraID">Carrera: </label>
				  <div class="col-md-5">
				  <input id="carreraID" name="carreraID" value="<?php echo $filtrosCarrera['carrera'] ?>" type="text" placeholder="Nombre Carrera" class="form-control input-md">
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="numCreditosID">Número Créditos:</label>  
				  <div class="col-md-4">
				  <input id="numCreditosID" name="numCreditosID" onkeypress="return validarNumeros(event)" value="<?php echo $filtrosCarrera['numCreditos'] ?>" type="text" placeholder="###" class="form-control input-md">
					
				  </div>
				</div>

				<!-- Prepended text-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="valorSemestreID">Valor Semestre:</label>
				  <div class="col-md-4">
					<div class="input-group">
					  <span class="input-group-addon">$</span>
					  <input id="valorSemestreID" name="valorSemestreID" onkeypress="return validarNumeros(event)" value="<?php echo $filtrosCarrera['valorSemestre'] ?>" class="form-control" placeholder="#########" type="text">
					</div>
					
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="numSemestreID">Número Semestres:</label>  
				  <div class="col-md-2">
				  <input id="numSemestreID" name="numSemestreID" onkeypress="return validarNumeros(event)" value="<?php echo $filtrosCarrera['numSemestre'] ?>" type="text" placeholder="##" class="form-control input-md">
					
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

	<form class="form-horizontal" method="post" action="../controller/administracion.php?accion=eliminarCarrera">
		<!-- Codigo de la carrera a eliminar -->
		<input type="hidden" name="codigoEliminarID"  id="codigoEliminarID" />
	
		<!-- tabla de lista de carreras -->
		<div align="right">
			<a href="agregarCarreras.html" >
				<a href="../controller/administracion.php?accion=agregarCarrera" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Agregar</a>
			</a>
		</div>

		<legend>Listado de Carreras</legend>
			 
	<div class="span7">   
		<div class="widget stacked widget-table action-table">
				
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th class="td-actions">Modificar</th>
							<th class="td-actions">Eliminar</th>
							<th>Código Carrera</th>
							<th>Nombre</th>
							<th>Número Créditos</th>
							<th>Valor Semestre</th>
							<th>Número Semestres</th>
						</tr>
					</thead>
					<tbody>
					  <?php while($data = mysql_fetch_assoc($listaCarrera)){ ?>
						<tr>
							<td class="td-actions">
								<p data-placement="top" data-toggle="tooltip" title="Modificar">
									<a class="btn btn-primary btn-xs" data-title="Modificar" href="../controller/administracion.php?accion=editarCarrera&id=<?php echo $data['car_codigo'] ?>" >
								 <span class="glyphicon glyphicon-pencil"></span></a></p>
							</td>
							<td class="td-actions">								
								 <p data-placement="top" data-toggle="tooltip" title="Delete"><a class="btn btn-danger btn-xs" onclick="javascript:deleteC('<?php echo $data['car_codigo'] ?>')" data-title="Eliminar" data-toggle="modal" data-target="#delete" >
								 <span class="glyphicon glyphicon-trash"></span></a></p>
							</td>
							<td><?php echo $data['car_codigo'] ?></td>
							<td><?php echo $data['car_nombre'] ?></td>
							<td><?php echo $data['car_numero_creditos'] ?></td>
							<td><?php echo $data['car_valor_semestre'] ?></td>
							<td><?php echo $data['car_numero_semestre'] ?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="clearfix"></div>
					
		</div> <!-- /widget-content -->
			
    </div><!-- /container -->
	<!-- fin listado carreras -->	 
     
    <!-- /div -- > 
	
	<!-- modal para eliminacion ---------------------------------------------------------------------------------- -->
    <div class="modal" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
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
</div>	