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
        <th>Respuesta 10</th>
        <th>Respuesta 11</th>
        <th>Respuesta 12</th>
        <th>Respuesta 13</th>
        <th>Respuesta 14</th>
        <th>Resultado</th>
        <th>Fecha</th>
    </tr>
    <?php
        $query = mysqli_query($con,"SELECT musuario.nombre,nrespuesta.preg1,nrespuesta.preg2,nrespuesta.preg3,
                                    nrespuesta.preg4,nrespuesta.preg5,nrespuesta.preg6,nrespuesta.preg7,nrespuesta.preg8,
                                    nrespuesta.preg9,nrespuesta.preg10,nrespuesta.preg11,nrespuesta.preg12,nrespuesta.preg13,nrespuesta.preg14,nrespuesta.resultado,nrespuesta.fechah
                                    FROM nrespuesta
                                    INNER JOIN musuario on musuario.idusuario = nrespuesta.idusuario");
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
                $preg10 = $ut['preg10'];
                $preg11 = $ut['preg11'];
                $preg12 = $ut['preg12'];
                $preg13 = $ut['preg13'];
                $preg14 = $ut['preg14'];
                $resultado = $ut['resultado'];
                $fecha = $ut['fechah'];
            
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
            <td><?php echo $preg10?></td>
            <td><?php echo $preg11?></td>
            <td><?php echo $preg12?></td>
            <td><?php echo $preg13?></td>
            <td><?php echo $preg14?></td>
            <td><?php echo $resultado?></td>
            <td><?php echo $fecha?></td>
        </tr>
    
    <?php
            }
        }
    ?>
</table>
