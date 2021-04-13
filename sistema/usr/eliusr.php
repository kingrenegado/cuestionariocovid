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
    
    $idusuario = $_POST['idelim'];

    $delete = mysqli_query($con,"DELETE FROM `musuario` WHERE `musuario`.`idusuario` = '$idusuario' ");

    if($delete == true){
        $busca1 = mysqli_query($con,"SELECT * FROM nrespuesta where idusuario = '$idusuario' ");
        $bb = mysqli_num_rows($busca1);

        if($bb > 0){
            $delete1 = mysqli_query($con,"DELETE FROM `nrespuesta` WHERE idusuario = '$idusuario' ");
            $delete2 = mysqli_query($con,"DELETE FROM `respuesta` WHERE idusuario = '$idusuario' ");
            $alert = "Eliminado correctamente";
        }else{
            $delete1 = mysqli_query($con,"DELETE FROM `nrespuesta` WHERE idusuario = '$idusuario' ");
            $delete2 = mysqli_query($con,"DELETE FROM `respuesta` WHERE idusuario = '$idusuario' ");
            $alert = "Eliminado correctamente";
        }
    }else{
        $alert = "Error ".mysqli_error($con);
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