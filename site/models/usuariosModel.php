<?php
class usuariosModel extends Model{
    public function __construct() {
        parent::__construct();
    }

    public function guardar_usuario($datos){
        $sql2="SELECT id_usuario FROM usuario WHERE id_usuario='".$datos['usu_codigo']."'";
        $bandera =  $this->_db->query($sql2);
        $bandera=$bandera->fetch();
        if($bandera!=''){
            if ($bandera['id_usuario']==$datos['usu_codigo']){
                //'codigo duplicado'
                return "dp_codigo";
            }
        }       
        $sql="INSERT INTO usuario 
                values (
                    '".$datos['usu_codigo']."',
                    '".$datos['usu_login']."',
                    '".$datos['usu_password']."',
                    '".$datos['usu_nombre']."',
                    '".$datos['usu_nombre']."',
                    '".$datos['usu_correo']."',                
                    '1',
                    '".$datos['select_tipo_usuario']."',                
                    '".$datos['usu_telefono']."'
                )";
        $datos1=$this->_db->query($sql);
        $id=$this->_db->lastInsertId();

        $sql3="INSERT INTO empresa_usuarios 
                    values(
                        '".$datos['select_empresas_perfil']."', 
                        '".$datos['usu_codigo']."'
                )";
        $this->_db->query($sql3);
        return $id;
    }

    public function editar_usuario($datos){
        if($_SESSION['role']=='1'){
            $sql2="UPDATE `usuario` SET 
                `cho_codigo`='".$datos['usu_codigo']."', 
                `cho_nombre`='".$datos['usu_nombre']."',
                `cho_correo`='".$datos['usu_correo']."',
                `cho_telefono`='".$datos['usu_telefono']."',
                `cho_estado`='".$datos['usu_estado']."',
                `cho_equipamento`='".$datos['usu_equipamento']."',
                `id_usuario`='".$datos['usu_dispacher']."',
                `cho_nro_camion`='".$datos['usu_login']."',
                `cho_nro_trailer`='".$datos['usu_password']."'
            WHERE `usuario`.`cho_pk` ='".$datos['cho_pk']."'";
        }else if($_SESSION['role']=='2'){
            $sql2="UPDATE `usuario` SET 
                `cho_codigo`='".$datos['cho_codigo']."', 
                `cho_nombre`='".$datos['cho_nombre']."',
                `cho_correo`='".$datos['cho_correo']."',
                `cho_telefono`='".$datos['cho_telefono']."',
                `cho_estado`='".$datos['cho_estado']."',
                `cho_equipamento`='".$datos['cho_equipamento']."',
                `id_usuario`='".$datos['id_usuario']."',
                `cho_nro_camion`='".$datos['cho_nro_camion']."',
                `cho_nro_trailer`='".$datos['cho_nro_trailer']."'
            WHERE `usuario`.`cho_pk`='".$datos['cho_pk']."' AND usuario.id_usuario='".session::get('id_usuario')."'";
        }else if($_SESSION['role']=='3'){
            $sql2="UPDATE `usuario` SET 
                `cho_codigo`='".$datos['cho_codigo']."', 
                `cho_nombre`='".$datos['cho_nombre']."',
                `cho_correo`='".$datos['cho_correo']."',
                `cho_telefono`='".$datos['cho_telefono']."',
                `cho_estado`='".$datos['cho_estado']."',
                `cho_equipamento`='".$datos['cho_equipamento']."',
                `id_usuario`='".$datos['id_usuario']."',
                `cho_nro_camion`='".$datos['cho_nro_camion']."',
                `cho_nro_trailer`='".$datos['cho_nro_trailer']."'
            WHERE `usuario`.`cho_pk`='".$datos['cho_pk']."' AND usuario.id_empresa='".session::get('id_usuario')."'";
        }
        $datos=$this->_db->query($sql2);
        $filas=$datos->rowCount();
        return $filas;
    }

    public function actualizar_clave($nueva, $login){
        $sql="update usuario set password='" . Hash::getHash('sha1', $nueva, HASH_KEY) ."' where login='".$login."'";
        $this->_db->query($sql);
    }

    public function buscar_usuario($clave, $usuario){
        $sql="select * from usuario where login='".$usuario."' and password='" . Hash::getHash('sha1', $clave, HASH_KEY) ."'";
        $datos = $this->_db->query($sql);
        $datos->setFetchMode(PDO::FETCH_ASSOC);
        return $datos->fetch();
    }

    public function buscar_usuario_general(){
        if($_SESSION['role']=='1'){
            $sql='SELECT usuario.*,empresa.emp_nombre,role.nombre_role FROM usuario LEFT JOIN (empresa_usuarios INNER JOIN empresa ON empresa.emp_codigo=empresa_usuarios.emp_codigo) on usuario.id_usuario=empresa_usuarios.usu_codigo INNER JOIN role on usuario.id_role=role.id_role';
            $datos =  $this->_db->query($sql);
        }else if($_SESSION['role']=='2'){
            $sql="SELECT usuario.* FROM usuario WHERE usuario.id_usuario='".session::get('id_usuario')."'";
            $datos =  $this->_db->query($sql);
        }else if($_SESSION['role']=='3'){
            $sql="SELECT usuario.*,empresa.emp_nombre 
                        FROM usuario,empresa 
                        WHERE 
                        usuario.id_empresa='".session::get('id_usuario')."'";
            $datos =  $this->_db->query($sql);
        }        
        return $datos->fetchall();
    }

    public function buscar_usuario_especifico($datos){
        $sql="SELECT usuario.*,empresa_usuarios.emp_codigo 
                     FROM usuario INNER JOIN empresa_usuarios ON usuario.id_usuario=empresa_usuarios.usu_codigo WHERE usuario.id_usuario='".$datos['usu_codigo']."'";
        $datos =  $this->_db->query($sql);
        return $datos->fetch();
    }

    public function desactivar_usuario($usu_codigo,$usu_status){
        if($usu_status=='1'){
            $usu_status=2;
        }else{
            $usu_status=1;
        }
        $sql="UPDATE `usuario` SET `cho_status`='".$usu_status."' WHERE `cho_codigo` ='".$usu_codigo."'";
        $datos=$this->_db->query($sql);
        $filas=$datos->rowCount();
        return $filas;
    }
}   
?>