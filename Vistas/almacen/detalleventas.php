 <?php  
require('../../config.ini.php');
include("../../Modelo/conexion.php");
include("../../Modelo/pedidos/detallepedidos.php");
include("../../Modelo/almacen/almacen.php"); ?>
<?php  $p = new DetallePedidos();
 $result=$p->get_detallepedidos($_GET['txt']);
 (Double) $total=0;
 $i=1;
 setlocale(LC_MONETARY, 'en_US');
 while($lista=$result->fetch_array()){  
 $total=$total+$lista['SUB_TOTAL'];                      
     ?>
     <tr >
     <td><?php echo $i++; ?></td>
       <td><a data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?=$lista['DPED_C_CODIGO']?>" aria-expanded="false" class="collapsed"><?php echo $lista['PRO_D_NOMBRE'] ?></a></td>
       <td  >
          <span id="fc<?=$lista['DPED_C_CODIGO']?>"><?php echo $lista['DPED_N_CANTIDAD'] ?></span>
       </td>
       <td>S/. <span id="f<?=$lista['DPED_C_CODIGO']?>"><?php echo "S/.".$lista['DPED_N_PRECIO']; ?></span>
       </td>
       <td  ><?php echo "S/.".$lista['SUB_TOTAL']; ?></td>
       <td> <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModalserie" data-iddped="<?=$lista['DPED_C_CODIGO']?>" data-idped="<?=$_GET['txt']?>"  data-toggle="tooltip" title="Detalle">+</button></td>
       

     </tr>
     <tr>
       <td></td>
       <td colspan="4">
       <div id="collapseOne<?=$lista['DPED_C_CODIGO']?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">
           <?php 
           $a=new Almacen();
           $series=$a->get_series($lista['DPED_C_CODIGO']);
           while($l=$series->fetch_array()){ 
       
            ?>
           <span  class=" btn btn-success pull-left"><?=$l[0]?></span>
           <?php } ?>
          </div>
        </div>
     </td>
     <?php } ?>
      <tr class=" bg-gray">
      <td colspan="4" ><span class="pull-right"> Total:</span></td>
      <td colspan="3" >S/.<?php echo round($total,2); ?></td>
      </tr>