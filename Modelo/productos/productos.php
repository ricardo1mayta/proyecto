
<?php 
class Productos {

	private $db;

	public function __construct() 
	{
	        
	         $this->db = new Conexion();
	       
	}
	public function save_producto($nombre ,$modelo ,$descripcion ,$img ,$categoria ,$marca ,$idus,$idsede) 
{
      
       
      $sql = "CALL sp_save_producto('$nombre ','$modelo ','$descripcion ','$img ','$categoria ','$marca ','$idus','$idsede');";
        
       $rows=$this->db->query($sql);  
        $result=$rows->fetch_array();
    
        return $result;
        
        
    }

  

    public function get_allProductos($idsed) 
    {
        $sql = "SELECT * FROM sm_productos WHERE SED_C_CODIGO='$idsed'";
       $rows=$this->db->query($sql);  
        return $rows;
    }
  

    public function get_nomProductos($idus,$idpro) 
    {
    
         $sql = "SELECT * FROM sm_productos where PRO_D_NOMBRE LIKE '$idpro%' AND AUD_U_USARIOCREA='$idus' AND PRO_N_CANTIDAD>0 limit 5";
         $rows=$this->db->query($sql);  
        return $rows;
     
    }
public function get_productos($txt,$sed) 
    {
                $sql="SELECT PRO_C_CODIGO,PRO_D_NOMBRE,PRO_N_PRECIOCOMPRA,PRO_N_CANTIDAD,PRO_N_PRECIOVENTA FROM sm_productos WHERE PRO_N_CANTIDAD>0 AND PRO_D_NOMBRE LIKE '".$txt."%' AND SED_C_CODIGO='$sed' LIMIT 12; ";
                $rows=$this->db->query($sql);  
                return $rows;
    }
    public function get_productos_compras($txt,$sed) 
    {
                $sql="SELECT PRO_C_CODIGO,PRO_D_NOMBRE,PRO_N_PRECIOCOMPRA,PRO_N_CANTIDAD,PRO_N_PRECIOVENTA FROM sm_productos WHERE  PRO_D_NOMBRE LIKE '".$txt."%' AND SED_C_CODIGO='$sed' LIMIT 12; ";
                $rows=$this->db->query($sql);  
                return $rows;
    }

public function get_productosc($txt,$sed) 
    {
                $sql="SELECT PRO_C_CODIGO,PRO_D_NOMBRE,PRO_N_PRECIOCOMPRA,PRO_N_CANTIDAD,PRO_N_PRECIOVENTA FROM sm_productos WHERE  PRO_D_NOMBRE LIKE '".$txt."%' AND SED_C_CODIGO='$sed' LIMIT 12; ";
                $rows=$this->db->query($sql);  
                return $rows;
    }

}
?>