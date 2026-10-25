<?php
$host = "localhost";
$usuario_db = "root";
$password_db = "";
$dbname = "sistema_login";

$conexion = new mysqli($host, $usuario_db, $password_db, $dbname);

if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

$conexion->set_charset("utf8");
?>