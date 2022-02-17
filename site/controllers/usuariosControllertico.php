<?php

class usuariosController extends Controller
{
	
	private $_index;
  private $_centros;
  private $_recorridos;
  
    public function __construct() {
        parent::__construct();
  	 $this->_index=$this->loadModel('usuarios');	
     $this->_centros=$this->loadModel('centros');
     $this->_recorridos=$this->loadModel('recorridos'); 
      
    }

    public function index(){
		if(!Session::get('autenticado')){
            $this->redireccionar('login');
        }
        
			$this->_view->setJs(array('jquery.smartWizard','principal','validate'));
			$this->_view->setCss(array('nprogress'));
      $this->_view->titulo = 'Administrar Usuarios - Grupo Farma del Ecuador';
      $usuarios=$this->_index->buscarusuarios();
      $this->_view->usuarios=$usuarios;
       $distrito=$this->_index->buscar_gerente_distrito();
      $this->_view->distrito=$distrito;
      $producto=$this->_index->buscar_gerente_producto();
      $this->_view->producto=$producto;
      $lineal=$this->_index->buscar_gerente_lineal();
      $this->_view->lineal=$lineal;
      $financiero=$this->_index->buscar_gerente_financiero();
      $this->_view->financiero=$financiero;
      $general=$this->_index->buscar_gerente_general();
      $this->_view->general=$general;
      $promocion=$this->_index->buscar_gerente_promocion();
      $this->_view->promocion=$promocion;
      $ventas=$this->_index->buscar_gerente_ventas();
      $this->_view->ventas=$ventas;
      $recursos_humanos=$this->_index->buscar_recursos_humanos();
      $this->_view->recursos_humanos=$recursos_humanos;
      $asistente_rh=$this->_index->buscar_asistente_rh();
      $this->_view->asistente_rh=$asistente_rh;
      $secretarias=$this->_index->buscar_secretarias();
      $this->_view->secretarias=$secretarias;
      $centros=$this->_centros->buscarcentros();
      $this->_view->centros=$centros;
      $lineas=$this->_recorridos->buscarlineas();
      $this->_view->lineas=$lineas;
      $lineas_global=$this->_index->buscarlineas_global();
      $this->_view->lineas_global=$lineas_global;
			$this->_view->renderizar('index');
	}

   public function addusuario(){


      if(!Session::get('autenticado')){
            $this->redireccionar('login');
        }
        
      $this->_view->setJs(array('jquery.smartWizard','principal','validate'));
      $this->_view->setCss(array('nprogress'));
      $this->_view->titulo = 'Agregar Usuario - Grupo Farma del Ecuador';
      $usuarios=$this->_index->buscarusuarios();
      $this->_view->usuarios=$usuarios;
      $centros=$this->_centros->buscarcentros();
      $this->_view->centros=$centros;
      $this->_view->renderizar('addusuario');
  }

  public function cambiarclave(){

    echo json_encode( $this->_index->cambiarclave($_POST['clave'],$_POST['id_usuario']));


   }

function agregar_cuenta(){
        $this->_index->agregar_cuenta($_POST);
    }

  function eliminar_usuario(){
   $this->_index->eliminar_usuario($_POST['id_usuario']);
    }

    public function agregar_usuario(){
        $this->_index->agregar_usuario($_POST);
    }

    public function buscar_usuario(){
        echo json_encode( $this->_index->buscar_usuario($_POST['id_usuario']));
    }
   
    public function editar_usuario(){
        $this->_index->editar_usuario($_POST);
    }



   public function asignar_gerente(){

        $this->_index->asignar_gerente($_POST);
   }

  function quitar_gerente_distrito(){
   $this->_index->quitar_gerente_distrito($_POST['id'],$_POST['id_usuario']);
 
    }

    function quitar_gerente_producto(){
   $this->_index->quitar_gerente_producto($_POST['id'],$_POST['id_usuario']);
 
    }

    function quitar_gerente_lineal(){
   $this->_index->quitar_gerente_lineal($_POST['id'],$_POST['id_usuario']);
 
    }

    function quitar_gerente_promocion(){
   $this->_index->quitar_gerente_promocion($_POST['id'],$_POST['id_usuario']);
 
    }

    function quitar_gerente_ventas(){
   $this->_index->quitar_gerente_ventas($_POST['id'],$_POST['id_usuario']);
 
    }

    function quitar_gerente_financiero(){
   $this->_index->quitar_gerente_financiero($_POST['id'],$_POST['id_usuario']);
 
    }

    function quitar_gerente_general(){
   $this->_index->quitar_gerente_general($_POST['id'],$_POST['id_usuario']);
 
    }

function quitar_recursos_humanos(){
   $this->_index->quitar_recursos_humanos($_POST['id'],$_POST['id_usuario']);
 
 
    }

    function quitar_asistente_recursos_humanos(){
   $this->_index->quitar_asistente_recursos_humanos($_POST['id'],$_POST['id_usuario']);
 
 
    }

    function quitar_asistente(){
   $this->_index->quitar_asistente($_POST['id'],$_POST['id_usuario']);
 
 
    }

}


?>