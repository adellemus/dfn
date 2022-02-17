$(document).ready(function(){
  //variables globales
  codigo_usuario_editar='';
  $('#datatablesSimple').dataTable({
      "searching": false,
      "autoWidth": false,
      "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
            "columns": [
        { "width": "25%" },
        { "width": "20%" },
        { "width": "17%" },
        { "width": "18%" },
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

                  "lengthMenu":     "Mostrar _MENU_ Usuarios", 
                  "emptyTable":     "Sin Usuarios registrados",
                  "info":           "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
                  "infoEmpty":      "Mostrando 0 Usuarios",
                  "searchPlaceholder": "Buscar..." },
  });

  $(document).on("click", "#agregar_usuario", function(){
    array= Array();
    array['usu_codigo']=usu_codigo=$("#usu_codigo").val();
    array['usu_nombre']=usu_nombre=$("#usu_nombre").val();
    array['usu_correo']=usu_correo=$("#usu_correo").val();
    array['usu_telefono']=usu_telefono=$("#usu_telefono").val();
    array['usu_login']=usu_login=$("#usu_login").val();
    array['usu_password']=usu_password=$("#usu_password").val();
    array['select_empresas_perfil']=select_empresas_perfil=$("#select_empresas_perfil").val();
    array['select_tipo_usuario']=select_tipo_usuario=$("#select_tipo_usuario").val();

    if($('#form_usuario').validationEngine('validate')){
      $.post(base_url+'usuarios/guardar_usuario',{
        usu_codigo: usu_codigo,
        usu_nombre: usu_nombre,
        usu_correo: usu_correo,
        usu_telefono: usu_telefono,
        usu_login: usu_login,
        usu_password: usu_password,
        select_empresas_perfil: select_empresas_perfil,
        select_tipo_usuario: select_tipo_usuario
        
      },function(datos){
        console.log(datos);
        if(datos=='dp_codigo'){
          alertify.error('Error, no se ha podido registrar el usuario, codigo duplicado');
        }else{
          alertify.notify('Usuario Agregado Exitosamente', 'success', 500, 
            function(){  document.location.href = base_url+'usuarios'; });
        }        
      },'json');
    }else{
    }
  });

$('#usu_codigo').addClass('validate[required]');
$('#usu_nombre').addClass('validate[required]');
$('#usu_telefono').addClass('validate[required,custom[phone]]');
$('#usu_correo').addClass('validate[required,custom[email]]');
$('#usu_login').addClass('validate[required]');
$('#usu_password').addClass('validate[required]');
$('#select_empresas_perfil').addClass('validate[required]');
$('#select_tipo_usuario').addClass('validate[required]');

$('#usu_codigo_editar').addClass('validate[required]');
$('#usu_nombre_editar').addClass('validate[required]');
$('#usu_telefono_editar').addClass('validate[required,custom[phone]]');
$('#usu_correo_editar').addClass('validate[required,custom[email]]');
$('#usu_login_editar').addClass('validate[required]');
$('#usu_password_editar').addClass('validate[required]');
$('#select_empresas_perfil_editar').addClass('validate[required]');
$('#select_tipo_usuario_editar').addClass('validate[required]');

$('#form_usuario').validationEngine();
$('#form_usuario_editar').validationEngine();
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
      $('#form_usuario_editar')[0].reset();
      $('#form_usuario_editar').validationEngine();
      $(".alertify").remove();
    }
    ,function(){
      
    }
  );
});

$(document).on("click","#boton_modal_editar", function(){
  usu_codigo=$(this).data("id");
  $.post(base_url+'usuarios/buscar_usuario_especifico',{
    usu_codigo: usu_codigo
      },function(datos){
        if(Object.keys(datos).length>0){
          $('#usu_codigo_editar').val(datos.id_usuario);
          $('#usu_nombre_editar').val(datos.nombre);
          $('#usu_telefono_editar').val(datos.telefono);
          $('#usu_correo_editar').val(datos.correo);
          $('#usu_login_editar').val(datos.login);
          $('#usu_password_editar').val(datos.password);
          $('#select_empresas_perfil_editar').val(datos.emp_codigo);
          $('#select_tipo_usuario_editar').val(datos.id_role);
          codigo_usuario_editar=datos.id_usuario;
        } else{
          alert("Error");
          codigo_usuario_editar='';
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