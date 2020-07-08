<?php
    $alert = "";
    session_start();
    

    if(!empty($_POST)){
        if(empty($_POST['nomusuario']) || empty($_POST['password'])){
            $alert = "Todos los campos deben ser llenados";
        }else{
        require_once 'php/conexion.php';
        $user= mysqli_real_escape_string($con,$_POST['nomusuario']);
        $clave= mysqli_real_escape_string($con,$_POST['password']);

       $busqueda = mysqli_query($con,"SELECT musuario.nombre,musuario.nomusuario,carea.area,cpuesto.puesto,cusuario.tipo,musuario.correo,musuario.id_cusuario,musuario.idusuario FROM `musuario` INNER JOIN carea ON carea.id_carea= musuario.id_carea INNER JOIN cpuesto on cpuesto.id_cpuesto = musuario.id_cpuesto INNER JOIN cusuario on cusuario.id_cusuario = musuario.id_cusuario WHERE nomusuario='$user' and password='$clave' ");
       $cont = mysqli_num_rows($busqueda);

       if($cont > 0){
        $data = mysqli_fetch_array($busqueda);
        $_SESSION['active'] = true;
        $_SESSION['id'] = $data['idusuario'];
        $_SESSION['id_cusuario'] = $data['id_cusuario'];


        if($data['id_cusuario'] == 1){
            header('location:sistema/admin/');
        }elseif($data['id_cusuario'] == 2){
            header('location:sistema/usr');
        }
       }else{
           $alert = "Usario y/o contraseña incorrecta: ".mysqli_error($con);
       }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inicio de sesión</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
<div class="container">
		<div class="icon">
			
			<span class="encabezado"> Cuestionario</span>
		</div>
		<div class="container-form">
			
			<form action="" method="post" name="formentra">
				<div class="input-group input-group-lg">
					
					<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
					<input type="text" name="nomusuario" class="form-control" placeholder="Nombre de Usuario" id="nomusuario" required>
				</div>
				<br>
				<div class="input-group input-group-lg">
					<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
					<input type="password" name="password" class="form-control" placeholder="Contraseña" required>
				</div>
				<br>
                <button class="btn btn-lg btn-primary btn-block btn-signin" id="ingreso" type="Submit">Entrar</button>
                <br>
                <?php
                    if(!empty($alert)){

                    
                ?>

                <div class="alert alert-danger" role="alert">
                <?php
                    echo $alert;
                ?>
                </div>

                <?php
                    }
                ?>
			</form>
		</div>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>
</html>