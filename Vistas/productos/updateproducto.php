<?php 
require('../../config.ini.php');
include("../../Modelo/conexion.php");
include("../../Modelo/productos/productos.php"); ?>
<?php 
ECHO "!".$nombre=$_POST['nombre'];
ECHO "!".$modelo=$_POST['modelo'];
ECHO "!".$descripcion=$_POST['descripcion'];
ECHO "!".$categoria=$_POST['categoria'];
ECHO "!".$marca=$_POST['marca'];
ECHO " img!".$img=$_FILES['img']['name'];
ECHO "!".$idus=$_POST['usuario'];
ECHO "!".$idsede=$_POST['sede'];
ECHO "!".$idpro=$_POST['id'];

$prod=new Productos();

if($img!=""){
$uploadedfileload="true";
$uploadedfile_size=$_FILES['img']['size'];

				if(	 $_FILES['img']['name']<>"" ){
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
						$u=$prod->update_producto($nombre ,$modelo ,$descripcion,$img ,$categoria ,$marca ,$idus,$idsede,$idpro);
						if($u['sms']=='ok'){

							echo  $sms=$u['sms'];
							  if($uploadedfileload=="true"){
										move_uploaded_file ($_FILES['img']['tmp_name'], "../../Public/img/productos/".$add);
										$msg.=" Ha sido subido satisfactoriamente";
									}

							echo  $sms=$u['sms'].$msg;

						}
						else{
							echo  $sms=$u['sms'].$msg;
                               
							
						}
						
						

				
				}

	
	}else
	{
		$u=$prod->update_producto($nombre ,$modelo ,$descripcion,$img ,$categoria ,$marca ,$idus,$idsede,$idpro);
echo "SMS: ".$u[0];
	}


 ?>