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

 $idusuario = $_POST['idUsuario'];
 $f1 = $_POST['f1'];
 $f2 = $_POST['f2'];                                       

?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=big5">
    
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
    <p>Codigo de colores:</p>
    <p class="alert-danger"> Tiene síntomas</p>
    <p class="alert-info"> No tiene síntomas</p>
</div>
<div class="col-sm-12">
    <div class= "row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <p><small style="color:red">*</small> Los días que no aparezcan no fueron llenados</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>
<div class="col-sm-12">
   <div class="col-sm-2"></div>
   <div class="col-sm-10">
       <?php
        $busqueda = mysqli_query($con,"SELECT nombre from musuario where idusuario = '$idusuario' ");
        while($g = mysqli_fetch_array($busqueda)):
            $nom = $g['nombre'];
       ?>
   <?php echo '<p>Resultado históricos del usuario </p>'.$nom?>
   <?php 
   endwhile;
   ?>
   </div>
</div>
<br>
<div class="row">
  <div class="col-sm-4">
    
  </div>
  <div class="col-sm-4">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>Fecha</td>
                    <td>Resultado</td>
                    <td>Visualizar</td>
                </tr>
            </thead>
            <?php
             $consulta = mysqli_query($con,"SELECT id_respuesta,fechah,resultado from nrespuesta where idusuario = '$idusuario' and fechah BETWEEN '$f1' and '$f2'");
             while($f = mysqli_fetch_array($consulta)):
              $idrespuesta = $f['id_respuesta'];
                if($f['resultado'] == 0){
                    $resul = '<td class="table-info">'.$f['resultado'].'</td>';
                    $fecha = '<td class="table-info">'.$f['fechah'].'</td>';
                    $visu = '<td class="table-info"><a class="btn btn-danger fas fa-search" href="visual1.php?id='.$idrespuesta.'" target="_blank"></a></td>';
                }elseif($f['resultado'] > 0){
                    $resul = '<td class="table-danger">'.$f['resultado'].'</td>';
                    $fecha = '<td class="table-danger">'.$f['fechah'].'</td>';
                    $visu = '<td class="table-danger"><center><a class="btn btn-danger fas fa-search mx-auto" href="visual1.php?id='.$idrespuesta.'" target="_blank"></a></center></td>';
                }
            ?>
            <tbody>
                <tr>
                  <?php echo $fecha?>
                  <?php echo $resul?>
                 <center> <?php echo $visu?> </center>
                </tr>
            </tbody>
            <?php
            endwhile;
            ?>
        </table>
</div>
</div>
</body>
</html>
