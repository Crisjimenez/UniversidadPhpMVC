<?php
// Conexion a la base de datos
mysql_connect("localhost", "root", "");
mysql_select_db("jarrisonbd");

//Anexo de modelos
require '../model/loginM.php';
require '../model/carreraM.php';
require '../model/usuarioM.php';
require '../model/materiaM.php';
