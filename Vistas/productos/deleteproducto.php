<?php 
require('../../config.ini.php');
include("../../Modelo/conexion.php");
include("../../Modelo/productos/productos.php"); ?>
<?php 

ECHO "!".$idpro=$_POST['i'];
ECHO "!".$us=$_POST['u'];
$prod=new Productos();
$u=$prod->delete_producto($idpro,$us);
echo $u[0];
?>