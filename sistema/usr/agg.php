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

    $preg1 = $_POST['fiebre'];
    $preg2 = $_POST['ts'];
    $preg3 =$_POST['dc'];
    $preg4 = $_POST['sn'];
    $preg5 =$_POST['dm'];
    $preg6 =$_POST['oi'];
    $preg7 =$_POST['dg'];
    $preg8 =$_POST['dr'];
    $preg9 =$_POST['sos'];
  
    $acepto = $_POST['si'];
    $resultado = $preg1 + $preg2 + $preg3 + $preg4 + $preg5 + $preg6 + $preg7 + $preg8 + $preg9;
    $fecha = date('Y-m-d');

    $insert = mysqli_query($con,"INSERT INTO respuesta (idusuario,preg1,preg2,preg3,preg4,preg5,preg6,preg7,preg8,preg9,acepto,resultado,fecha_h) 
                                                values ('$idusu','$preg1','$preg2','$preg3','$preg4','$preg5','$preg6','$preg7','$preg8','$preg9','$acepto','$resultado','$fecha'  ) ");

    if($insert == true){
        $alert = '<a href="index.php" class="btn btn-info fas fa-arrow-left"> Finalizar</a>';
        $up = mysqli_query($con,"UPDATE musuario set respuesta = '$resultado',fecha_h = '$fecha',respondio = '$acepto'  where idusuario = '$idusu' ");
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