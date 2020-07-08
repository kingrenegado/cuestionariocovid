<?php
$host= 'localhost';
$user = 'root';
$password= '';
$db = 'cuestionario';

$con = @mysqli_connect($host,$user,$password,$db);
mysqli_set_charset($con, 'utf8');

 if (!$con) {
       echo "Error conexion";
    }
?>