<?php
    session_start();
    require_once '../../php/conexion.php';
    require_once 'empty.php';
    $idusu = $_SESSION['id'];

    $query = mysqli_query($con,"SELECT nombre from musuario where idusuario = '$idusu' ");
    $t = mysqli_num_rows($query);
    if($t > 0){
        while($data = mysqli_fetch_array($query)){
            $nombre = $data['nombre'];
        }
    }
    //echo "bienvenido:  ".$nombre;
    
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
    <nav class="navbar navbar-expand-lg navbar-ligth"  style="background-color: #e3f2fd;">
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
  <div class="col-sm-2"></div>
  <div class="col-sm-8">
    <!-- <style>
        table{
          border: 1px solid;
        }
        th,td{
          border: 1px solid;
        }

    </style> -->
    <table class="table table-bordered table-hover">
    <thead class="thead-dark">
        <tr>
            <th>Nombre</th>
            <th>Respondió</th>
            <th>Resultado</th>
        </tr>
    </thead>
    <?php
    $hoy = date('Y-m-d');
    $uru = mysqli_query($con,"SELECT nombre,respuesta,respondio,fecha_h
                              FROM musuario  ");
    $urs = mysqli_num_rows($uru);
    if($urs > 0){
        while($y = mysqli_fetch_array($uru)){
          $nombre = $y['nombre'];
          $resultado = $y['respuesta'];
          $respondio = $y['respondio'];
          $fecha = $y['fecha_h'];
          if($respondio == 1){
            $respondio = "Si";
          }if($respondio == 0){
            $respondio = "No";
          }
        
        if($fecha == $hoy and $respondio == 0){
          $n = '<p style="color:blue;font-weight:bold">'.$nombre.'</p>';
          $re = '<p  style="color:blue;font-weight:bold">'.$respondio.'</p>';
          $res = '<p  style="color:blue;font-weight:bold">'.$resultado.'</p>';
        }else if($fecha == $hoy and $respondio > 0){
          $n = '<p style="color:red;font-weight:bold">'.$nombre.'</p>';
          $re = '<p  style="color:red;font-weight:bold">'.$respondio.'</p>';
          $res = '<p  style="color:red;font-weight:bold">'.$resultado.'</p>';
        }else if($fecha != $hoy and $respondio == 0 ){
          $n = '<p style="color:yellow;font-weight:bold">'.$nombre.'</p>';
          $re = '<p  style="color:yellow;font-weight:bold">'.$respondio.'</p>';
          $res = '<p  style="color:yellow;font-weight:bold">'.$resultado.'</p>';
        }else if($fecha != $hoy and $respondio > 0 ){
          $n = '<p style="color:#F2F45B;font-weight:bold">'.$nombre.'</p>';
          $re = '<p  style="color:#F2F45B;font-weight:bold">'.$respondio.'</p>';
          $res = '<p  style="color:#F2F45B;font-weight:bold">'.$resultado.'</p>';
        }
    
    ?>
    <tbody>
        <tr>
            <td><?php echo $n?></td>
            <td><?php echo $re?></td>
            <td><?php echo $res?></td>
        </tr>
    </tbody>

    <?php
        }
    }
    ?>
</table>
</div>
</div>
</body>
</html>
