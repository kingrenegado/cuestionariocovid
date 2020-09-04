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
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php"> <img src="../../img/logo.bmp" style="width:65px"> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Inicio</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="<?php echo $nombre?>" disabled>
      <a href="salir.php" class="btn btn-outline-danger"> Salir</a>
    </form>
  </div>
</nav>
<br><br>

<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <label>Instrucciones: Llenar solo una opción por pregunta, si llega a elegir dos casillas en la misma pregunta se tomará como no la respuesta</label>
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
            <div class="card">
                <div class="card-body">
                    <form action="agg1.php" method="post">
                    <div id="fondo"
                        style="display: block;
                            margin: auto;
                            background-repeat: no-repeat;
                            background-image: url('../../img/agua.png');
                            background-position: 380px 160px;
                            background-size:280px;
                            "
                    >
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
                                        <input class="form-check-input" type="checkbox" name="ts" id="inlineRadio1" value="1">                   
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-4">
                                        <input class="form-check-input" type="checkbox" name="ts" id="inlineRadio1" value="0">
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
                                        <input class="form-check-input" type="checkbox" name="fiebre" id="inlineRadio1" value="1">                   
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-4">
                                        <input class="form-check-input" type="checkbox" name="fiebre" id="inlineRadio1" value="0">
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
                                        <input class="form-check-input" type="checkbox" name="dr" id="inlineRadio1" value="1">                   
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-4">
                                        <input class="form-check-input" type="checkbox" name="dr" id="inlineRadio1" value="0">
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
                                        <input class="form-check-input" type="checkbox" name="dc" id="inlineRadio1" value="1">                   
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-4">
                                        <input class="form-check-input" type="checkbox" name="dc" id="inlineRadio1" value="0">
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
                                        <input class="form-check-input" type="checkbox" name="dm" id="inlineRadio1" value="1">                   
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-4">
                                        <input class="form-check-input" type="checkbox" name="dm" id="inlineRadio1" value="0">
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
                                        <input class="form-check-input" type="checkbox" name="dar" id="inlineRadio1" value="1">                   
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-4">
                                        <input class="form-check-input" type="checkbox" name="dar" id="inlineRadio1" value="0">
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
                                        <input class="form-check-input" type="checkbox" name="dg" id="inlineRadio1" value="1">                   
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-4">
                                        <input class="form-check-input" type="checkbox" name="dg" id="inlineRadio1" value="0">
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
                                        <input class="form-check-input" type="checkbox" name="esc" id="inlineRadio1" value="1">                   
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-4">
                                        <input class="form-check-input" type="checkbox" name="esc" id="inlineRadio1" value="0">
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
                                        <input class="form-check-input" type="checkbox" name="dto" id="inlineRadio1" value="1">                   
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-4">
                                        <input class="form-check-input" type="checkbox" name="dto" id="inlineRadio1" value="0">
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
                                        <input class="form-check-input" type="checkbox" name="sn" id="inlineRadio1" value="1">                   
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-4">
                                        <input class="form-check-input" type="checkbox" name="sn" id="inlineRadio1" value="0">
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
                                        <input class="form-check-input" type="checkbox" name="pof" id="inlineRadio1" value="1">                   
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-4">
                                        <input class="form-check-input" type="checkbox" name="pof" id="inlineRadio1" value="0">
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
                                        <input class="form-check-input" type="checkbox" name="psg" id="inlineRadio1" value="1">                   
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-4">
                                        <input class="form-check-input" type="checkbox" name="psg" id="inlineRadio1" value="0">
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
                                        <input class="form-check-input" type="checkbox" name="oi" id="inlineRadio1" value="1">                   
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-4">
                                        <input class="form-check-input" type="checkbox" name="oi" id="inlineRadio1" value="0">
                                    </div>
                                </div> 
                            </div>                            
                            <div class="col-sm-12 p-4">
                                <label style="text-align:justify">
                                En los últimos 7 días ha estado en contacto con una persona sospechosa por COVID-19 o un caso ya confirmado sin haber usado el Equipo de Protección Personal (cubrebocas y en el caso de estar a menos de 1.5 metros de distancia cubrebocas y careta)
                                </label>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-4">
                                    <input class="form-check-input" type="checkbox" name="sos" id="inlineRadio1" value="1">
                                    <label>Si</label>
                                    </div>
                                    <div class="col-sm-4"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-4">
                                    <input class="form-check-input" type="checkbox" name="sos" id="inlineRadio1" value="0">
                                    <label>No</label>
                                    </div>
                                    <div class="col-sm-4"></div>
                                </div>
                            </div>
                            
                            
                           
                           
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-11">
                                     <input class="form-check-input" type="checkbox" id="autoSizingCheck2" name="si" value="1" required>
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
        Ya respondió el cuestionario del día de hoy 
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