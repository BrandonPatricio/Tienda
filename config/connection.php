<?php

// Obtener la URL de la base de datos de JawsDB
$ja_db_url = parse_url(getenv("mysql://o8l08wdj2lb4aln7:z3rktxwx69gztd1r@ofcmikjy9x4lroa2.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/t4prq68eg58nlli7"));

// Datos de conexión
$host ="ofcmikjy9x4lroa2.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$dbname = "t4prq68eg58nlli7";
$user = "o8l08wdj2lb4aln7";
$password = "z3rktxwx69gztd1r";
$port ="3306";

// Crear la conexión a la base de datos
$conn = new mysqli($host, $user, $password, $dbname, $port);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
   
}  
?>