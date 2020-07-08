<?php

require('fpdf.php');

require_once '../../php/conexion.php';
session_start();
if($_SESSION['active'] != true){
    session_destroy();
    header('location: ../index.php');
  }
 $id = $_REQUEST['id'];
$hoy = date('Y-m-d');



$query = mysqli_query($con,"SELECT respuesta.preg1,respuesta.preg2,respuesta.preg3,
                            respuesta.preg4,respuesta.preg5,respuesta.preg6,respuesta.preg7,
                            respuesta.preg8,respuesta.preg9,respuesta.preg10,respuesta.fecha_h,
                            musuario.nombre 
                            FROM respuesta 
                            INNER JOIN musuario on musuario.idusuario = respuesta.idusuario 
                            where respuesta.idusuario =  '$id'  and  respuesta.fecha_h = '$hoy' ");

$q = mysqli_num_rows($query);
if($q > 0){
  while($k = mysqli_fetch_array($query)){
    $nombre = $k['nombre'];
    $fecha= $k['fecha_h'];
    $preg1 = $k['preg1'];
    $preg2 = $k['preg2'];
    $preg3 = $k['preg3'];
    $preg4 = $k['preg4'];
    $preg5 = $k['preg5'];
    $preg6 = $k['preg6'];
    $preg7 = $k['preg7'];
    $preg8 = $k['preg8'];
    $preg9 = $k['preg9'];
    $preg10 = $k['preg10'];

    if($preg1 == 0){
        $preg1 = "No";
    }elseif($preg1 == 1){
        $preg1 = "Si";
    }
    
    if($preg2 == 0){
        $preg2 = "No";
    }elseif($preg2 == 1){
        $preg2 = "Si";
    }

    if($preg3 == 0){
        $preg3 = "No";
    }elseif($preg3 == 1){
        $preg3 = "Si";
    }

    if($preg4 == 0){
        $preg4 = "No";
    }elseif($preg4 == 1){
        $preg4 = "Si";
    }

    if($preg5 == 0){
        $preg5 = "No";
    }elseif($preg5 == 1){
        $preg5 = "Si";
    }

    if($preg6 == 0){
        $preg6 = "No";
    }elseif($preg6 == 1){
        $preg6 = "Si";
    }

    if($preg7 == 0){
        $preg7 = "No";
    }elseif($preg7 == 1){
        $preg7 = "Si";
    }

    if($preg8 == 0){
        $preg8 = "No";
    }elseif($preg8 == 1){
        $preg8 = "Si";
    }

    if($preg9 == 0){
        $preg9 = "No";
    }elseif($preg9 == 1){
        $preg9 = "Si";
    }

    if($preg10 == 0){
        $preg10 = "No";
    }elseif($preg10 == 1){
        $preg10 = "Si";
    }
  }
}



$pdf=new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Image('img/logo.png',50,0, 100, 70,'PNG');
$pdf->Cell(190,40,'',0,1);
$pdf->Cell(50,15,'Cuestionario de detección de signos y síntomas ',0,1);
$pdf->Cell(50,5,'',0,1);
$pdf->Cell(50,5,'',0,1);
$pdf->SetFont('Arial',"B",14);
$pdf->Cell(190,10,'',0,1);
$pdf->Cell(65,0,"Nombre: ".$nombre,0,1,"C");
$pdf->Cell(190,10,'',0,1);
$pdf->Cell(39,0,"Fecha: ".$fecha,0,1,"C");
$pdf->Cell(190,20,'',0,1);
$pdf->Cell(0,0,"1.- En los últimos 7 días ha tenido alguno de los siguientes síntomas:",0,1,"C");
$pdf->Cell(190,10,'',0,1);
$pdf->Cell(50,0,"Fiebre: ".$preg1,0,1,"C");
$pdf->Cell(190,10,'',0,1);
$pdf->Cell(50,0,"Tos seca: ".$preg2,0,1,"C");
$pdf->Cell(190,10,'',0,1);
$pdf->Cell(65,0,"Dolor de cabeza: ".$preg3,0,1,"C");
$pdf->Cell(190,10,'',0,1);
$pdf->Cell(60,0,"Secresión nasal: ".$preg4,0,0,"C");
$pdf->Cell(190,10,'',0,1);
$pdf->Cell(60,0,"Dolor muscular: ".$preg5,0,0,"C");
$pdf->Cell(190,10,'',0,1);
$pdf->Cell(60,0,"Ojos irritados: ".$preg6,0,0,"C");
$pdf->Cell(190,10,'',0,1);
$pdf->Cell(60,0,"Dolor de garganta: ".$preg7,0,0,"C");
$pdf->Cell(190,10,'',0,1);
$pdf->Cell(60,0,"Dificultad respiratoria: ".$preg8,0,0,"C");
$pdf->Cell(190,20,'',0,1);
$pdf->Cell(0,0,"2.- En los últimos 7 días ha estado en contacto con una persona sospechosa por COVID-19",0,1,"C");
$pdf->Cell(190,5,'',0,1);
$pdf->Cell(0,0,"o un caso ya confirmado sin haber usado el EPP (cubrebocas y en el caso de estar a menos ",0,1,"C");
$pdf->Cell(190,5,'',0,1);
$pdf->Cell(0,0,"de 1.5 metros de distancia cubrebocas y careta)s: ".$preg9,0,1,"C");
$pdf->Cell(190,10,'',0,1);
$pdf->Cell(0,0,"Presenta síntomas	de caso sospechoso o fiebre (>=37.5°C): ".$preg10,0,1,"C");
$pdf->Output();

?>