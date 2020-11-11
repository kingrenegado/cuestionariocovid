<?php
$host= '107.180.121.52';
$user = 'adminfactual_web';
$password= 'Tsun4m10';
$db = 'cuestionario';

$con = @mysqli_connect($host,$user,$password,$db);
mysqli_set_charset($con, 'utf8');

 if (!$con) {
       echo "Error conexion";
    }
?>