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

   $sql = "SELECT musuario.nombre,musuario.idusuario FROM musuario WHERE id_cusuario = 2 ORDER BY nombre ASC";
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
    <br><br>

    <div class="row">
        <div class="col-sm-4 col-xs-12 col-md-4 col-lg-4"></div>
        <div class="col-sm-4 col-lg-4 col-md-4 col-xs-12">
            <form action="edtusr.php" method="post">
                <div class="card">
                    <div class="card-header">
                        <p>Editar Usuario</p>
                    </div>
                    <div class="card-body">
                        <label class="form-label">Selecciona un Usuario</label>
                        <select name="usuario" id="usuario" class="form-control-input-sm form-control">
                            <option value="0">Selecciona un Usuario</option>
                            <?php
                                while($ver= mysqli_fetch_array($result)):
                            ?>
                                <option value="<?php echo $ver['idusuario']?>"><?php echo $ver['nombre']?></option>
                            <?php
                                endwhile
                            ?>
                        </select><p></p>
                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4">
                                <button class="btn btn-warning" style="color:#EBE9E8"> <i class="fas fa-user-edit"></i> Editar</button>
                            </div>
                            <div class="col-sm-4"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {
        $('#usuario').select2();
    })
</script>