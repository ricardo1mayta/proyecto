 <?php  
require('../../config.ini.php');
include("../../Modelo/conexion.php");
include("../../Modelo/creditos/creditos.php"); ?>

<?php 
 $us=$_REQUEST['idus'];
 $monto=$_REQUEST['monto'];
 $idcre=$_REQUEST['idcre'];
 $obs=$_REQUEST['descripcion'];
$p = new Creditos();
 
 

 $uploadedfileload="true";
$uploadedfile_size=$_FILES['img']['size'];

				if(	$_FILES['img']['name']<>"" ){
					if ($_FILES['img']['size']>5000000)
						{ 
							$msg=$msg."El archivo es mayor que 5MB, debes reduzcirlo antes de subirlo<BR>";
							$uploadedfileload="false";
						}

						if (!($_FILES['img']['type'] =="image/jpeg" OR $_FILES['img']['type'] =="image/gif" OR $_FILES['img']['type'] =="image/png"))
						{$msg=$msg." Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos ";
						$uploadedfileload="false";}

						$file_name=$_FILES['img']['name'];
						$add=$file_name;
						$result=$p->abonar($idcre,$monto,$us,$obs,$add);
							  if($uploadedfileload=="true"){
										move_uploaded_file ($_FILES['img']['tmp_name'], "../../Public/img/productos/".$add);
										$msg.=" Ha sido subido satisfactoriamente";
									}

							echo  $sms=$result[0].$msg;
	
	}else
	{
		echo "Falta Comprobante de pago"; 
	}

 ?>