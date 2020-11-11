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
    $nombre = $_POST['nombre'];
    $nomusu = $_POST['nomusu'];
    $pass = $_POST['pass'];
    $area = $_POST['area'];
    $puesto = $_POST['puesto'];

    $diah = date('d');
    $mes = date('m');
    $ano = date('Y');

    $dia = $diah-1;

    $fecha = $ano."-".$mes."-".$dia;

    $querybusqueda = mysqli_query($con,"SELECT * FROM musuario where nomusuario = '$nomusu' ");
    $rr = mysqli_num_rows($querybusqueda);

    if($rr > 0){
        $alert = 'Usuario ya registrado';
    }else{
        $queryInsert = mysqli_query($con,"INSERT INTO musuario 
        (nombre,nomusuario,password,id_carea,id_cpuesto,fecha_h) 
        VALUES 
        ('$nombre','$nomusu','$pass','$area','$puesto','$fecha') ");

        if($queryInsert == true){
            $alert = 'Usuario registrado';
        }else{
            $alert = 'Error al registrar '.mysqli_error($con);
        }
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
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="alert alert-dark" role="alert">
                <?php echo $alert?>
            </div>
        </div>
        <div class="col-sm-2"></div>
    </div>
    </div>
</body>

</html>