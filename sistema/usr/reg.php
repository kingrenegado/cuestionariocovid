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
    <div class="row p-4">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <p>Registrar Usuario</p>
                </div>
                <div class="card-body">
                    <form action="regist.php" method="post">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="nombre" class="form-label">Nombre Completo: </label>
                                <input type="text" class="form-control" name="nombre" placeholder="Nombre Completo"
                                    required><br>
                            </div><br>
                            <div class="col-sm-12">
                                <label for="nomusu" class="form-label">Nombre de usuario: </label>
                                <small>
                                    <p>El nombre de usuario se da por la letra del <strong>Primer nombre</strong>
                                        seguido del <strong>Primer apellido</strong></p>
                                </small>
                                <input type="text" name="nomusu" id="nomusu" class="form-control"
                                    placeholder="Ejemplo: uxxxxx" required><br>
                            </div><br>
                            <div class="col-sm-12">
                                <label for="pass" class="form-label">Contraseña: </label>
                                <small>
                                    <p>La contraseña se da por la letra del <strong>Primer nombre</strong> seguido del
                                        <strong>Primer apellido </strong> seguido de <strong>fs</strong></p>
                                </small>
                                <input type="password" name="pass" id="pass" class="form-control"
                                    placeholder="Ejemplo: uxxxxx" required><br>
                            </div><br>
                            <div class="col-sm-6">
                                <label for="area" class="form-label">Área: </label>
                                <select name="area" id="area" class="form-control">
                                    <option selected="false">----Selecciona una opción----</option>
                                    <?php
                                            $busq =mysqli_query($con,"SELECT id_carea,area FROM carea ORDER BY area ASC");
                                            while($k = mysqli_fetch_array($busq)){
                                                $id = $k['id_carea'];
                                                $area = $k['area'];
                                            
                                        ?>
                                    <option value="<?php echo $id?>"><?php echo $area?></option>
                                    <?php
                                            }
                                        ?>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="area" class="form-label">Puesto: </label>
                                <select name="puesto" id="puesto" class="form-control">
                                    <option selected="false">----Selecciona una opción----</option>
                                    <?php
                                            $busq =mysqli_query($con,"SELECT id_cpuesto,puesto FROM cpuesto ORDER BY puesto ASC");
                                            while($k = mysqli_fetch_array($busq)){
                                                $id = $k['id_cpuesto'];
                                                $puesto = $k['puesto'];
                                            
                                        ?>
                                    <option value="<?php echo $id?>"><?php echo $puesto?></option>
                                    <?php
                                            }
                                        ?>
                                </select><br>
                            </div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-6">
                                <button class="btn btn-success">Registrar Usuario</button>
                            </div>
                            <div class="col-sm-2"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>

    <br><br>
    </div>
    </div>
</body>

</html>