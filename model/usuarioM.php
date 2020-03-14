<?php
	
	/**
	* Clase para la gestion de usuarios
	* Estudiantes, Docentes y Administradores
	**/
    class usuarioM {
		
		/**
		* Metodo para la consulta de roles
		**/
        public static function findRol(){
            return mysql_query("select * from rol;");
        }
		
		/**
		* Metodo para Insercion o creacion de usuarios
		**/
        public static function insert($usuario){
			
            mysql_query("INSERT INTO persona (per_codigo, 
											  per_nombre_compl, 
											  per_fecha_nacimiento, 
											  per_email, per_usuario, 
											  per_password, 
											  rol_rol_codigo) 
										VALUES ('{$usuario['per_codigo']}', 
										        '{$usuario['per_nombre_compl']}', 
												'{$usuario['per_fecha_nacimiento']}', 
												'{$usuario['per_usuario']}@uJarrison.edu.co', 
												'{$usuario['per_usuario']}',
												'{$usuario['per_password']}', 
												'{$usuario['rol_codigo']}');");
        
			if($usuario['rol_codigo'] == '2'){
			
				mysql_query("INSERT INTO docente (doc_codigo, 
												  doc_oficina, 
												  doc_telefono, 
												  doc_categoria, 
												  persona_per_codigo) 
											VALUES ((select max(s.doc_codigo) + 1 from docente s),
												   '{$usuario['doc_oficina']}',
												   '{$usuario['doc_telefono']}',
												   '{$usuario['doc_categoria']}',
												   '{$usuario['per_codigo']}');");
							
			}else if($usuario['rol_codigo'] == '3'){
			
				mysql_query("INSERT INTO estudiante (est_codigo, 
													 est_apodo, 
													 persona_per_codigo, 
													 carrera_car_codigo)
											VALUES ((select max(e.est_codigo) + 1 from estudiante e),
												 '{$usuario['est_apodo']}',
												 '{$usuario['per_codigo']}',
												 '{$usuario['car_codigo']}');");
							
			}
		
		}
		
		/**
		* Metodo para Modificacion de usuarios
		**/
        public static function update($usuario){
			
			mysql_query("UPDATE persona SET per_nombre_compl = '{$usuario['per_nombre_compl']}', 
							per_fecha_nacimiento = '{$usuario['per_fecha_nacimiento']}', 
							per_email = '{$usuario['per_usuario']}@uJarrison.edu.co', 
							per_usuario = '{$usuario['per_usuario']}', 
							per_password = '{$usuario['per_password']}', 
							rol_rol_codigo = '{$usuario['rol_codigo']}'
							WHERE per_codigo = '{$usuario['per_codigo']}';");
        
			if($usuario['rol_codigo'] == '2'){
			
				mysql_query("UPDATE docente SET 
							doc_oficina = '{$usuario['doc_oficina']}', 
							doc_telefono = '{$usuario['doc_telefono']}', 
							doc_categoria = '{$usuario['doc_categoria']}', 
							persona_per_codigo = '{$usuario['per_codigo']}'
							WHERE doc_codigo = '{$usuario['doc_codigo']}';");
							
			}else if($usuario['rol_codigo'] == '3'){
			
				mysql_query("UPDATE estudiante SET est_apodo = '{$usuario['est_apodo']}', 
							persona_per_codigo = '{$usuario['per_codigo']}', 
							carrera_car_codigo = '{$usuario['car_codigo']}'
							WHERE est_codigo = '{$usuario['est_codigo']}';");
							
			}
        }
        
		/**
		* Metodo para Eliminacion de usuarios
		**/
        public static function delete($id, $docenteId, $estudianteId, $rolId){
			
			if($rolId == '2'){
				
				mysql_query("delete from docente where doc_codigo = '$docenteId';");
				
			}else if($rolId == '3'){
				
				mysql_query("delete from estudiante where est_codigo = '$estudianteId';");
				
			}
			
            mysql_query("delete from persona where per_codigo = '$id';");
        }
        
		/**
		* Metodo para Consulta de personas no asociadas a un rol
		**/
        public static function find(){
            return mysql_query("select * from persona;");
        }
		
		/**
		* Metodo para Consulta de usuarios por filtros
		**/
		public static function findByFilter($usuario){
			
			$query = "select * from usuario u where 1 = 1 ";
			
			if($usuario['cedula'] != ""){
				$query .="and u.per_codigo = '{$usuario['cedula']}' ";
			}
			if($usuario['usuario'] != ""){
				$query .="and upper(u.per_usuario) like upper('%{$usuario['usuario']}%') ";
			}
			if($usuario['tipoUsuario'] != ""){
				$query .="and u.rol_codigo = '{$usuario['tipoUsuario']}' ";
			}
			if($usuario['usuarios'] != ""){
				$query .="and upper(u.per_nombre_compl) like upper('%{$usuario['usuarios']}%') ";
			}
			
			
            return mysql_query($query);
        }
		
		/**
		* Metodo para Consulta de usuarios por roles
		**/
		public static function findUsuarios(){
            return mysql_query("select * from usuario ");
        }
		
		/**
		* Metodo para Consulta de usuarios por clave primaria
		**/
		public static function findUsuarioById($id){
			
			$usuarios =  mysql_query(" select * from usuario p where p.per_codigo =  '$id'"); 

			return  mysql_fetch_assoc($usuarios);					
        }
		
		/**
		* Metodo para Consulta de personas no asociadas a un rol por clave primaria
		**/
        public static function findById($id){
            $usuarios = mysql_query("select * from persona where per_codigo = '$id';");
            return  mysql_fetch_assoc($usuarios);
        }
		
		/**
		* Metodo para Consulta de docentes
		**/
		public static function findSelectDocentes(){
            return mysql_query("select d.doc_codigo, p.per_nombre_compl from persona p, docente d where p.per_codigo = d.persona_per_codigo and p.rol_rol_codigo = '2';");
        }

        
    }