<?php

/**
* Clase controladora de modeulo de administracion
**/	

// importamos la coneccion    
require '../model/connection.php';
// escribimos el encabezado
require '../view/header.php';
	
	// tomamos la accion a ejecutar
    $accion = $_GET['accion'];
    
	// en caso de ser inicio pintamos el index
	if($accion == 'inicio'){
		require '../view/indexSession.php';
	}
	
	/**
	* Gestion de Carreras
	**/
    else if($accion == 'listarCarrera'){
        
		$_SESSION["operacion"]="listar";
		
		$filtrosCarrera = [
                'valorSemestre'=> "",
                'numSemestre'=> "",
                'numCreditos'=> "" ,
			    'carrera'=> ""
            ];
		
		//listo las carreras
		$listaCarrera = carreraM::find();
		//lista de carreras para filtro
		$listaCarreraFiltro = carreraM::find();
		require '../view/administrador/listarCarreras.php';
        
    }else if($accion == 'eliminarCarrera'){
		$id = $_GET['codigoEliminarID'];
		
		carreraM::delete($id);
		
		$filtrosCarrera = [
                'valorSemestre'=> "",
                'numSemestre'=> "",
                'numCreditos'=> "" ,
			    'carrera'=> ""
            ];
		
		//listo las carreras
		$listaCarrera = carreraM::find();
		//lista de carreras para filtro
		$listaCarreraFiltro = carreraM::find();
		require '../view/administrador/listarCarreras.php';
		
		
	}else if($accion == 'consultarCarrera'){
		
		$isPost = count($_POST);

        if($isPost > 0){
			
			$filtrosCarrera = [
                'valorSemestre'=> $_POST['valorSemestreID'],
                'numSemestre'=> $_POST['numSemestreID'],
                'numCreditos'=> $_POST['numCreditosID'],
				'carrera'=> $_POST['carreraID']
            ];
			
			$listaCarrera = carreraM::findByFilter($filtrosCarrera);
		
		}else{
			$listaCarrera = carreraM::find();
		}
		//lista de carreras para filtro
		$listaCarreraFiltro = carreraM::find();
		
		require '../view/administrador/listarCarreras.php';
		
	}else if($accion == 'agregarCarrera'){
		$_SESSION["operacion"]="guardar";
		$carrera = [
			'car_codigo'=> "",
			'car_nombre'=> "",
			'car_numero_creditos'=> "",
			'car_valor_semestre'=> "",
			'car_numero_semestre'=> ""
		];
		
		require '../view/administrador/agregarCarreras.php';
		
	}else if($accion == 'editarCarrera'){
	
		$_SESSION["operacion"]="modificar";
		$id = $_GET['id'];
		$carrera = carreraM::findById($id);
		require '../view/administrador/agregarCarreras.php';
		
	// Metodo para guardar o actualizar la informacion 		
	}else if($accion == 'guardarCarrera'){
		
		if($_SESSION["operacion"] == "guardar"){
			$carreraGuardar = [
				'codigoCarrera'=> $_POST['codigoCarreraID'],
				'nombreCarrera'=> $_POST['nombreCarreraID'],
				'numCreditos'=> $_POST['numCreditosID'],
				'valSemestre'=> $_POST['valorSemestreID'],
				'numSemestre'=> $_POST['numSemestreID']
			];
		
			carreraM::insert($carreraGuardar);
		}else{
			$carreraModificar = [
				'codigoCarrera'=> $_POST['codigoCarreraID'],
				'nombreCarrera'=> $_POST['nombreCarreraID'],
				'numCreditos'=> $_POST['numCreditosID'],
				'valSemestre'=> $_POST['valorSemestreID'],
				'numSemestre'=> $_POST['numSemestreID']
			];
		
			carreraM::update($carreraModificar);
		}
		
		$_SESSION["operacion"]="consultar";
		
		//cargamos los parametros de nuevo
		$filtrosCarrera = [
			'valorSemestre'=> "",
			'numSemestre'=> "",
			'numCreditos'=> "" //,
			// 'lstCarrera'=> $_POST['carreraID']
        ];
		
		
		//listo las carreras
		$listaCarrera = carreraM::find();
		//lista de carreras para filtro
		$listaCarreraFiltro = carreraM::find();		
		
		
		require '../view/administrador/listarCarreras.php';
		
	}
	
	
	
	
	
	
	
	
	
	/**
	* Gestion de materias
	**/
	else if($accion == 'listarMaterias'){
	
		$filtrosMateria = [
			'aula'=> "",
			'ciclo'=> "",
			'numCreditos'=> "",
			'numHoras'=> "",
			'numCupos'=> "",
			'materia' => ""
        ];
		
		$_SESSION["operacion"]="listar";
		//listo las materias
		$listaMateria = materiaM::find();
		//lista de materias para filtro
		$listaMateriaFiltro = materiaM::find();
		
		require '../view/administrador/listarMaterias.php';
		
	}else if($accion == 'consultarMateria'){
		
		$isPost = count($_POST);

        if($isPost > 0){
			
			$filtrosMateria = [
                'aula'=> $_POST['aulaID'],
                'ciclo'=> $_POST['cicloID'],
                'numCreditos'=> $_POST['numCreditosID'],
				'numHoras'=> $_POST['numHorasID'],
				'numCupos'=> $_POST['numCuposID'],
				'materia'=> $_POST['materiaID']
            ]; 
			
			$listaMateria = materiaM::findByFilter($filtrosMateria);
			
		}else{
			$listaMateria = materiaM::find();
		}
		
		//lista de materia para filtro
		$listaMateriaFiltro = materiaM::find();
		
		require '../view/administrador/listarMaterias.php';
		
	}else if($accion == 'eliminarMateria'){
		$id = $_GET['codigoEliminarID'];
		
		materiaM::delete($id);
		
		$filtrosMateria = [
			'aula'=> "",
			'ciclo'=> "",
			'numCreditos'=> "",
			'numHoras'=> "",
			'numCupos'=> "",
			'materia' => ""
        ];
		
		$_SESSION["operacion"]="listar";
		//listo las materias
		$listaMateria = materiaM::find();
		//lista de materias para filtro
		$listaMateriaFiltro = materiaM::find();
		
		require '../view/administrador/listarMaterias.php';
		
	}else if($accion == 'agregarMateria'){
		
		$_SESSION["operacion"]="guardar";
		$materia = [
			'mat_codigo'=> "",
			'mat_nombre'=> "",
			'mat_numero_creditos'=> "",
			'mat_valor_semestre'=> "",
			'mat_numero_semestre'=> "",
			'mat_ciclo'=> "",
			'mat_aula'=> "",
			'mat_cupos_disponibles'=> "",
			'mat_descripcion'=> "",
			'mat_horas_semanales'=> "",
			'carrera_car_codigo'=>"0",
			'docente_doc_codigo'=>"0",
		];
		
		// se carga la lista de carrera
		$listaCarreraSelec = carreraM::find();
		// se carga la lista de docentes
		$listaDocenteSelec = usuarioM::findSelectDocentes();
		
		require '../view/administrador/agregarMaterias.php';
		
	}else if($accion == 'editarMateria'){
		
		$_SESSION["operacion"]="modificar";
		// se carga la lista de carrera
		$listaCarreraSelec = carreraM::find();
		// se carga la lista de docentes
		$listaDocenteSelec = usuarioM::findSelectDocentes();
		// consultamos por la clave primaria
		$id = $_GET['id'];
		$materia = materiaM::findById($id); 
		require '../view/administrador/agregarMaterias.php';
	
	// Metodo para guardar o actualizar la informacion 	
	}else if($accion == 'guardarMateria'){
		
		if($_SESSION["operacion"] == "guardar"){
			$materiaGuardar = [
				'codigoMateria'=> $_POST['codigoMateriaID'],
				'nombreMateria'=> $_POST['nombreMateriaID'],
				'numCreditos'=> $_POST['numCreditosID'],
				'ciclo'=> $_POST['cicloID'],
				'aula'=> $_POST['aulaID'],
				'descipcion'=> $_POST['descipcionID'],
				'numHoras'=> $_POST['numHorasID'],
				'cuposDisponibles'=> $_POST['cuposDisponiblesID'],
				'carrera'=> $_POST['carreraID'],
				'docente'=> $_POST['docenteID']
			];
		
			materiaM::insert($materiaGuardar);
		}else{
			$materiaModificar = [
				'codigoMateria'=> $_POST['codigoMateriaID'],
				'nombreMateria'=> $_POST['nombreMateriaID'],
				'numCreditos'=> $_POST['numCreditosID'],
				'ciclo'=> $_POST['cicloID'],
				'aula'=> $_POST['aulaID'],
				'descipcion'=> $_POST['descipcionID'],
				'numHoras'=> $_POST['numHorasID'],
				'cuposDisponibles'=> $_POST['cuposDisponiblesID'],
				'carrera'=> $_POST['carreraID'],
				'docente'=> $_POST['docenteID']
			];
		
			materiaM::update($materiaModificar);
		}
		
		$_SESSION["operacion"]="consultar";
		
		//cargamos los parametros de nuevo
		$filtrosMateria = [ // pendiente nombres filtros
			'aula'=> "",
			'ciclo'=> "",
			'numCreditos'=> "",
			'numHoras'=> "",
			'numCupos'=> "",
        ];
		
		
		//listo las carreras
		$listaMateria = materiaM::find();
		//lista de carreras para filtro
		$listaMateriaFiltro = materiaM::find();		
		
		
		require '../view/administrador/listarMaterias.php';
		
	}
	
	
	
	
	
	
	/**
	* Gestion de usuarios
	**/
	else if($accion == 'listarUsuarios'){
	
		$filtrosUsuario= [
			'cedula'=> "",
			'usuario'=> "",
			'usuarios'=>"",
			'tipoUsuario'=>""
        ]; 
		
		$_SESSION["operacion"]="listar";
		//listo las usuarios
		$listaUsuario = usuarioM::findUsuarios();
		//lista de usuarios para filtro
		$listaUsuarioFiltro = usuarioM::find();
		//lista de roles para filtro
		$listaRolFiltro = usuarioM::findRol();
		
		
		require '../view/administrador/listarUsuarios.php';
		
	}else if($accion == 'eliminarUsuario'){
		$id = $_GET['codigoEliminarID'];
		$idDocente = $_GET['codigoDocenteID'];
		$idEstudiante = $_GET['codigoEstudianteID'];
		$idRol = $_GET['codigoRolID'];
		
		UsuarioM::delete($id, $idDocente, $idEstudiante, $idRol);
		
		$filtrosUsuario= [
			'cedula'=> "",
			'usuario'=> "",
			'usuarios'=>"",
			'tipoUsuario'=>""
        ]; 
		
		$_SESSION["operacion"]="listar";
		//listo las usuarios
		$listaUsuario = usuarioM::findUsuarios();
		//lista de usuarios para filtro
		$listaUsuarioFiltro = usuarioM::find();
		//lista de roles para filtro
		$listaRolFiltro = usuarioM::findRol();
		
		
		require '../view/administrador/listarUsuarios.php';
		
	}else if($accion == 'consultarUsuario'){
		
		$isPost = count($_POST);

        if($isPost > 0){
			
			$filtrosUsuario= [
				'cedula'=> $_POST['cedulaID'],
				'usuario'=> $_POST['usuarioID'],
				'usuarios'=> $_POST['usuariosID'],
				'tipoUsuario'=> $_POST['tipoUsuarioID']
			];
			
			$listaUsuario = usuarioM::findByFilter($filtrosUsuario);
			
		}else{
			$listaUsuario = usuarioM::find();
		}

		//lista de usuarios para filtro
		$listaUsuarioFiltro = usuarioM::find();
		//lista de roles para filtro
		$listaRolFiltro = usuarioM::findRol();
		
		
		require '../view/administrador/listarUsuarios.php';
		
	}else if($accion == 'agregarUsuario'){
		
		$_SESSION["operacion"]="guardar";
		//lista de roles para filtro
		$listaRolFiltro = usuarioM::findRol();
		// lista de carreras
		$listaCarreraFiltro = carreraM::find();
		
		$usuario = [
			'rol_codigo'=> "1",
			'per_codigo'=> "",
			'per_nombre_compl'=> "",
			'per_fecha_nacimiento'=> "",
			'per_usuario'=> "",
			'per_password'=> "",
			'doc_oficina'=> "",
			'doc_categoria'=> "",
			'doc_telefono'=> "",
			'est_apodo' => "",
			'car_codigo' => "",
			'est_codigo' => "",
			'doc_codigo' => ""
		];
		
		require '../view/administrador/agregarUsuarios.php';
		
	}else if($accion == 'editarUsuario'){
	
		$_SESSION["operacion"]="modificar";
		//lista de roles para filtro
		$listaRolFiltro = usuarioM::findRol();
		// lista de carreras
		$listaCarreraFiltro = carreraM::find();
		$id = $_GET['id'];
		$usuario = usuarioM::findUsuarioById($id);
		require '../view/administrador/agregarUsuarios.php';
		
	// Metodo para guardar o actualizar la informacion 	
	}else if($accion == 'guardarUsuario'){
		
		$usuarioGuardar = [
			'rol_codigo'=> $_POST['tipoUsuarioID'],
			'per_codigo'=> $_POST['cedulaID'],
			'per_nombre_compl'=> $_POST['nombreCompletoID'],
			'per_fecha_nacimiento'=> $_POST['fechaNacimientoID'],
			'per_usuario'=> $_POST['usuarioID'],
			'per_password'=> sha1($_POST['passID']),
			'doc_oficina'=> $_POST['oficinaID'],
			'doc_categoria'=> $_POST['categoriaID'],
			'doc_telefono'=> $_POST['telefonoID'],
			'est_apodo' => $_POST['apodoID'], 
			'car_codigo' => $_POST['carreraID'],
			'est_codigo' => $_POST['estudianteID'],
			'doc_codigo' => $_POST['docenteID']			
			
		];
		
		if($_SESSION["operacion"] == "guardar"){
			
			usuarioM::insert($usuarioGuardar);
			
		}else{

			usuarioM::update($usuarioGuardar);
		}
		
		$_SESSION["operacion"]="consultar";
		
		//cargamos los parametros de nuevo
		$filtrosUsuario= [
			'cedula'=> "",
			'usuario'=> "",
			'usuarios'=>"",
			'tipoUsuario'=>""
        ]; 
		
		
		//listo las usuarios
		$listaUsuario = usuarioM::findUsuarios();
		//lista de usuarios para filtro
		$listaUsuarioFiltro = usuarioM::find();
		//lista de roles para filtro
		$listaRolFiltro = usuarioM::findRol();	
		
		
		require '../view/administrador/listarUsuarios.php';
		
	}else if($accion == 'recargarUsuario'){

		$usuario = [
			'rol_codigo'=> $_POST['tipoUsuarioID'],
			'per_codigo'=> $_POST['cedulaID'],
			'per_nombre_compl'=> $_POST['nombreCompletoID'],
			'per_fecha_nacimiento'=> $_POST['fechaNacimientoID'],
			'per_usuario'=> $_POST['usuarioID'],
			'per_password'=> $_POST['passID'],
			'doc_oficina'=> $_POST['oficinaID'],
			'doc_categoria'=> $_POST['categoriaID'],
			'doc_telefono'=> $_POST['telefonoID'],
			'est_apodo' => $_POST['apodoID'], 
			'car_codigo' => $_POST['carreraID'], 
			'est_codigo' => $_POST['estudianteID'],
			'doc_codigo' => $_POST['docenteID']				
		];

		
		//lista de roles para filtro
		$listaRolFiltro = usuarioM::findRol();
		// lista de carreras
		$listaCarreraFiltro = carreraM::find();
		
		require '../view/administrador/agregarUsuarios.php';

	}

require '../view/footer.php';