<?php
    
/**
* Clase controladora  de Inicio de session
**/	

// Anexo de coneccion 
require '../model/connection.php';

	// se verifica el envio de datos
	$data = count($_POST)>0;

	// validamos que la pagina halla enviado datos
	if($data){
		$login = [
			'correo'=> $_POST['correo'],
			'contrasena'=> sha1($_POST['contrasena'])
		];

		// verificamos la existencia del login
		$usuario = loginM::consultarLogin($login);
		// direccionamos segun la identidad
		if($usuario){
			session_start();
			// inicialiamoza las variables de session
			$_SESSION["sessionNom"]=$usuario['per_nombre_compl'];
			$_SESSION["sessionEmail"]=$usuario['per_email'];
			$_SESSION["sessionUser"]=$usuario['per_usuario'];
			$_SESSION["operacion"]="consultar";  
			$_SESSION["rol"]=$usuario['rol_rol_codigo'];
			
			// Escribimos la pantalla de inicio
			require '../view/header.php';
			require '../view/indexSession.php';
			require '../view/footer.php';
			
		}else{
			// retornamos a el index en caso de error
			header("location:../index.php");
		}

	}
    
