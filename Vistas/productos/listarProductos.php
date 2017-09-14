<?php include_once(HTML_DIR . '/template/titulo.php'); ?>
<?php include_once(HTML_DIR . '/template/links.php'); ?>
<?php include_once(HTML_DIR . '/template/header_menu.php'); ?>
 <div class="content-wrapper" >
    <div class="content">
    
        <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Lista de Productos<?php //echo $nomp ?></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <?php   if(isset($sms)) { echo $sms; $sms="";}?>
          <div class="col-md-12">
                      
          <!-- general form elements disabled -->
          <div class="box box-warning sombra">
            <div class="box-header with-border">
             <div class="box-tools pull-right">
             <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#newcliente">
              <i class="fa fa-times"></i>Agregar</button>
          </div>
            </div>
            <div class="box-body">
                <table  class="table " id="clientestable">
                <thead>
                <tr>
                  
                  
                  <th>CODIGO</th>
                  <th>NOMBRE</th>
                  <th>MODELO</th>
                  <th>DESCRIPCION</th>
                  <th>CATEGORIA</th>
                  <th>MARCA</th>
                  <th colspan="2">OP</th>
                </tr>
                </thead>
                <tbody>
                 
                
                </tbody>
                
              </table>
            </div>           
          
           </div>
          <!-- /.box -->
        </div>
        </div>
        <!-- /.box-body -->
       
        <!-- /.box-footer-->
      </div>

    </div>
</div>
<div class="modal fade" id="newcliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Nuevo Cliente</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action=""  method="post" id="nuevoproducto" onsubmit="guardar(); return false;" enctype="multipart/form-data">
          <div class="form-group ">
           <label class="control-label col-sm-3">Nombre</label>
            <input  type="hidden"   value="<?php echo $usuario['US_C_CODIGO'] ?>" name="usuario" id="u"  >
            <input  type="hidden"  value="<?php echo $usuario['SED_C_CODIGO'] ?>" name="sede" >
              <div class="col-sm-9">
                    <input  type="text" class="form-control"  name="nombre" id="nombre"  required>
              </div>
            </div>
            <div class="form-group ">
              <label class="control-label col-sm-3">Modelo</label>
              <div class="col-sm-9">
                <input  type="text" class="form-control "  name="modelo" id="modelo"    required>
              </div>
            </div>
           
            
            
            <div class="form-group ">
              <label class="control-label col-sm-3">Categoria</label>
              <div class="col-sm-9">
               <select class="form-control" name="categoria" id="categoria">
               <option>-Seleccione-</option>
                <?php 
                 $cate = new Categoria();
                 $ca=$cate->get_allcategoria($usuario['US_C_CODIGO']);
                 while($cat=$ca->fetch_array()){  
                     ?>
                          <option value="<?php echo $cat['CAT_C_CODIGO']?>"><?php echo $cat['CAT_D_NOMBRE']?></option>
                                     
                  <?php }?>
                </select>
                </div>
            </div>
             <div class="form-group">
              <label class="control-label col-sm-3">Marca</label>
              <div class="col-sm-9">
               <select class="form-control" name="marca" id="marca">
               <option>-Seleccione-</option>
                <?php 
                 $marca = new Marca();
                 $rows=$marca->get_allmarcas($usuario['US_C_CODIGO']);
                 while($mar=$rows->fetch_array()){  
                     ?>
                          <option value="<?php echo $mar['MAR_C_CODIGO']?>"><?php echo $mar['MAR_D_NOMBRE']?></option>
                                     
                  <?php }?>
                </select>
                </div>
            </div>
           
            <div  class="form-group ">
              <label class="control-label col-sm-3">seleciona imagen</label>
              <div class="col-sm-9">
               <input  type="file" id="files" class="filestyle" name="img"/>
               </div>   
                 
             </div>
              <div class="form-group ">
              <label class="control-label col-sm-3">Descripción</label>
              <div class="col-sm-9">
                <textarea name="descripcion" class="form-control " id="descripcion"></textarea> 
                </div>
            </div>
           
                           
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-default"  onclick="guardar()">Guardar</button>
        
        
      </div>
      </form>
    </div> 
  </div>
</div>
<div class="modal fade" id="editarcliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Editar Cliente</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action=""  method="post" id="editaproducto" onsubmit="guardar(); return false;" enctype="multipart/form-data">
          <div class="form-group ">
           <label class="control-label col-sm-3">Nombre</label>
            <input  type="hidden"   value="<?php echo $usuario['US_C_CODIGO'] ?>" name="usuario"  >
            <input  type="hidden"  value="<?php echo $usuario['SED_C_CODIGO'] ?>" name="sede" >
             <input  type="text"  name="id" >
              <div class="col-sm-9">
                    <input  type="text" class="form-control"  name="nombre" id="nombre"  required>
              </div>
            </div>
            <div class="form-group ">
              <label class="control-label col-sm-3">Modelo</label>
              <div class="col-sm-9">
                <input  type="text" class="form-control "  name="modelo" id="modelo"    required>
              </div>
            </div>
            <div class="form-group ">
              <label class="control-label col-sm-3">Descripción</label>
              <div class="col-sm-9">
                  <textarea class="form-control "  name="descripcion" id="descripcion"   ></textarea>
                </div>
            </div>
            
            
            <div class="form-group ">
              <label class="control-label col-sm-3">Categoria</label>
              <div class="col-sm-9">
               <select class="form-control" name="categoria" id="categoria">
               <option>-Seleccione-</option>
                <?php 
                 $cate = new Categoria();
                 $ca=$cate->get_allcategoria($usuario['US_C_CODIGO']);
                 while($cat=$ca->fetch_array()){  
                     ?>
                          <option value="<?php echo $cat['CAT_C_CODIGO']?>"><?php echo $cat['CAT_D_NOMBRE']?></option>
                                     
                  <?php }?>
                </select>
                </div>
            </div>
             <div class="form-group">
              <label class="control-label col-sm-3">Marca</label>
              <div class="col-sm-9">
               <select class="form-control" name="marca" id="marca">
               <option>-Seleccione-</option>
                <?php 
                 $marca = new Marca();
                 $rows=$marca->get_allmarcas($usuario['US_C_CODIGO']);
                 while($mar=$rows->fetch_array()){  
                     ?>
                          <option value="<?php echo $mar['MAR_C_CODIGO']?>"><?php echo $mar['MAR_D_NOMBRE']?></option>
                                     
                  <?php }?>
                </select>
                </div>
            </div>
            <div  class="form-group ">
              <label class="control-label col-sm-3">Imagen</label>
              <div class="col-sm-9">
                <div id="imgview" ></div>
              </div>   
                 
             </div>
            <div  class="form-group ">
              <label class="control-label col-sm-3">seleciona imagen</label>
              <div class="col-sm-9">
               <input  type="file" id="files" class="filestyle" name="img"/>
               </div>   
                 
             </div>
             
           
                           
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-default"  onclick="actualizar()">Actualizar</button>
        
        
      </div>
    </div> 
  </div>
</div>

<?php  @include_once(HTML_DIR . '/template/ajustes_generales.php'); ?>
<?php @include_once(HTML_DIR . '/template/scrips.php'); ?>
<script >
  var dc=<?=$usuario['SED_C_CODIGO']?>; 
 var su=<?=$usuario['US_C_CODIGO']?>;
$(document).ready(function(){

productos(dc);

});

 $('#editarcliente').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')
    var nombre = button.data('nombre') 
    var modelo = button.data('modelo') 
    var desc = button.data('desc') 
    var idcat = button.data('idcat') 
    var marca = button.data('marca') 
    var img = button.data('img')
   
    // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('Editar a: ' + nombre)
    modal.find('input[name="id"]').val(id)
    modal.find('input[name="nombre"]').val(nombre)
    modal.find('input[name="modelo"]').val(modelo)
    modal.find('select[name="categoria"]').val(idcat)
    modal.find('textarea[name="descripcion"]').text(desc)
    modal.find('select[name="marca"]').val(marca)
    modal.find('#imgview').html('<img id="imges" src="../Public/img/productos/'+img+'" alt="IMG-PRODUCTO" height="100" width="100"/>')
    
    $('#imges').show();
  
}) 
function productos(s){
  var url="../Vistas/productos/productos.php";
   $.ajax({
     type: "POST",
     url: url,
     data: {s:s}, // Adjuntar los campos del formulario enviado.
                
     success: function(data)
     {
         
          
             $('#clientestable tbody').html(data);
          

     }
   });
}
function actualizar(){
   
    var url="../Vistas/productos/updateproducto.php";

      var formData= new FormData($('#editaproducto')[0]);
          swal({
            title: "Atención!!",
            text: "Desea Actualizar?",
            type: "warning",
             confirmButtonText: "OK",
            cancelButtonText: "Cancelar",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
          },
          function(){
            setTimeout(function(){

                              $.ajax({
                                type: 'POST',
                                url: url,
                                data: formData,
                                contentType: false,
                                processData: false,
                                success: function(data){
                                 $('#editarcliente').modal('hide'); 
                                  productos(dc);
                                  swal("Ok", data, "success")
                                }
                         
                           });
                        
                       }, 1000);
              });
        
     

}
function guardar(){
    
    var ruc=$("#ruc1").val();
    var nom=$("#nombre1").val();
    var url="../Vistas/productos/saveproducto.php";
     
     var formData= new FormData($('#nuevoproducto')[0]);
if(ruc!="" & nom!=""){
     
          swal({
            title: "Atención!!",
            text: "Desea Guardar?",
            type: "warning",
             confirmButtonText: "OK",
            cancelButtonText: "Cancelar",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
          },
          function(){
            setTimeout(function(){
                          
                              $.ajax({
                                type: 'POST',
                                url: url,
                                data: formData,
                                contentType: false,
                                processData: false,
                                success: function(data){
                                 $('#newcliente').modal('hide'); 
                                  productos(dc);
                                  swal("Ok", data, "success")
                                }
                              });
                          
                        
                       }, 1000);
              });
        
     }
     else
     {
       swal("Falta el ruc y nombre", "", "warning")
     }

}
function eliminar(i){

var u=$("#u").val();
      //var array=optionArr;
    var url="../Vistas/productos/deleteproducto.php";

     
          swal({
            title: "Atención!!",
            text: "Desea Eliminar?",
            type: "warning",
             confirmButtonText: "OK",
            cancelButtonText: "Cancelar",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
          },
          function(){
            setTimeout(function(){
                          $.ajax({
                                 type: "POST",
                                 url: url,
                                 data: {i:i,u:u}, // Adjuntar los campos del formulario enviado.
                                            
                                 success: function(data)
                                 {
                                     
                                      productos(dc);
                                       swal("Ok", ""+data, "success")
                                      

                                 }
                               });
                          
                        
                       }, 1000);
              });
        

}
function caracteresCorreoValido(email){
   // console.log(email);    
    var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
    if (caract.test(email) == false){
          return false;
    }else{
          return true;
    }
}
</script>
<?php @include_once(HTML_DIR . '/template/inferior_depues_cuerpo.php'); ?>
