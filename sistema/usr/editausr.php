<?php
    
    session_start();
    require_once '../../php/conexion.php';
    require_once 'empty.php';

    date_default_timezone_set('UTC');

    date_default_timezone_set("America/Mexico_City");
    
    $idusu = $_SESSION['id'];
    $usuario = $_POST['usuario'];

    $query = mysqli_query($con,"SELECT nombre from musuario where idusuario = '$idusu' ");
    $t = mysqli_num_rows($query);
    if($t > 0){
        while($data = mysqli_fetch_array($query)){
            $nombre = $data['nombre'];
        }
    }
   // echo "bienvenido:  ".$nombre;

   $id = $_POST['id'];
   $usuario = $_POST['usuario'];

   $update = mysqli_query($con,"UPDATE musuario set nombre = '$usuario' where idusuario = '$id' ");
   
   if($update == true){
       $alert = 'Actualizado correctamente';
   }else{
       $alert = 'Erro '.mysqli_error($con);
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

    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="alert alert-primary" role="alert">
                <?php
                    echo $alert
                ?>
            </div>
        </div>
        <div class="col-sm-4"></div>
    </div>
</body>

</html>