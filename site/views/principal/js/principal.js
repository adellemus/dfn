$(document).ready(function(){



function buscar_iva(){
$.post(base_url + 'giras/buscar_iva',{
      },function(datos){
         sessionStorage.setItem('descripcioniva',datos.descripcion);
             },'json');
}
 
buscar_iva();

});
