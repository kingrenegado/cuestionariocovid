<?php
    
    session_start();
    require_once '../../php/conexion.php';
    require_once 'empty.php';

    date_default_timezone_set('UTC');

    date_default_timezone_set("America/Mexico_City");
    
    $idusu = $_SESSION['id'];
    $usuario = $_REQUEST['id'];

    $query = mysqli_query($con,"SELECT nombre from musuario where idusuario = '$idusu' ");
    $t = mysqli_num_rows($query);
    if($t > 0){
        while($data = mysqli_fetch_array($query)){
            $nombre = $data['nombre'];
        }
    }
   // echo "bienvenido:  ".$nombre;
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
                <form action="eliusr.php" method="post">
                    <div class="card-header">
                        <p class="fas fa-user-minus"> Eliminar Usuario</p>
                    </div>
                    <div class="card-body">
                        <p>Está seguro que desea eliminar el usuario: 

                            <?php
                            $sql = "SELECT musuario.nombre,musuario.idusuario FROM musuario WHERE idusuario = '$usuario' ";
                            $result = mysqli_query($con,$sql);
                                while($f = mysqli_fetch_array($result)){
                                    $nom = $f['nombre'];
                                    $idusuario = $f['idusuario'];
                                }
                                echo "<p></p>";
                                echo $nom
                            ?>
                            <div class="row p-4">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-6">
                                <input type="hidden" name="idelim" value="<?php echo $idusuario?>">
                                <button class="btn btn-danger fas fa-trash"> Eliminar</button>
                                </div>
                                <div class="col-sm-4"></div>
                            </div>
                        </p>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-4"></div>
    </div>
</body>

</html>