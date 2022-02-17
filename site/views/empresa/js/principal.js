$(document).ready(function(){
  //variables globales
  codigo_empresa_editar='';
  $('#datatablesSimple').dataTable({
      "searching": false,
      "autoWidth": false,
      "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
            "columns": [
        { "width": "20%" },
        { "width": "17.5%" },
        { "width": "16.5%" },
        { "width": "19%" }
      ],
      "language": { 
        "search": "Buscar", 
        "paginate": {
          "first":      "First",
          "last":       "Last",
          "next":       "Siguiente",
          "previous":   "Anterior"
        },

                  "lengthMenu":     "Mostrar _MENU_ Empresas", 
                  "emptyTable":     "Sin Empresas registradas",
                  "info":           "Mostrando _START_ a _END_ de _TOTAL_ Empresas",
                  "infoEmpty":      "Mostrando 0 Empresas",
                  "searchPlaceholder": "Buscar..." },
  });

  $(document).on("click", "#agregar_empresa", function(){
    array= Array();
    array['emp_codigo']=emp_codigo=$("#emp_codigo").val();
    array['emp_nombre']=emp_nombre=$("#emp_nombre").val();
    

    if($('#form_empresa').validationEngine('validate')){
      $.post(base_url+'empresa/guardar_empresa',{
        emp_codigo: emp_codigo,
        emp_nombre: emp_nombre
      },function(datos){
        console.log(datos);
        if(datos=='dp_codigo'){
          alertify.error('Error, no se ha podido registrar la Empresa');
        }else{
          alertify.notify('Empresa Agregada Exitosamente', 'success', 500, 
            function(){  document.location.href = base_url+'empresa'; });
        }        
      },'json');
    }
  });

$('#emp_codigo').addClass('validate[required]');
$('#emp_nombre').addClass('validate[required]');

$('#emp_codigo_editar').addClass('validate[required]');
$('#emp_nombre_editar').addClass('validate[required]');

$('#form_empresa').validationEngine();
$('#form_empresa_editar').validationEngine();
$(document).on("click", "#desactivar_empresa", function(){  
  emp_codigo=$(this).data("id");
  emp_status=$(this).data("status");
  alertify.confirm('Dialogo de confirmación', '¿Esta Realmente seguro de Desactivar/Activar a esta empresa?', function(){
    $.post(base_url+'empresa/desactivar_empresa',{
    emp_codigo: emp_codigo,
    emp_status: emp_status
      },function(datos){
        if(datos>0){
          console.log(datos);  
        }
        alertify.notify('Empresa Desactivada/Activa exitosamente.', 'success', 500, 
            function(){
            $(".alertify").remove();  
              document.location.href = base_url+'empresa'; });
        });
  }, function(){alertify.error('Proceso cancelado.')});
});

$(document).on("click","#cerrar_modal_btn, #cerrar_modal_x", function(){
  alertify.confirm('Espere', '¿Esta realmente seguro de querer salir?, Perdera el progreso no guardado', 
    function(){
      $("#cerrar_modal_oculto").click();
      $('#form_empresa_editar')[0].reset();
      $('#form_empresa_editar').validationEngine();
      $(".alertify").remove();
    }
    ,function(){
      
    }
  );
});

$(document).on("click","#boton_modal_editar", function(){
  emp_codigo=$(this).data("id");
  $.post(base_url+'empresa/buscar_empresa_especifico',{
    emp_codigo: emp_codigo
      },function(datos){
        if(Object.keys(datos).length>0){
          $('#emp_codigo_editar').val(datos.emp_codigo);
          $('#emp_nombre_editar').val(datos.emp_nombre);
          codigo_empresa_editar=datos.emp_codigo;
        } else{
          alert("Error");
          codigo_empresa_editar='';
        }
      },'json'
  );
});

$(document).on("click", "#editar_usuario", function(){
  emp_codigo=$("#emp_codigo_editar").val();
  emp_nombre=$("#emp_nombre_editar").val();
  $('#form_empresa_editar').validationEngine();
  if($('#form_empresa_editar').validationEngine('validate')){
    $.post(base_url+'empresa/editar_empresa',{
      emp_codigo:emp_codigo,
      emp_nombre:emp_nombre
    },function(datos){
      if(datos>0){
        $("#cerrar_modal_oculto").click();
        alertify.notify('Empresa Editada Exitosamente.', 'success', 500, 
            function(){  document.location.href = base_url+'empresa'; });
      }else{
        alertify.error('Error');
      }      
    },'json');
  }
});


$(document).on("blur", "#emp_codigo, #emp_codigo_editar", function(){
  control=$(this);
  bandera=$(this).val();
  dato = 0;
  if(control.prop("id")=="emp_codigo_editar"){
    if(codigo_empresa_editar==control.val()){
      return;
    }
  }
  if (bandera=='') {
    return;
  }else{
    $.post(base_url+'empresa/buscar_empresa_especifico',{
      emp_codigo: bandera
        },function(datos){
          if(Object.keys(datos).length>0){
            alertify.alert('Error', 'Codigo de Empresa repetida, introduzca uno nuevo', 
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

$(document).on('change', "#select_empresas_perfil", function(){
  emp_codigo=$(this).val();
  $.post(base_url+'empresa/influencer',{
    emp_codigo: emp_codigo
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