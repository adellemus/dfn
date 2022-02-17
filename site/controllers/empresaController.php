<?php
class empresaController extends Controller{
	private $_index;
    public function __construct() {
        parent::__construct();
        $this->getLibrary('simpleimage');
        $this->_index=$this->loadModel('empresa');      
    }

    public function index(){
		if(!Session::get('autenticado')){
            $this->redireccionar('login');
        }        
		$this->_view->setJs(array('principal'));
		$this->_view->setCss(array('css'));
        $this->_view->titulo = 'Administrar Empresas';
        $empresas=$this->_index->buscar_empresa_general();
        $this->_view->empresas=$empresas;
    	$this->_view->renderizar('index');
	}

    public function influencer(){
        if(!Session::get('autenticado')){
            $this->redireccionar('login');
        }
        if(isset($_POST['emp_codigo'])){
            $perfil_empresa=$this->_index->buscar_empresa_especifico($_POST);
            $this->_view->perfil_empresa=$perfil_empresa;
            if(isset($_POST['bandera'])){
                $this->_view->setJs(array('principal'));
                $this->_view->setCss(array('css'));
                $this->_view->titulo = 'Perfil Chofer';
                $empresas=$this->_index->buscar_empresa_general();
                $this->_view->empresas=$empresas;
              
                print_r(1);
                print_r($this->_view->perfil_empresa);
                $this->_view->renderizar('influencer');    
            }else{
                echo json_encode($perfil_empresa);            
            }
        }else{
            $this->_view->setJs(array('principal'));
            $this->_view->setCss(array('css'));
            $this->_view->titulo = 'Perfil Empresa';
            $empresas=$this->_index->buscar_empresa_general();
            $this->_view->empresas=$empresas;
            $this->_view->perfil_empresa['emp_nombre']=' ';
            $this->_view->perfil_empresa['gerente_nombre']=' ';
            $this->_view->perfil_empresa['gerente_correo']=' ';
            $this->_view->perfil_empresa['gerente_telefono']=' ';
            $this->_view->renderizar('influencer');    
        }
    }

    public function guardar_empresa(){
       echo json_encode($this->_index->guardar_empresa($_POST));
    }

    public function editar_empresa(){
       echo json_encode($this->_index->editar_empresa($_POST));
    }

	function buscar_empresa_general(){
       echo json_encode($this->_index->buscar_empresa_general());
    }

    function buscar_empresa_especifico(){
        echo json_encode($this->_index->buscar_empresa_especifico($_POST));
    }

    function desactivar_empresa(){
       echo json_encode($this->_index->desactivar_empresa($_POST['emp_codigo'],$_POST['emp_status']));
    }
    
}
?>