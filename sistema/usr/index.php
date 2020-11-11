<?php
    
    session_start();
    require_once '../../php/conexion.php';
    require_once 'empty.php';

    date_default_timezone_set('UTC');

    date_default_timezone_set("America/Mexico_City");
    
    $idusu = $_SESSION['id'];
    $_SESSION['id_cusuario'];

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
    <br><br>

    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <label>Instrucciones: Llenar solo una opción por pregunta, si llega a elegir dos casillas en la misma
                pregunta se tomará como no la respuesta</label>
        </div>
    </div>
    <br>
    <?php
        $hoy = date('Y-m-d');
        $consulta = mysqli_query($con,"SELECT * from musuario where idusuario = '$idusu' and fecha_h = '$hoy' ");
        $cc = mysqli_num_rows($consulta);

        if($cc == 0){
    ?>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10 col-xs-12 col-lg-10">
            <div class="card" style="border-color:#A9A9A9;">
                <div class="card-body">
                    <form action="agg1.php" method="post">
                        <div id="fondo" style="display: block;
                            margin: auto;
                            background-repeat: no-repeat;
                            background-image: url('../../img/agua.png');
                            background-position: 380px 160px;
                            background-size:280px;
                            ">
                            <!-- <img src="../../img/logo.bmp" class="img"> -->
                            <div class="form-group row">

                                <div class="col-sm-6 col-xs-12 col-md-6 col-lg-6">
                                    <label>SÍNTOMAS</label>
                                </div>
                                <div class="col-sm-3">
                                    <center>
                                        <label>Si</label>
                                    </center>
                                </div>
                                <div class="col-sm-3">
                                    <label>No</label>
                                </div>
                                <div class="col-sm-6">
                                    <label>Tos seca</label>
                                </div>
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-6"></div>
                                        <div class="col-sm-3">
                                            <input class="form-check-input" type="checkbox" name="ts" id="inlineRadio1"
                                                value="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-4">
                                            <input class="form-check-input" type="checkbox" name="ts" id="inlineRadio1"
                                                value="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Fiebre</label>
                                </div>
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-6"></div>
                                        <div class="col-sm-3">
                                            <input class="form-check-input" type="checkbox" name="fiebre"
                                                id="inlineRadio1" value="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-4">
                                            <input class="form-check-input" type="checkbox" name="fiebre"
                                                id="inlineRadio1" value="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Dificultad respiratoria(dato de gravedad)</label>
                                </div>
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-6"></div>
                                        <div class="col-sm-3">
                                            <input class="form-check-input" type="checkbox" name="dr" id="inlineRadio1"
                                                value="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-4">
                                            <input class="form-check-input" type="checkbox" name="dr" id="inlineRadio1"
                                                value="0">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label>Dolor de cabeza</label>
                                </div>
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-6"></div>
                                        <div class="col-sm-3">
                                            <input class="form-check-input" type="checkbox" name="dc" id="inlineRadio1"
                                                value="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-4">
                                            <input class="form-check-input" type="checkbox" name="dc" id="inlineRadio1"
                                                value="0">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label>Dolor muscular</label>
                                </div>
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-6"></div>
                                        <div class="col-sm-3">
                                            <input class="form-check-input" type="checkbox" name="dm" id="inlineRadio1"
                                                value="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-4">
                                            <input class="form-check-input" type="checkbox" name="dm" id="inlineRadio1"
                                                value="0">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label>Dolor de articulaciones</label>
                                </div>
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-6"></div>
                                        <div class="col-sm-3">
                                            <input class="form-check-input" type="checkbox" name="dar" id="inlineRadio1"
                                                value="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-4">
                                            <input class="form-check-input" type="checkbox" name="dar" id="inlineRadio1"
                                                value="0">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label>Dolor de garganta</label>
                                </div>
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-6"></div>
                                        <div class="col-sm-3">
                                            <input class="form-check-input" type="checkbox" name="dg" id="inlineRadio1"
                                                value="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-4">
                                            <input class="form-check-input" type="checkbox" name="dg" id="inlineRadio1"
                                                value="0">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label>Escalofrios</label>
                                </div>
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-6"></div>
                                        <div class="col-sm-3">
                                            <input class="form-check-input" type="checkbox" name="esc" id="inlineRadio1"
                                                value="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-4">
                                            <input class="form-check-input" type="checkbox" name="esc" id="inlineRadio1"
                                                value="0">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label>Dolor torácico</label>
                                </div>
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-6"></div>
                                        <div class="col-sm-3">
                                            <input class="form-check-input" type="checkbox" name="dto" id="inlineRadio1"
                                                value="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-4">
                                            <input class="form-check-input" type="checkbox" name="dto" id="inlineRadio1"
                                                value="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Secreción nasal</label>
                                </div>
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-6"></div>
                                        <div class="col-sm-3">
                                            <input class="form-check-input" type="checkbox" name="sn" id="inlineRadio1"
                                                value="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-4">
                                            <input class="form-check-input" type="checkbox" name="sn" id="inlineRadio1"
                                                value="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Perdida de olfato</label>
                                </div>
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-6"></div>
                                        <div class="col-sm-3">
                                            <input class="form-check-input" type="checkbox" name="pof" id="inlineRadio1"
                                                value="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-4">
                                            <input class="form-check-input" type="checkbox" name="pof" id="inlineRadio1"
                                                value="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Perdida del sentido del gusto</label>
                                </div>
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-6"></div>
                                        <div class="col-sm-3">
                                            <input class="form-check-input" type="checkbox" name="psg" id="inlineRadio1"
                                                value="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-4">
                                            <input class="form-check-input" type="checkbox" name="psg" id="inlineRadio1"
                                                value="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Comezón y ardor en los ojos</label>
                                </div>
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-6"></div>
                                        <div class="col-sm-3">
                                            <input class="form-check-input" type="checkbox" name="oi" id="inlineRadio1"
                                                value="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-4">
                                            <input class="form-check-input" type="checkbox" name="oi" id="inlineRadio1"
                                                value="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 p-4">
                                    <label style="text-align:justify">
                                        En los últimos 7 días ha estado en contacto con una persona sospechosa por
                                        COVID-19 o un caso ya confirmado sin haber usado el Equipo de Protección
                                        Personal (cubrebocas y en el caso de estar a menos de 1.5 metros de distancia
                                        cubrebocas y careta)
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-4">
                                            <input class="form-check-input" type="checkbox" name="sos" id="inlineRadio1"
                                                value="1">
                                            <label>Si</label>
                                        </div>
                                        <div class="col-sm-4"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-4">
                                            <input class="form-check-input" type="checkbox" name="sos" id="inlineRadio1"
                                                value="0">
                                            <label>No</label>
                                        </div>
                                        <div class="col-sm-4"></div>
                                    </div>
                                </div>




                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-11">
                                            <input class="form-check-input" type="checkbox" id="autoSizingCheck2"
                                                name="si" value="1" required>
                                            <label class="form-check-label" for="autoSizingCheck2">
                                                Por este medio acepto que dije la verdad
                                            </label>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-4">
                                        <button class="btn btn-success">Aceptar</button>
                                    </div>
                                    <div class="col-sm-4"></div>
                                </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
    </div>
    <p></p>
    <p></p>
    <?php
        }else{
    ?>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="alert alert-success" role="alert">
                <?php
            $alert = 'Ya respondió el cuestionario del día de hoy ';
        ?>
                <?php echo $alert?>
                <?php 
        $nhoy = date("d/m/Y", strtotime($hoy));
        echo $nhoy;

        ?>
            </div>
        </div>

        <div class="col-sm-4"></div>
        <?php 
$nnhoy = date('Y-m-d');
        $alert = '';
            $consulta1 = mysqli_query($con,"SELECT resultado from nrespuesta where idusuario =  '$idusu' and fechah = '$nnhoy' ");
            $c = mysqli_num_rows($consulta1);
            if($c > 0){
              
        ?>
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <?php
while($kp = mysqli_fetch_array($consulta1)){
    $resultado3 = $kp['resultado'];
}
if($resultado3 > 0){
    $alert = '<p> Favor de contactar a su jefe inmediato o responsable de comité</p>';
?>
            <div class="alert alert-danger" role="alert">
                <?php
    echo $alert;
    ?>
            </div>
            <?php
}
} 
?>
        </div>

        <?php
}
?>
    </div>
    </div>
</body>

</html>