<?php

	/**
	* Clase para la gestion de inicio de session
	**/
    class loginM {
        
		/**
		* Metodo para la consulta de usuario 
		* para el inicio de session
		**/
        public static function consultarLogin($usuario){
            $usuarios = mysql_query("select * from persona where per_email = '{$usuario['correo']}' and  per_password = '{$usuario['contrasena']}';");
			
            return  mysql_fetch_assoc($usuarios);
        }
        
    }