<?php

	/**
	* Clase para la gestion de carreras 
	**/
    class carreraM {
        
		/**
		* Metodo para la creacion de nuevas carreras
		**/
        public static function insert($carrera){
            mysql_query("INSERT INTO carrera (car_codigo, 
											  car_nombre, 
											  car_numero_creditos, 
											  car_valor_semestre, 
											  car_numero_semestre) 
										VALUES ('{$carrera['codigoCarrera']}', 
										      '{$carrera['nombreCarrera']}', 
											  '{$carrera['numCreditos']}', 
											  '{$carrera['valSemestre']}', 
											  '{$carrera['numSemestre']}');");
        }
        
		/**
		* Metodo para la creacion de nuevas carreras
		**/
        public static function update($carrera){
            mysql_query("UPDATE carrera 
						SET car_nombre = '{$carrera['nombreCarrera']}', 
						car_numero_creditos = '{$carrera['numCreditos']}', 
						car_valor_semestre = '{$carrera['valSemestre']}',
						car_numero_semestre = '{$carrera['numSemestre']}'
						WHERE car_codigo = '{$carrera['codigoCarrera']}';");
        }
        
		/**
		* Metodo para  eliminacion de carreras
		**/
        public static function delete($id){
            mysql_query("delete from carrera where car_codigo = '$id';");
        }
        
		/**
		* Metodo para consulta de todas las carreras
		**/
        public static function find(){
            return mysql_query("select * from carrera;");
        }
        
		/**
		* Metodo para Consulta de carrera por clave primaria
		**/
        public static function findById($id){
            $carreras = mysql_query("select * from carrera where car_codigo = '$id';");
            return  mysql_fetch_assoc($carreras);
        }
		
		/**
		* Metodo para Consulta de carreras por filtros
		**/
		public static function findByFilter($carrera){
			
			$query = "select * from carrera c where 1 = 1 ";
			
			if($carrera['numCreditos'] != ""){
				$query .="and c.car_numero_creditos = '{$carrera['numCreditos']}' ";
			}
			if($carrera['valorSemestre'] != ""){
				$query .="and c.car_valor_semestre = '{$carrera['valorSemestre']}' ";
			}
			if($carrera['numSemestre'] != ""){
				$query .="and c.car_numero_semestre = '{$carrera['numSemestre']}' ";
			}
			if($carrera['carrera'] != ""){
				$query .="and upper(c.car_nombre) like upper('%{$carrera['carrera']}%') ";
			}
			
            return mysql_query($query);
        }

    }