<?php

require('fpdf.php');

    date_default_timezone_set('UTC');

    date_default_timezone_set("America/Mexico_City");
    

require_once '../../php/conexion.php';
session_start();
if($_SESSION['active'] != true){
    session_destroy();
    header('location: ../index.php');
  }
 $id = $_REQUEST['id'];
$hoy = date('Y-m-d');



$query = mysqli_query($con,"SELECT nrespuesta.preg1,nrespuesta.preg2,nrespuesta.preg3,
                            nrespuesta.preg4,nrespuesta.preg5,nrespuesta.preg6,nrespuesta.preg7,
                            nrespuesta.preg8,nrespuesta.preg9,nrespuesta.preg10,nrespuesta.preg11,nrespuesta.preg12,nrespuesta.preg13,nrespuesta.preg14,nrespuesta.fechah,
                            musuario.nombre 
                            FROM nrespuesta 
                            INNER JOIN musuario on musuario.idusuario = nrespuesta.idusuario 
                            where nrespuesta.idusuario =  '$id'  and  nrespuesta.fechah = '$hoy' ");

$q = mysqli_num_rows($query);
if($q > 0){
  while($k = mysqli_fetch_array($query)){
    $nombre = $k['nombre'];
    $fecha= $k['fechah'];
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
    $preg11 = $k['preg11'];
    $preg12 = $k['preg12'];
    $preg13 = $k['preg13'];
    $preg14 = $k['preg14'];

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

    if($preg11 == 0){
        $preg11 = "No";
    }elseif($preg11 == 1){
        $preg11 = "Si";
    }

    if($preg12 == 0){
        $preg12 = "No";
    }elseif($preg12 == 1){
        $preg12 = "Si";
    }

    if($preg13 == 0){
        $preg13 = "No";
    }elseif($preg13 == 1){
        $preg13 = "Si";
    }

    if($preg14 == 0){
        $preg14 = "No";
    }elseif($preg14 == 1){
        $preg14 = "Si";
    }

  }
}



$pdf=new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B',12);
$pdf->Image('img/logo.png',20,0, 60, 50,'PNG');
$pdf->SetXY(100,9);
$pdf->Cell(50,10,'Cuestionario de detección de signos y síntomas',20,5);
$pdf->Cell(50,15,'FS-5R18',0,1);
$pdf->Cell(50,5,'',0,1);
$pdf->SetFont('Arial',"B",12);
$pdf->Cell(190,10,'',0,1);
$pdf->Cell(85,0,"Nombre: ".$nombre,0,1,"C");
$pdf->Cell(190,10,'',0,1);
$pdf->Cell(62,0,"Fecha: ".$fecha,0,1,"C");
$pdf->Cell(190,10,'',0,1);
$pdf->Cell(125,0,"1.- Presenta alguno de los siguientes síntomas mayores?:",0,1,"C");
$pdf->Cell(190,10,'',0,1);
$pdf->Cell(50,0,"Tos seca: ".$preg1,0,1,"C");
$pdf->Cell(190,10,'',0,1);
$pdf->Cell(46,0,"Fiebre: ".$preg2,0,1,"C");
$pdf->Cell(190,10,'',0,1);
$pdf->Cell(105,0,"Dificultad respiratoria (dato de gravedad): ".$preg3,0,1,"C");
$pdf->Cell(190,10,'',0,1);
$pdf->Cell(62,0,"Dolor de cabeza: ".$preg4,0,0,"C");
$pdf->Cell(190,10,'',0,1);
$pdf->Cell(60,0,"Dolor muscular: ".$preg5,0,0,"C");
$pdf->Cell(190,10,'',0,1);
$pdf->Cell(72,0,"Dolor de articulaciones: ".$preg6,0,0,"C");
$pdf->Cell(190,10,'',0,1);
$pdf->Cell(64,0,"Dolor de garganta: ".$preg7,0,0,"C");
$pdf->Cell(190,10,'',0,1);
$pdf->Cell(52,0,"Escalofríos: ".$preg8,0,0,"C");
$pdf->Cell(190,10,'',0,1);
$pdf->Cell(58,0,"Dolor torácico: ".$preg9,0,0,"C");
$pdf->Cell(190,10,'',0,1);
$pdf->Cell(60,0,"Secresión nasal: ".$preg10,0,0,"C");
$pdf->Cell(190,10,'',0,1);
$pdf->Cell(62,0,"Perdida de olfato: ".$preg11,0,0,"C");
$pdf->Cell(190,10,'',0,1);
$pdf->Cell(81,0,"Perdida del sentido del gusto: ".$preg12,0,0,"C");
$pdf->Cell(190,10,'',0,1);
$pdf->Cell(80,0,"Comezón y ardor en los ojos: ".$preg13,0,0,"C");
$pdf->Cell(190,20,'',0,1);
$pdf->Cell(177,0,"2.- En los últimos 7 días ha estado en contacto con una persona sospechosa por COVID-19",0,1,"C");
$pdf->Cell(190,5,'',0,1);
$pdf->Cell(177,0,"o un caso ya confirmado sin haber usado el EPP (cubrebocas y en el caso de estar a menos ",0,1,"C");
$pdf->Cell(190,5,'',0,1);
$pdf->Cell(110,0,"de 1.5 metros de distancia cubrebocas y careta): ".$preg14,0,1,"C");


$pdf->Output();

?>