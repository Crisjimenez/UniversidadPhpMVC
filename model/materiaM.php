<?php

	/**
	* Clase para la gestion de materias
	**/
    class materiaM {
        
		/**
		* Metodo para creacion de materias
		**/
        public static function insert($materia){
            mysql_query("INSERT INTO materia (mat_codigo, 
											  mat_nombre, 
											  mat_numero_creditos, 
											  mat_ciclo, mat_aula, 
											  mat_descripcion, 
											  mat_horas_semanales, 
											  mat_cupos_disponibles, 
											  carrera_car_codigo, 
											  docente_doc_codigo) 
										VALUES ('{$materia['codigoMateria']}', 
											   '{$materia['nombreMateria']}', 
											   '{$materia['numCreditos']}', 
											   '{$materia['ciclo']}', 
											   '{$materia['aula']}', 
											   '{$materia['descipcion']}', 
											   '{$materia['numHoras']}', 
											   '{$materia['cuposDisponibles']}', 
											   '{$materia['carrera']}', 
											   '{$materia['docente']}');");
        }
		
		/**
		* Metodo para modificacion de materias
		**/
        public static function update($materia){
            mysql_query("UPDATE materia 
						SET mat_nombre = '{$materia['nombreMateria']}', 
						mat_numero_creditos = '{$materia['numCreditos']}', 
						mat_ciclo = '{$materia['ciclo']}',
						mat_aula ='{$materia['aula']}',
						mat_descripcion = '{$materia['descipcion']}', 
						mat_horas_semanales = '{$materia['numHoras']}',
						mat_cupos_disponibles ='{$materia['cuposDisponibles']}', 
						carrera_car_codigo = '{$materia['carrera']}', 
						docente_doc_codigo = '{$materia['docente']}'
						WHERE mat_codigo = '{$materia['codigoMateria']}';");
        }
        
		/**
		* Metodo para eliminacion de materia
		**/
        public static function delete($id){
            mysql_query("delete from materia where mat_codigo = '$id';");
        }
        
		/**
		* Metodo para la consulta de materias
		**/
        public static function find(){
            return mysql_query("select * from materia;");
        }
		
		/**
		* Metodo para la consulta de roles
		**/
		 public static function findRol(){
            return mysql_query("select * from rol;");
        }
		
		/**
		* Metodo para la consulta de materias por filtros
		**/
		public static function findByFilter($materia){
			
			$query = "select * from materia m where 1 = 1 ";
			
			if($materia['aula'] != ""){
				$query .="and m.mat_aula = '{$materia['aula']}' ";
			}
			if($materia['ciclo'] != ""){
				$query .="and m.mat_ciclo = '{$materia['ciclo']}' ";
			}
			if($materia['numHoras'] != ""){
				$query .="and m.mat_horas_semanales = '{$materia['numHoras']}' ";
			}
			if($materia['numCupos'] != ""){
				$query .="and m.mat_cupos_disponibles = '{$materia['numCupos']}' ";
			}
			if($materia['numCreditos'] != ""){
				$query .="and m.mat_numero_creditos = '{$materia['numCreditos']}' ";
			}
			if($materia['materia'] != ""){
				$query .="and upper(m.mat_nombre) like upper('%{$materia['materia']}%') ";
			}
			
            return mysql_query($query);
        }
        
		/**
		* Metodo para la consulta de materias por clave primaria
		**/
        public static function findById($id){
            $materias = mysql_query("select * from materia where mat_codigo = '$id';");
            return  mysql_fetch_assoc($materias);
        }
        
    }