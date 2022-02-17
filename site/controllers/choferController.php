<?php
class choferController extends Controller{
	private $_index;
    public function __construct() {
        parent::__construct();
        $this->getLibrary('simpleimage');
        $this->_index=$this->loadModel('chofer');      
    }

    public function index(){
		if(!Session::get('autenticado')){
            $this->redireccionar('login');
        }        
		$this->_view->setJs(array('principal'));
		$this->_view->setCss(array('css'));
        $this->_view->titulo = 'Administrar Choferes';
        $choferes=$this->_index->buscar_chofer_general();
        $this->_view->choferes=$choferes;
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


    public function guardar_chofer(){
       echo json_encode($this->_index->guardar_chofer($_POST));
    }

    public function editar_chofer(){
       echo json_encode($this->_index->editar_chofer($_POST));
    }

	function registrar_servicio(){
        $this->_index->registrar_servicio($_POST,$_FILES);
        $this->redireccionar('servicio');
    }

    function buscar_chofer_general(){
       echo json_encode($this->_index->buscar_chofer_general());
    }

    function buscar_chofer_especifico(){
        echo json_encode($this->_index->buscar_chofer_especifico($_POST));
    }

    function desactivar_chofer(){
       echo json_encode($this->_index->desactivar_chofer($_POST['cho_codigo'],$_POST['cho_status']));
    }
    
}
?>