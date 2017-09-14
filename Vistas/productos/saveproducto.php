<?php 
require('../../config.ini.php');
include("../../Modelo/conexion.php");
include("../../Modelo/productos/productos.php"); ?>

<?php 
if(!empty($_POST['nombre']) and !empty($_POST['modelo']) and !empty($_POST['descripcion']) ){
ECHO "!".$nombre=$_POST['nombre'];
ECHO "!".$modelo=$_POST['modelo'];
ECHO "!".$descripcion=$_POST['descripcion'];
ECHO "!".$categoria=$_POST['categoria'];
ECHO "!".$marca=$_POST['marca'];
ECHO " img!".$img=$_FILES['img']['name'];
ECHO "!".$idus=$_POST['usuario'];
ECHO "!".$idsede=$_POST['sede'];

$prod=new Productos();

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
						$u=$prod->save_producto($nombre ,$modelo ,$descripcion,$img ,$categoria ,$marca ,$idus,$idsede);
						if($u['sms']=='ok'){

							echo  $sms=$u['sms'];
							  if($uploadedfileload=="true"){
										move_uploaded_file ($_FILES['img']['tmp_name'], "../../Public/img/productos/".$add);
										$msg.=" Ha sido subido satisfactoriamente";
									}

							echo  $sms=$u['sms'].$msg;

							

							 include(HTML_DIR .'productos/registrarProductos.php');


						}
						else{
							echo  $sms=$u['sms'].$msg;
                               
							
							 //setcookie($cookie_name,$sms, time() + 9, "/"); 
						  	 
							 include(HTML_DIR .'productos/registrarProductos.php');
						}
						
						

				
				}

	
	}else
	{
		echo "Faltan datos"; 
	}
 ?>