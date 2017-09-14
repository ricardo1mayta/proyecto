<?php


class Provedores {

private $db;

public function __construct() 
{
        
         $this->db = new Conexion();
       
}
    
   
public function save_provedores($nombre ,$modelo ,$descripcion ,$cantidad ,$p_compra ,$p_venta ,$descuento ,$can_minima ,$img ,$categoria ,$marca ,$idus) 
{
      
       
        $sql = "CALL sp_save_producto('$nombre ','$modelo ','$descripcion ','$cantidad ','$p_compra ','$p_venta ','$descuento ','$can_minima ','$img ','$categoria ','$marca ','$idus');";
        
       $rows=$this->db->query($sql);  
        $result=$rows->fetch_array();
    
        return $result;
        
        
    }

  

    public function get_allprovedores($idus) 
    {
        $sql = "SELECT * FROM  `sm_provedores`  WHERE `AUD_C_USUCREA`='$idus'";
       $rows=$this->db->query($sql);  
        return $rows;
    }
  

  
}

?>
    

   

