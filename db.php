<?php

//Crear la conexión a la db
$db_host = "localhost";
$db_username = "kevin";
$db_password = "1234";
$db_database = "app1";

$db = new mysqli($db_host, $db_username, $db_password, $db_database);
mysqli_query($db, "SET NAMES 'utf8'");

if($db->connect_errno > 0){
    die('Error de conexión: [' . $db->connect_errno .']');
}
