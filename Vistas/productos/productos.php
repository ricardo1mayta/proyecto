<?php 
require('../../config.ini.php');
include("../../Modelo/conexion.php");
include("../../Modelo/productos/productos.php"); ?>

<?php $s=$_REQUEST['s'];
                $pro = new Productos();
                         $result=$pro->get_allProductos($s) ;
                         while($lista=$result->fetch_array()){                        
                             ?>
                             
                      <tr>
                        <td><?=$lista['PRO_C_CODIGO']?></td>
                        <td><?=$lista['PRO_D_NOMBRE']?></td>
                        <td><?=$lista['PRO_D_MODELO']?></td>
                        <td><?=$lista['PRO_D_DESCRIPCION']?></td>
                        <td><?=$lista['CAT_C_CODIGO']?></td>
                        <td><?=$lista['MARS_C_CODIGO']?></td>
                         <td>
                           <button type="button" class="btn btn-success btn-xs " data-toggle="modal" 
                         data-target="#editarcliente" data-id="<?=$lista['PRO_C_CODIGO']?>" data-nombre="<?=$lista['PRO_D_NOMBRE']?>" data-modelo="<?=$lista['PRO_D_MODELO']?>" data-desc="<?=$lista['PRO_D_DESCRIPCION']?>" data-idcat="<?=$lista['CAT_C_CODIGO']?>" data-marca="<?=$lista['MAR_C_CODIGO']?>" data-img="<?=$lista['PRO_I_IMAGEN']?>" ><i class=" fa fa-user-plus" ></i> Modificar</button>
                                             
                        </td>
                       
                        <td>
                          <button type="button" class="btn btn-danger btn-xs " onclick="eliminar(<?=$lista['PRO_C_CODIGO']?>)" ><i class=" fa fa-trash"></i>Eliminar</button>
                        </td>
                        
                      </tr>
                  <?php 
                    }