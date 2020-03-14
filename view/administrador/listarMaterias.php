<script>

var variables = "";

function deleteC(varisa){
	variables = varisa;
}

function eliminar(){
	document.forms[2].action = "../controller/administracion.php?accion=eliminarMateria&codigoEliminarID="+variables;
	document.forms[2].submit();
}

</script>
	 <div class="container">
	 
	 <div class="jumbotron">
        <h1>Gesti&oacute;n de Materias</h1>
        <p>En este módulo podrás gestionar toda la información referente a las materias, creación, modificación y eliminación de materias 
				también podrás, consultar las materias actuales.</p>
      </div>
	 
	 
	 <!-- filtros -->
	 
		<form class="form-horizontal" method="post" action="../controller/administracion.php?accion=consultarMateria">
		<fieldset>
			<div class="col-md-8 col-md-offset-2">
			<!-- Form Name -->
			<legend>Consulta</legend>

			<!-- Select Multiple materias -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="materiaID">Materia: </label>
			  <div class="col-md-5">
				<input id="materiaID" name="materiaID" value="<?php echo $filtrosMateria['materia'] ?>" type="text" placeholder="Nombre Materia" class="form-control input-md">

			  </div>
			</div>

			<!-- Text input num creditos -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="numCreditosID">Número Créditos:</label>  
			  <div class="col-md-4">
			  <input id="numCreditosID" name="numCreditosID" value="<?php echo $filtrosMateria['numCreditos'] ?>" type="text" placeholder="###" class="form-control input-md">
				
			  </div>
			</div>
			
			<!-- Prepended text ciclo -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="cicloID">Ciclo:</label>
			  <div class="col-md-4">
				<div class="input-group">
				  <input id="cicloID" name="cicloID" class="form-control" value="<?php echo $filtrosMateria['ciclo'] ?>" placeholder="Ciclo" type="text">
				</div>
				
			  </div>
			</div>
			
			<!-- Prepended text aula -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="aulaID">Aula:</label>
			  <div class="col-md-4">
				<div class="input-group">
				  <input id="aulaID" name="aulaID" class="form-control" value="<?php echo $filtrosMateria['aula'] ?>" placeholder="Aula " type="text">
				</div>
				
			  </div>
			</div>


			<!-- Text input num horas -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="numHorasID">Número Horas:</label>  
			  <div class="col-md-2">
			  <input id="numHorasID" name="numHorasID" type="text" value="<?php echo $filtrosMateria['numHoras'] ?>" placeholder="####" class="form-control input-md">
				
			  </div>
			</div>
			
			<!-- Text input num cupos -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="numCuposID">Número Cupos:</label>  
			  <div class="col-md-2">
			  <input id="numCuposID" name="numCuposID" type="text" value="<?php echo $filtrosMateria['numCupos'] ?>" placeholder="###" class="form-control input-md">
				
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
	 
	 <form  method="post" action="controller/administracion.php?accion=listarMaterias">
	 <!-- tabla de lista de carreras -->
	  <div align="right">
	    <a>
			<a href="../controller/administracion.php?accion=agregarMateria" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Agregar</a>
		</a>
		
		
	  </div>

			<legend>Listado de Materias</legend>
			 
			 <div class="span7">   
			<div class="widget stacked widget-table action-table">
				<div class="table-responsive">
				
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th class="td-actions">Modificar</th>
								<th class="td-actions">Eliminar</th>
								<th>Código Materia</th>
								<th>Nombre</th>
								<th>Número Créditos</th>
								<th>Ciclo</th>
								<th>Aula</th>
								<th>Descripción</th>
								<th>Número de Horas</th>
								<th>Cupos Disponibles</th>
							</tr>
						</thead>
							<tbody>
								<?php while($data = mysql_fetch_assoc($listaMateria)){ ?>
								<tr>
								
									<td class="td-actions">
										<p data-placement="top" data-toggle="tooltip" title="Modificar">
											<a class="btn btn-primary btn-xs" data-title="Modificar" href="../controller/administracion.php?accion=editarMateria&id=<?php echo $data['mat_codigo'] ?>" >
										 <span class="glyphicon glyphicon-pencil"></span></a></p>
									</td>
									<td class="td-actions">								
									<p data-placement="top" data-toggle="tooltip" title="Delete"><a class="btn btn-danger btn-xs" onclick="javascript:deleteC('<?php echo $data['mat_codigo'] ?>')" data-title="Eliminar" data-toggle="modal" data-target="#delete" >
										 <span class="glyphicon glyphicon-trash"></span></a></p>
									</td>
									<td><?php echo $data['mat_codigo'] ?></td>
									<td><?php echo $data['mat_nombre'] ?></td>
									<td><?php echo $data['mat_numero_creditos'] ?></td>
									<td><?php echo $data['mat_ciclo'] ?></td>
									<td><?php echo $data['mat_aula'] ?></td>
									<td><?php echo $data['mat_descripcion'] ?></td>
									<td><?php echo $data['mat_horas_semanales'] ?></td>
									<td><?php echo $data['mat_cupos_disponibles'] ?></td>
								</tr>
								<?php } ?>

							</tbody>
						</table>
						</div>
						<div class="clearfix"></div>
			
			</div> <!-- /widget -->
			</form>
			<!-- /container -->
         </div>
	<!-- fin listado carreras -->	 	 

    </div> 
	
	
	<form class="form-horizontal" method="post" action="../controller/administracion.php?accion=eliminarMateria">
	<!-- modal para eliminacion ---------------------------------------------------------------------------------- -->
	
	
	
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
</form>	
	<!-- fin modal para eliminacion -->
<!-- fin modal para eliminacion y update ------------------------------------------------------------------------------------------ -->