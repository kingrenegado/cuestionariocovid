<?php
    require_once '../../../php/conexion.php';

    date_default_timezone_set('UTC');

    date_default_timezone_set("America/Mexico_City");
    
    $hoy = date('Y-m-d');

    header('Content-type:application/csv');
    header("Content-Disposition: attachment; filename=reporte $hoy.xls");
?>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<table border="1">
    <tr>
        <th>Nombre</th>
        <th>Respuesta 1</th>
        <th>Respuesta 2</th>
        <th>Respuesta 3</th>
        <th>Respuesta 4</th>
        <th>Respuesta 5</th>
        <th>Respuesta 6</th>
        <th>Respuesta 7</th>
        <th>Respuesta 8</th>
        <th>Respuesta 9</th>
        <th>Resultado</th>
        <th>Fecha</th>
    </tr>
    <?php
        $query = mysqli_query($con,"SELECT musuario.nombre,respuesta.preg1,respuesta.preg2,respuesta.preg3,
                                    respuesta.preg4,respuesta.preg5,respuesta.preg6,respuesta.preg7,respuesta.preg8,
                                    respuesta.preg9,respuesta.resultado,respuesta.fecha_h
                                    FROM respuesta
                                    INNER JOIN musuario on musuario.idusuario = respuesta.idusuario");
        $q = mysqli_num_rows($query);
        
        if($q > 0){
            while($ut = mysqli_fetch_array($query)){
                $nombre = $ut['nombre'];
                $preg1 = $ut['preg1'];
                $preg2 = $ut['preg2'];
                $preg3 = $ut['preg3'];
                $preg4 = $ut['preg4'];
                $preg5 = $ut['preg5'];
                $preg6 = $ut['preg6'];
                $preg7 = $ut['preg7'];
                $preg8 = $ut['preg8'];
                $preg9 = $ut['preg9'];
                $resultado = $ut['resultado'];
                $fecha = $ut['fecha_h'];
            
    ?>
        <tr>
            <td><?php echo $nombre?></td>
            <td><?php echo $preg1?></td>
            <td><?php echo $preg2?></td>
            <td><?php echo $preg3?></td>
            <td><?php echo $preg4?></td>
            <td><?php echo $preg5?></td>
            <td><?php echo $preg6?></td>
            <td><?php echo $preg7?></td>
            <td><?php echo $preg8?></td>
            <td><?php echo $preg9?></td>
            <td><?php echo $resultado?></td>
            <td><?php echo $fecha?></td>
        </tr>
    
    <?php
            }
        }
    ?>
</table>
