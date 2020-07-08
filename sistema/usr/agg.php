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

    $preg1 = $_POST['fiebre'];
    $preg2 = $_POST['ts'];
    $preg3 =$_POST['dc'];
    $preg4 = $_POST['sn'];
    $preg5 =$_POST['dm'];
    $preg6 =$_POST['oi'];
    $preg7 =$_POST['dg'];
    $preg8 =$_POST['dr'];
    $preg9 =$_POST['sos'];
    $preg10 =$_POST['fma'];
  
    $acepto = $_POST['si'];
    $resultado = $preg1 + $preg2 + $preg3 + $preg4 + $preg5 + $preg6 + $preg7 + $preg8 + $preg9;
    $fecha = date('Y-m-d');

    $insert = mysqli_query($con,"INSERT INTO respuesta (idusuario,preg1,preg2,preg3,preg4,preg5,preg6,preg7,preg8,preg9,acepto,resultado,fecha_h) 
                                                values ('$idusu','$preg1','$preg2','$preg3','$preg4','$preg5','$preg6','$preg7','$preg8','$preg9','$acepto','$resultado','$fecha'  ) ");

    if($insert == true){
        $alert = '<a href="index.php" class="btn btn-info fas fa-arrow-left"> Regresar a inicio</a>';
        $up = mysqli_query($con,"UPDATE musuario set respuesta = '$resultado',fecha_h = '$fecha',respondio = '$acepto'  where idusuario = '$idusu' ");
    }else{
        $alert =  "Nope: ".mysqli_error($con);
    }
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
<div class="col-sm-4"></div>
<div class="col-sm-4">
<div class="alert alert-primary" role="alert">
  <?php
  echo $alert;
  ?>
</div>
</div>
<div class="col-sm-4"></div>
</body>
</html>