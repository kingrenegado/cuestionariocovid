<?php
    session_start();
    require_once '../../php/conexion.php';
    require_once 'empty.php';
    $idusu = $_SESSION['id'];

    $query = mysqli_query($con,"SELECT nombre from musuario where idusuario = '$idusu'  ");
    $t =  mysqli_num_rows($query);
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

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
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
      <li class="nav-item">
        <a class="nav-link" href="visu.php">Visualizar</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="<?php echo $nombre?>" disabled>
      <a href="salir.php" class="btn btn-outline-danger"> Salir</a>
    </form>
  </div>
</nav>
<br>
<div class="col-sm-12">
   <div class="col-sm-2"></div>
   <div class="col-sm-10">
   <p><?php
    $hoy = date('d-m-Y');
    echo $hoy?></p>
   </div>
</div>
<br>
<div class="row">
  <div class="col-sm-2">
    <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
    <a href="lista.php" class="btn btn-success fas fa-file-download"> Descargar</a>
    </div>
    <div class="col-sm-4"></div>
    </div>
  </div>
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
            <th>Visualizar</th>
        </tr>
    </thead>
    <?php
    $hoy = date('Y-m-d');
    $uru = mysqli_query($con,"SELECT musuario.nombre,musuario.respuesta,musuario.respondio,musuario.fecha_h
                              FROM musuario 
                              where musuario.id_cusuario = 2  order by nombre asc ");
    $urs = mysqli_num_rows($uru);
    if($urs > 0){
        while($y = mysqli_fetch_array($uru)){
          $nombre = $y['nombre'];
          $resultado = $y['respuesta'];
          $respondio = $y['respondio'];
          $fecha = $y['fecha_h'];
          // $res= $y['resultado'];
          // if($respondio == 1){
          //   $respondio = "Si";
          // }if($respondio == 0){
          //   $respondio = "No";
          // }
          $query = mysqli_query($con,"SELECT idusuario from musuario where nombre = '$nombre'  ");
         $q = mysqli_num_rows($query);
         if($q > 0){
           while($k = mysqli_fetch_array($query)){
             $idusuario = $k['idusuario'];
           }
         }     
        
        if($fecha == $hoy && $respondio == 1 && $resultado == 0){
         $n = '<td class="table-info">' .$nombre.'</td>';
         $re = '<td class="table-info">'.'$respondio'.'</td>';
         $res = '<td class="table-info">' .$resultado.'</td>';
         $inf = '<td class="table-info"> <center><a href="visual.php?id='.$idusuario.'" class="btn btn-danger fas fa-search" target="_blank"></a></center> </td>';
        }else if($fecha == $hoy and $respondio > 0 && $resultado > 0 ){
          $n = '<td class ="table-danger">'.$nombre.'</td>';
          $re = '<td class ="table-danger">'.$respondio.'</td>';
          $res = '<td class ="table-danger">'.$resultado.'</td>';
          $inf = '<td class ="table-danger"> <center><a href="visual.php?id='.$idusuario.'" class="btn btn-danger fas fa-search" target="_blank"></a></center> </td>';
        }else if($fecha != $hoy){
          $n = '<td class="table-warning">'.$nombre.'</td>';
          $re = '<td class ="table-warning">'.$respondio.'</td>';
          $res = '<td class="table-warning">'.$resultado.'</td>';
          $inf = '<td class="table-warning"> <center> <a href="" class="btn btn-danger fas fa-search" disabled></a></center> </td>';
        }
    
    ?>
    <tbody>
        <tr>
            <?php echo $n?>
            <?php echo $re?>
            <?php echo $res?>
            <?php echo $inf?>
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
