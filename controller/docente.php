<?php
    
require '../model/connection.php';
require '../view/header.php';

    $accion = $_GET['accion'];
    
	//accion para traer el listado de carreras
    if($accion == 'listarCarrera'){
        
		//listo las carreras
		$listaCarrera = carreraM::find();
		$listaCarreraFiltro = carreraM::find();
		require '../view/administrador/listarCarreras.php';
        
    }else if($accion == 'consultarCarrera'){
		
		$isPost = count($_POST)>0;
        if($isPost){
			$listaCarrera = carreraM::findByFilter();
		}else{
			$listaCarrera = carreraM::find();
		}
		
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
		
	}else if($accion == 'guardarCarrera'){
		$_SESSION["operacion"]="consultar";
		$carreraGuardar = [
			'codigoCarrera'=> $_POST['codigoCarreraID'],
			'nombreCarrera'=> $_POST['nombreCarreraID'],
			'numCreditos'=> $_POST['numCreditosID'],
			'valSemestre'=> $_POST['valorSemestreID'],
			'numSemstre'=> $_POST['numSemestreID']
		];
	
		
		require '../view/administrador/listarCarreras.php';
		
	}else if($accion ==  'modificarCarrera'){
		$_SESSION["operacion"]="consultar";
		
		$carreraModificar = [
			'codigoCarrera'=> "INGIND",
			'nombreCarrera'=> $_POST['nombreCarreraID'],
			'numCreditos'=> $_POST['numCreditosID'],
			'valSemestre'=> $_POST['valorSemestreID'],
			'numSemstre'=> $_POST['numSemestreID']
		];
		
		carreraM::update($carreraModificar);
		$listaCarrera = carreraM::find();
		
		require '../view/administrador/listarCarreras.php';
	}
	
	/*else if($accion == 'editar'){
        
        $isPost = count($_POST)>0;
        
        if($isPost){
            $usuario = [
                'id' => $_POST['id'],
                'nombre'=> $_POST['nombre'],
                'edad'=> $_POST['edad'],
                'ciudad'=> $_POST['ciudad']
            ];
            
            usuarioM::update($usuario);
            
            header("location:usuario.php?accion=registrar");
         
        }else{
            $id = $_GET['id'];
            $usuario = usuarioM::findById($id);
            require './view/usuario/editar.php';
        }
        
        
    }else if($accion == 'delete'){
        $id = $_GET['id'];
        usuarioM::delete($id);
        header("location:usuario.php?accion=registrar");
    }*/
    
require '../view/footer.php';