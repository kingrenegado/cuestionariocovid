<?php

    session_start();

    require_once '../../php/conexion.php';

    require_once 'empty.php';



    date_default_timezone_set('UTC');



    date_default_timezone_set("America/Mexico_City");



    $idusu = $_SESSION['id'];



    $query = mysqli_query($con,"SELECT nombre from musuario where idusuario = '$idusu' ");

    $t = mysqli_num_rows($query);

    if($t > 0){

        while($data = mysqli_fetch_array($query)){

            $nombre = $data['nombre'];

        }

    }

    // echo "bienvenido:  ".$nombre;



    $preg1 = $_POST['ts'];

    $preg2 = $_POST['fiebre'];

    $preg3 = $_POST['dr'];

    $preg4 = $_POST['dc'];

    $preg5 = $_POST['dm'];

    $preg6 = $_POST['dar'];

    $preg7 = $_POST['dg'];

    $preg8 = $_POST['esc'];

    $preg9 = $_POST['dto'];

    $preg10 = $_POST['sn'];

    $preg11 = $_POST['pof'];

    $preg12 = $_POST['psg'];

    $preg13 = $_POST['oi'];

    $preg14 = $_POST['sos'];

    $acepto = $_POST['si'];



    $resultado = $preg1 + $preg2 + $preg3 + $preg4 + $preg5 + $preg6 + $preg7 + $preg8 + $preg9 + $preg10 + $preg11 + $preg12 + $preg13 + $preg14;

    $fecha = date('Y-m-d');



    $insert = mysqli_query($con,"INSERT INTO nrespuesta (idusuario,preg1,preg2,preg3,preg4,preg5,preg6,preg7,preg8,preg9,preg10,preg11,preg12,preg13,preg14,acepto,resultado,fechah) 

                                                values ('$idusu','$preg1','$preg2','$preg3','$preg4','$preg5','$preg6','$preg7','$preg8','$preg9','$preg10','$preg11','$preg12','$preg13','$preg14','$acepto','$resultado','$fecha'  ) ");



    if($insert == true){

        $up = mysqli_query($con,"UPDATE musuario set respuesta = '$resultado',fecha_h = '$fecha',respondio = '$acepto'  where idusuario = '$idusu' ");

        if($up == true) {

            header('location: index.php');

        }else{

            $alert = 'Error '.mysqli_error($con);

        }

    }else{

        $alert =  "Error de llenado ".mysqli_error($con);

    }

?>



<!DOCTYPE html>

<html lang="en">

<?php
    require_once 'head.php';
?>

<body>

    <?php 
      require_once 'nav.php';
    ?>
    <br><br>

    <div class="row">

        <div class="col-sm-4"></div>

        <div class="col-sm-4">



            <div class="alert alert-primary" role="alert">

                <?php

  echo $alert;

  ?>

            </div>

        </div>

    </div>

    </div>

    <div class="col-sm-4"></div>

</body>

</html>