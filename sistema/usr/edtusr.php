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

   $sql = "SELECT musuario.nombre,musuario.idusuario FROM musuario WHERE idusuario = '$usuario' ";
   $result = mysqli_query($con,$sql);
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

    <p></p>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <p>Editar Usuario</p>
                </div>
                <div class="card-body">
                    <form action="editausr.php" method="post">
                        <label class="form-label">Nombre</label>
                        <?php
                            while($m= mysqli_fetch_array($result)):
                                $nom = $m['nombre'];
                                $id = $m['idusuario'];
                        ?>
                        <input type="text" class="form-control" name="usuario" value="<?php echo $nom?>">
                        <?php
                            endwhile
                        ?>
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <p></p>
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6">
                                <button class="btn btn-warning" style="color:white"><i class="fas fa-user-edit"></i> Editar Usuario</button>
                            </div>
                            <div class="col-sm-4"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-4"></div>
    </div>
</body>

</html>