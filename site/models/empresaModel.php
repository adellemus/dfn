<?php
class empresaModel extends Model{
    public function __construct() {
        parent::__construct();
    }

    public function guardar_empresa($datos){
        $sql2="SELECT emp_codigo FROM empresa WHERE emp_codigo='".$datos['emp_codigo']."'";
        $bandera =  $this->_db->query($sql2);
        $bandera=$bandera->fetch();
        if($bandera!=''){
            if ($bandera['emp_codigo']==$datos['emp_codigo']){
                //'codigo duplicado'
                return "dp_codigo";
            }
        }       
        $sql="INSERT INTO empresa 
                values (
                    '".$datos['emp_codigo']."',
                    '".$datos['emp_nombre']."',
                    CURDATE(),
                    '1'
                )";
        $datos=$this->_db->query($sql);
        $id=$this->_db->lastInsertId();
        return $id;
    }

    public function editar_empresa($datos){
        if($_SESSION['role']=='1'){
            $sql2="UPDATE `empresa` SET 
                `emp_codigo`='".$datos['emp_codigo']."', 
                `emp_nombre`='".$datos['emp_nombre']."'
            WHERE `empresa`.`emp_codigo` ='".$datos['emp_codigo']."'";
        }
        $datos=$this->_db->query($sql2);
        $filas=$datos->rowCount();
        return $filas;
    }

    public function buscar_empresa_general(){
        if($_SESSION['role']=='1'){
            $sql="SELECT * FROM empresa";
            $datos =  $this->_db->query($sql);
        }elseif($_SESSION['role']=='3'){
            $sql="SELECT empresa.* 
                    FROM empresa, empresa_gerente
                    WHERE empresa_gerente.emp_codigo=empresa.emp_codigo AND empresa_gerente.usu_codigo='".$_SESSION['id_usuario']."'";
            $datos =  $this->_db->query($sql);
        } 
        return $datos->fetchall();
    }

    public function buscar_empresa_especifico($datos){
        $sql="SELECT empresa.*,usuario.nombre as gerente_nombre,
                                usuario.correo as gerente_correo,
                                usuario.telefono as gerente_telefono  FROM empresa,usuario,empresa_gerente 

                    WHERE empresa.emp_codigo='".$datos['emp_codigo']."' 
                    and empresa.emp_codigo=empresa_gerente.emp_codigo 
                    and empresa_gerente.usu_codigo=usuario.id_usuario ";
        $datos =  $this->_db->query($sql);
        return $datos->fetch();
    }


    public function desactivar_empresa($emp_codigo,$emp_status){
        if($emp_status=='1'){
            $emp_status=2;
        }else{
            $emp_status=1;
        }
        $sql="UPDATE `empresa` SET `emp_status`='".$emp_status."' WHERE `emp_codigo` ='".$emp_codigo."'";
        $datos=$this->_db->query($sql);
        $filas=$datos->rowCount();
        return $filas;
    }
}   
?>