<?php
class usuariosController extends Controller{
	private $_index;
    public function __construct() {
        parent::__construct();
        $this->getLibrary('simpleimage');
        $this->_index=$this->loadModel('usuarios');   
        $this->_empresa=$this->loadModel('empresa');   
    }

    public function index(){
		if(!Session::get('autenticado')){
            $this->redireccionar('login');
        }        
		$this->_view->setJs(array('principal'));
		$this->_view->setCss(array('css'));
        $this->_view->titulo = 'Administrar Usuarios';
        $usuarios=$this->_index->buscar_usuario_general();
        $this->_view->usuarios=$usuarios;
        $empresas=$this->_empresa->buscar_empresa_general();
        $this->_view->empresas=$empresas;
    	$this->_view->renderizar('index');
	}

    public function influencer(){
        if(!Session::get('autenticado')){
            $this->redireccionar('login');
        }
        if(isset($_POST['cho_codigo'])){
            $perfil_chofer=$this->_index->buscar_chofer_especifico($_POST);
            $this->_view->perfil_chofer=$perfil_chofer;
            $this->_view->perfil_chofer['nombre']=' ';
            $this->_view->perfil_chofer['emp_nombre']=' ';
            if(isset($_POST['bandera'])){
                $this->_view->setJs(array('principal'));
                $this->_view->setCss(array('css'));
                $this->_view->titulo = 'Perfil Chofer';
                $choferes=$this->_index->buscar_chofer_general();
                $this->_view->choferes=$choferes;
                $this->_view->renderizar('influencer');    
            }else{
                echo json_encode($perfil_chofer);            
            }
        }else{
            $this->_view->setJs(array('principal'));
            $this->_view->setCss(array('css'));
            $this->_view->titulo = 'Perfil Chofer';
            $choferes=$this->_index->buscar_chofer_general();
            $this->_view->choferes=$choferes;
            $this->_view->perfil_chofer['cho_codigo']=' ';
            $this->_view->perfil_chofer['cho_estado']=' ';
            $this->_view->perfil_chofer['cho_nombre']=' ';
            $this->_view->perfil_chofer['cho_correo']=' ';
            $this->_view->perfil_chofer['cho_telefono']=' ';
            $this->_view->perfil_chofer['cho_equipamento']=' ';
            $this->_view->perfil_chofer['cho_nro_camion']=' ';
            $this->_view->perfil_chofer['cho_nro_trailer']=' ';
            $this->_view->perfil_chofer['nombre']=' ';
            $this->_view->perfil_chofer['emp_nombre']=' ';
            $this->_view->renderizar('influencer');    
        }
        
    }


    public function guardar_usuario(){
       echo json_encode($this->_index->guardar_usuario($_POST));
    }

    public function editar_usuario(){
       echo json_encode($this->_index->editar_usuario($_POST));
    }

	function registrar_servicio(){
        $this->_index->registrar_servicio($_POST,$_FILES);
        $this->redireccionar('servicio');
    }

    function buscar_usuario_general(){
       echo json_encode($this->_index->buscar_usuario_general());
    }

    function buscar_usuario_especifico(){
        echo json_encode($this->_index->buscar_usuario_especifico($_POST));
    }

    function desactivar_usuario(){
       echo json_encode($this->_index->desactivar_usuario($_POST['usu_codigo'],$_POST['usu_status']));
    }
    
}
?>