<?php
    require_once '../../php/conexion.php';

    date_default_timezone_set('UTC');

    date_default_timezone_set("America/Mexico_City");
    
    $hoy = date('Y-m-d');

    header('Content-type:application/csv');
    header("Content-Disposition: attachment; filename=reporte $hoy.xls");

    $uru = mysqli_query($con,"SELECT musuario.nombre,musuario.respuesta,musuario.respondio,musuario.fecha_h
                              FROM musuario 
                              where musuario.id_cusuario = 2  order by nombre asc ");
    $urs = mysqli_num_rows($uru);
?>


    <!-- Meta, title, CSS, favicons, etc. -->
    
<table border="1">
	<tr >
            <th>Nombre</th>
            <th>Respondió</th>
            <th>Resultado</th>
    </tr>
    
<?php

while($y = mysqli_fetch_array($uru)){
    $nombre = $y['nombre'];
    $resultado = $y['respuesta'];
    $respondio = $y['respondio'];
    $fecha = $y['fecha_h'];
    if($respondio == 1){
      $respondio == "Si";
    }if($respondio == 0){
      $respondio == "No";
    }
    $query = mysqli_query($con,"SELECT idusuario from musuario where nombre = '$nombre'  ");
   $q = mysqli_num_rows($query);
   if($q > 0){
     while($k = mysqli_fetch_array($query)){
       $idusuario = $k['idusuario'];
     }
   }
  
  if($fecha == $hoy && $respondio == 1 && $resultado == 0){
   $n = '<td class="table-info">' .$nombre.'</td>';
   $re = '<td class="table-info">'.'Si'.'</td>';
   $res = '<td class="table-info">' .$resultado.'</td>';
  }else if($fecha == $hoy and $respondio > 0 && $resultado > 0 ){
    $n = '<td class ="table-danger">'.$nombre.'</td>';
    $re = '<td class ="table-danger">'.'Si'.'</td>';
    $res = '<td class ="table-danger">'.$resultado.'</td>';
  }else if($fecha != $hoy){
    $n = '<td class="table-warning">'.$nombre.'</td>';
    $re = '<td class ="table-warning">'.'No'.'</td>';
    $res = '<td class="table-warning">'.'0'.'</td>';
  }


?>
 <tr>
            <?php echo $n?>
            <?php echo $re?>
            <?php echo $res?>
        </tr>
<?php
}
?>
