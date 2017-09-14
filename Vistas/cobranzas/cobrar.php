 <?php  
require('../../config.ini.php');
include("../../Modelo/conexion.php");
include("../../Modelo/ventas/ventas.php"); ?>

<?php 
$u=$_GET['s'];
$t=$_GET['t'];
$p = new Ventas();
 $result=$p->cobrar($t,$u);
 echo $result[0];
 ?>