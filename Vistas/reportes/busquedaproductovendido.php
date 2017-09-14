 hola
 <?php  
require('../../config.ini.php');
include("../../Modelo/conexion.php");
include("../../Modelo/ventas/ventas.php"); ?>
<?php 
echo $sede=$_REQUEST['s'];
echo "----".$txt=$_REQUEST['txt'];
 
$p = new Ventas();
 $result=$p->get_serieventa($sede,$txt);

  while($lista=$result->fetch_array()){                        
     ?>
     <tr >
       <td><?=$lista[0]?></td>
       <td><?=$lista[1]?></td>
        <td><?=$lista[2]?></td>
        <td><?=$lista[3]?></td>
       <td><?=$lista[4]?></td>
      
       
      
       
     </tr>
     <?php } ?>