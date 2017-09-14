<?php  
class detallePedidos {

	private $db;

	public function __construct() 
	{
	        
	         $this->db = new Conexion();
	       
	}
	public function save_detallepedido($idped,$idpro,$cantidad,$precio,$us) 
    {
        $sql = "call spt_save_detallepedido('$idped','$idpro','$cantidad','$precio','$us');";
         $rows=$this->db->query($sql);  
         $result=$rows->fetch_array();
         return $result;

    }

    public function get_detallepedidos($idped){

    	$sql="SELECT dp.DPED_C_CODIGO,dp.PED_C_CODIGO,p.PRO_D_NOMBRE,dp.DPED_N_CANTIDAD,dp.DPED_N_PRECIO,dp.DPED_N_CANTIDAD*dp.DPED_N_PRECIO SUB_TOTAL FROM sm_detallepedidos dp 
 inner join sm_productos p on dp.PRO_C_CODIGO=p.PRO_C_CODIGO WHERE dp.PED_C_CODIGO='$idped' AND dp.DPED_E_ESTADO=1;";

 			 $rows=$this->db->query($sql);  
             return $rows;
    }

    public function update_precio_detallepedido($iddetp,$pre,$us){

    	$sql="call spt_update_preciodetallepedido('$iddetp','$pre','$us')";

 			 $rows=$this->db->query($sql);  
         $result=$rows->fetch_array();
         return $result;
    }

    public function update_cantidad_detallepedido($iddetp,$pre,$us){

    	$sql="call spt_update_cantdetallepedido('$iddetp','$pre','$us')";

 			 $rows=$this->db->query($sql);  
         $result=$rows->fetch_array();
         return $result;
    }
	public function delete_detallepedido($iddetp,$us){

    	$sql="call spt_delete_detallepedido('$iddetp','$us')";

 		 $rows=$this->db->query($sql);  
         $result=$rows->fetch_array();
         return $result;
    }


}
?>