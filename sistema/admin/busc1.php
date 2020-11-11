<?php
    session_start();
    require_once '../../php/conexion.php';

    $sql = "SELECT nombre,idusuario from musuario where id_cusuario = 2 order by nombre asc";

    $result = mysqli_query($con,$sql);
?>

<label>Usuario</label>
<select name="idUsuario" id="idUsuario" class="form-control">
    <?php
        while($ver = mysqli_fetch_array($result)){
    ?>
        <option value="<?php echo $ver['idusuario']?>"><?php echo $ver['nombre']?></option>
    <?php
    }
    ?>
</select>

<script type="text/javascript">
    $(document).ready(function(){
        $('#idUsuario').select2();
        $.fn.select2.defaults.set('language', 'es');
    });
</script>