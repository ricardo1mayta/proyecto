<?php

class Creditos {

	private $db;

	public function __construct() 
	{
	        
	         $this->db = new Conexion();
	       
	}
	//funcion 	que guarda los pedidos
	public function abonar($idcre,$monto,$us,$obs) 
    {
       $sql = "call spt_save_pagov('$idcre','$monto','$us','$obs')";
        
         $rows=$this->db->query($sql);  
         $result=$rows->fetch_array();
         return $result;

    }
    public function get_creditos($idsed) 
    {
        $sql = "select cv.CV_C_CODIGO,c.SED_C_CODIGO,cv.CLI_C_CODIGO,concat(CLI_D_NOMBRE,' ',CLI_D_APELLIDOS) AS CLI_D_NOMBRE,cv.CV_N_TOTAL,ifnull((select sum(VV_N_ABONA) from sm_pagosv where CV_C_CODIGO=cv.CV_C_CODIGO ),0) AS CV_N_CANCELA,cv.CV_F_FECHACREA 
from sm_cuentasventas cv
inner join sm_cliente c on c.CLI_C_CODIGO=cv.CLI_C_CODIGO
where c.SED_C_CODIGO='$idsed';";
         $rows=$this->db->query($sql);  
         
         return $rows;

    }
     public function get_ventascredito($idcre) 
    {
        $sql = "SELECT CONCAT(VEN_V_TIPO,right(CONCAT('00000000',VEN_V_NUMERO),8)) COD_DOC,VEN_C_NOMBRECLIENTE,dv.VEN_C_CODIGO,VEN_N_TOTAL,VEN_F_FECHAVENTA FROM sm_detallecuentasventas dv
inner JOIN sm_ventas v  ON v.VEN_C_CODIGO=dv.VEN_C_CODIGO where CV_C_CODIGO='$idcre';";
         $rows=$this->db->query($sql);  
         
         return $rows;

    }
    public function get_pagosv($idcre) 
    {
        $sql = "SELECT * FROM sm_pagosv  where CV_C_CODIGO='$idcre';";
         $rows=$this->db->query($sql);  
         
         return $rows;

    }
     public function get_ventas($idcre) 
    {
        $sql = "SELECT * FROM sm_pagosv  where CV_C_CODIGO='$idcre';";
         $rows=$this->db->query($sql);  
         
         return $rows;

    }
     public function finalizar($idcre,$us) 
    {
        $sql = "call spt_finalizar_cuentasventas('$idcre','$us')";
         $rows=$this->db->query($sql);  
         $result=$rows->fetch_array();
         return $result;

    }
     public function agregaserie($iddped,$idped,$us,$serie) 
    {
        $sql = "call sta_despachoproductos('$iddped','$idped','$us','$serie')";
         $rows=$this->db->query($sql);  
         $result=$rows->fetch_array();
         return $result;

    }
}