$(document).ready(function(){
  //variables globales
  codigo_chofer_editar='';
  $('#datatablesSimple').dataTable({
      "searching": false,
      "autoWidth": false,
      "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
            "columns": [
        { "width": "20%" },
        { "width": "17.5%" },
        { "width": "16.5%" },
        { "width": "19%" },
        { "width": "12%" },
        { "width": "15%" }
      ],
      "language": { 
        "search": "Buscar", 
        "paginate": {
          "first":      "First",
          "last":       "Last",
          "next":       "Siguiente",
          "previous":   "Anterior"
        },

                  "lengthMenu":     "Mostrar _MENU_ Choferes", 
                  "emptyTable":     "Sin Choferes registrados",
                  "info":           "Mostrando _START_ a _END_ de _TOTAL_ Choferes",
                  "infoEmpty":      "Mostrando 0 Choferes",
                  "searchPlaceholder": "Buscar..." },
  });

  $(document).on("click", "#agregar_chofer", function(){
    array= Array();
    array['cho_codigo']=cho_codigo=$("#cho_codigo").val();
    array['cho_nombre']=cho_nombre=$("#cho_nombre").val();
    array['cho_correo']=cho_correo=$("#cho_correo").val();
    array['cho_telefono']=cho_telefono=$("#cho_telefono").val();
    array['cho_estado']=cho_estado=$("#cho_estado").val();
    array['cho_equipamento']=cho_equipamento=$("#cho_equipamento").val();
    array['cho_dispacher']=cho_dispacher=$("#cho_dispacher").val();
    array['cho_nro_camion']=cho_nro_camion=$("#cho_nro_camion").val();
    array['cho_nro_trailer']=cho_nro_trailer=$("#cho_nro_trailer").val();

    if($('#form_chofer').validationEngine('validate')){
      $.post(base_url+'chofer/guardar_chofer',{
        cho_codigo: cho_codigo,
        cho_nombre: cho_nombre,
        cho_correo: cho_correo,
        cho_telefono: cho_telefono,
        cho_estado: cho_estado,
        cho_equipamento: cho_equipamento,
        cho_dispacher: cho_dispacher,
        cho_nro_camion: cho_nro_camion,
        cho_nro_trailer: cho_nro_trailer 
      },function(datos){
        console.log(datos);
        if(datos=='dp_codigo'){
          alertify.error('Error, no se ha podido registrar el chofer, codigo chofer duplicado');
        }else{
          alertify.notify('Chofer Agregado Exitosamente', 'success', 500, 
            function(){  document.location.href = base_url+'chofer'; });
        }        
      },'json');
    }
  });

$('#cho_codigo').addClass('validate[required]');
$('#cho_nombre').addClass('validate[required]');
$('#cho_telefono').addClass('validate[required,custom[phone]]');
$('#cho_correo').addClass('validate[required,custom[email]]');
$('#cho_estado').addClass('validate[required]');
$('#cho_equipamento').addClass('validate[required]');
$('#cho_dispacher').addClass('validate[required]');
$('#cho_nro_camion').addClass('validate[required]');
$('#cho_nro_trailer').addClass('validate[required]');

$('#cho_codigo_editar').addClass('validate[required]');
$('#cho_nombre_editar').addClass('validate[required]');
$('#cho_telefono_editar').addClass('validate[required,custom[phone]]');
$('#cho_correo_editar').addClass('validate[required,custom[email]]');
$('#cho_estado_editar').addClass('validate[required]');
$('#cho_equipamento_editar').addClass('validate[required]');
$('#cho_dispacher_editar').addClass('validate[required]');
$('#cho_nro_camion_editar').addClass('validate[required]');
$('#cho_nro_trailer_editar').addClass('validate[required]');

$('#form_chofer').validationEngine();
$('#form_chofer_editar').validationEngine();
$(document).on("click", "#desactivar_chofer", function(){  
  cho_codigo=$(this).data("id");
  cho_status=$(this).data("status");
  alertify.confirm('Dialogo de confirmación', '¿Esta Realmente seguro de Desactivar/Activar a este chofer?', function(){
    $.post(base_url+'chofer/desactivar_chofer',{
    cho_codigo: cho_codigo,
    cho_status: cho_status
      },function(datos){
        if(datos>0){
          console.log(datos);  
        }
        alertify.success('Chofer Desactivado/Activo exitosamente.');
        setTimeout('document.location.reload()',1500);
      });
  }, function(){alertify.error('Proceso cancelado.')});
});

$(document).on("click","#cerrar_modal_btn, #cerrar_modal_x", function(){
  alertify.confirm('Espere', '¿Esta realmente seguro de querer salir?, Perdera el progreso no guardado', 
    function(){
      $("#cerrar_modal_oculto").click();
      $('#form_chofer_editar')[0].reset();
      $('#form_chofer_editar').validationEngine();
      $(".alertify").remove();
    }
    ,function(){
      
    }
  );
});

$(document).on("click","#boton_modal_editar", function(){
  cho_codigo=$(this).data("id");
  $.post(base_url+'chofer/buscar_chofer_especifico',{
    cho_codigo: cho_codigo
      },function(datos){
        if(Object.keys(datos).length>0){
          $('#cho_codigo_editar').val(datos.cho_codigo);
          $('#cho_pk').val(datos.cho_pk);
          $('#cho_nombre_editar').val(datos.cho_nombre);
          $('#cho_telefono_editar').val(datos.cho_telefono);
          $('#cho_correo_editar').val(datos.cho_correo);
          $('#cho_estado_editar').val(datos.cho_estado);
          $('#cho_equipamento_editar').val(datos.cho_equipamento);
          $('#cho_dispacher_editar').val(datos.cho_dispacher);
          $('#cho_nro_camion_editar').val(datos.cho_nro_camion);
          $('#cho_nro_trailer_editar').val(datos.cho_nro_trailer);
          codigo_chofer_editar=datos.cho_codigo;
        } else{
          alert("Error");
          codigo_chofer_editar='';
        }
      },'json'
  );
});

$(document).on("click", "#editar_usuario", function(){
  cho_codigo=$("#cho_codigo_editar").val();
  cho_nombre=$("#cho_nombre_editar").val();
  cho_correo=$("#cho_correo_editar").val();
  cho_telefono=$("#cho_telefono_editar").val();
  cho_estado=$("#cho_estado_editar").val();
  cho_equipamento=$("#cho_equipamento_editar").val();
  cho_dispacher=$("#cho_dispacher_editar").val();
  cho_nro_camion=$("#cho_nro_camion_editar").val();
  cho_nro_trailer=$("#cho_nro_trailer_editar").val();
  cho_pk=$("#cho_pk").val();
  $('#form_chofer_editar').validationEngine();
  if($('#form_chofer_editar').validationEngine('validate')){
    $.post(base_url+'chofer/editar_chofer',{
      cho_codigo:cho_codigo,
      cho_nombre:cho_nombre,
      cho_correo:cho_correo,
      cho_telefono:cho_telefono,
      cho_estado:cho_estado,
      cho_equipamento:cho_equipamento,
      cho_dispacher:cho_dispacher,
      cho_nro_camion:cho_nro_camion,
      cho_pk:cho_pk,
      cho_nro_trailer:cho_nro_trailer
    },function(datos){
      if(datos>0){
        $("#cerrar_modal_oculto").click();
        alertify.success('Chofer Editado Exitosamente.');
      }else{
        alertify.error('Error');
      }      
    },'json');
  }
});


$(document).on("blur", "#cho_codigo, #cho_codigo_editar", function(){
  control=$(this);
  bandera=$(this).val();
  dato = 0;
  if(control.prop("id")=="cho_codigo_editar"){
    if(codigo_chofer_editar==control.val()){
      return;
    }
  }
  if (bandera=='') {
    return;
  }else{
    $.post(base_url+'chofer/buscar_chofer_especifico',{
      cho_codigo: bandera
        },function(datos){
          if(Object.keys(datos).length>0){
            alertify.alert('Error', 'Codigo de Chofer repetido, introduzca uno nuevo', 
              function(){
                $(".alertify").remove();
                control.val('');
              }
            );
          } else{
            
          }
        },'json'
    );
  }
});

$(document).on('change', "#select_choferes_perfil", function(){
  cho_codigo=$(this).val();
  $.post(base_url+'chofer/influencer',{
    cho_codigo: cho_codigo
      },function(datos){
        $(".nombre_chofer").empty();
        $(".nombre_chofer").html(datos.cho_nombre);
        $(".correo_chofer").empty();
        $(".correo_chofer").html(datos.cho_correo);
        $(".telefono_chofer").empty();
        $(".telefono_chofer").html(datos.cho_telefono);
        $(".equipamento_chofer").empty();
        $(".equipamento_chofer").html(datos.cho_equipamento);
        $(".nro_camion_chofer").empty();
        $(".nro_camion_chofer").html(datos.cho_nro_camion);
        $(".nro_trailer_chofer").empty();
        $(".nro_trailer_chofer").html(datos.cho_nro_trailer);
        $(".nombre_dispacher").empty();
        $(".nombre_dispacher").html('dispacher');
        $(".nombre_empresa").empty();
        $(".nombre_empresa").html('empresa');
        $(".estado_chofer").empty();
        $(".estado_chofer").html(datos.cho_estado);
        $(".codigo_chofer").empty();
        $(".codigo_chofer").html(datos.cho_codigo);
      },'json'
  );
});

$(document).on('dblclick','.ver_chofer', function(){
  cho_codigo=$(this).data('id');
  console.log(cho_codigo);
    $.redirect("chofer/influencer", {cho_codigo: cho_codigo, bandera: "1"}, "POST", "_blank");
});

$(document).on("click", "#eliminar_usuario", function(){  
  id_usuario=$(this).data("id");
  alertify.confirm('Dialogo de confirmación', '¿Esta Realmente seguro de Eliminar este usuario', function(){
    $.post(base_url+'usuarios/eliminar_usuario',{
    id_usuario: id_usuario
      },function(){
        alertify.success('Usuario Eliminado exitosamente.');
        setTimeout('document.location.reload()',1500);
      });
  }, function(){alertify.error('Proceso cancelado.')});
});
});