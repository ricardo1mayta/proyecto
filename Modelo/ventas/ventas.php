<?php

class Ventas {

	private $db;

	public function __construct() 
	{
	        
	         $this->db = new Conexion();
	       
	}
	//funcion 	que guarda los pedidos
	public function save_venta($idped,$op,$us,$sed) 
    {
        $sql = "call spt_save_venta('$idped','$op','$us','$sed')";
         $rows=$this->db->query($sql);  
         $result=$rows->fetch_array();
         return $result;

    }
    public function anular_venta($idped,$us,$obs) 
    {
        $sql = "call spt_anular_venta('$idped','$us','$obs')";
         $rows=$this->db->query($sql);  
         $result=$rows->fetch_array();
         return $result;

    }
     public function imprimir($idped,$us,$obs) 
    {
        $sql = "call spt_anular_venta('$idped','$us','$obs')";
         $rows=$this->db->query($sql);  
         $result=$rows->fetch_array();
         return $result;

    }
    public function cobrar($idped,$us) 
    {
         $sql = "call spt_cobrar_venta('$idped','$us')";
         $rows=$this->db->query($sql);  
         $result=$rows->fetch_array();
         return $result;

    }
    public function credito($idped,$us) 
    {
       echo  $sql = "call spt_credito_venta('$idped','$us')";
         $rows=$this->db->query($sql);  
         $result=$rows->fetch_array();
         return $result;

    }
     public function get_ventas($idsede) 
    {
                $sql="SELECT * FROM sm_ventas WHERE SED_C_CODIGO='$idsede' ;";
                $rows=$this->db->query($sql);  
                return $rows;

    }
     public function get_ventastipo($idsede,$tipo) 
    {
                $sql="SELECT * FROM sm_ventas WHERE SED_C_CODIGO='$idsede' and VEN_V_TIPO='$tipo' and VEN_E_ESTADO=1 ORDER BY VEN_F_FECHAVENTA DESC;";
                $rows=$this->db->query($sql);  
                return $rows;

    }
     public function get_ventastiporeporte($idsede,$tipo,$l) 
    {
                $sql="SELECT *,(CASE VEN_E_ESTADO WHEN 1 THEN '<b class=text-blue>En Proceso</b>' WHEN 2 then '<b class=text-red>Credito</b>' when 3 then '<b class=text-green>Cancelada</b>' end) as ESTADO FROM sm_ventas WHERE SED_C_CODIGO='$idsede' and VEN_V_TIPO='$tipo' and VEN_E_ESTADO>0 ORDER BY VEN_F_FECHAVENTA DESC limit $l;";
                $rows=$this->db->query($sql);  
                return $rows;

    }
    public function get_idventa($idped) 
    {
                $sql="SELECT * FROM sm_ventas WHERE md5(PED_C_CODIGO)='$idped';";
                $rows=$this->db->query($sql);  
                 $result=$rows->fetch_array();
                 return $result;
    }
    public function get_detalleventa($idvent) 
    {
                $sql="SELECT * FROM sm_detalleventas WHERE VEN_C_CODIGO='$idvent' ;";
               $rows=$this->db->query($sql);  
                return $rows;
    }
    public function get_ventastipodespacho($idsede,$tipo) 
    {
                $sql="SELECT * FROM sm_ventas WHERE SED_C_CODIGO='$idsede' and VEN_V_TIPO='$tipo' and VEN_E_ESTADO>=1 ORDER BY VEN_F_FECHAVENTA DESC;";
                $rows=$this->db->query($sql);  
                return $rows;
    } 
}

?>