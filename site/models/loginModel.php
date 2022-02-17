<?php
    class loginModel extends Model{
        public function __construct(){
            parent::__construct();
        }
    
        public function getUsuario($usuario, $password){
            $sql="SELECT DISTINCT usuario.*, role.nombre_role, role.id_role from usuario, role where  role.id_role=usuario.id_role and usuario.id_usuario=(SELECT id_usuario from usuario where login='".$usuario."' and password= '" . Hash::getHash('sha1', $password, HASH_KEY)."')";
            $datos = $this->_db->query($sql);
            return $datos->fetch();
        }

        public function getgerenteusuario($usuario){
            $sql="SELECT gerente_lineal.id_usuario as usuario_lineal,gerentes_ventas.id_usuario as usuario_ventas, gerentes_distrito.id_usuario as usuario_distrito, gerentes_producto.id_usuario as usuario_producto, gerente_financiero.id_usuario as usuario_financiero, gerente_general.id_usuario as usuario_general, gerentes_promocion.id_usuario as usuario_promocion, asistente_recursos_humanos.id_usuario as usuario_asistente, recursos_humanos.id_usuario as usuario_rrhh, secretarias.id_usuario as asistente from usuario, gerente_lineal,gerentes_producto,gerentes_distrito,gerente_financiero, gerente_general, gerentes_ventas, gerentes_promocion, recursos_humanos, asistente_recursos_humanos, secretarias where gerente_lineal.id_usuario=$usuario or gerentes_producto.id_usuario=$usuario or gerentes_distrito.id_usuario=$usuario or gerente_financiero.id_usuario=$usuario or gerentes_ventas.id_usuario=$usuario or gerentes_promocion.id_usuario=$usuario or gerente_general.id_usuario=$usuario or recursos_humanos.id_usuario=$usuario or asistente_recursos_humanos.id_usuario=$usuario or secretarias.id_usuario=$usuario and usuario.id_usuario=$usuario";
            $datos = $this->_db->query($sql);
            return $datos->fetch();
        }

        public function getasistentegusuario($usuario){
            $sql="SELECT departamento FROM `secretarias` where id_usuario=$usuario";
            $datos = $this->_db->query($sql);
            return $datos->fetch();
        }

        public function verificar_user($datos){
            $sql="SELECT usuario.*, role.* from usuario, empresa_usuario, role where usuario.id_usuario=empresa_usuario.id_usuario and role.id_role=empresa_usuario.id_empresa and usuario.id_usuario=(SELECT id_usuario from usuario where login='".$datos['usuario']."' and password= '" . Hash::getHash('sha1', $datos['clave'], HASH_KEY)."')";
            $rs = $this->_db->query($sql);
            $res=$rs->fetchall();
            $reg=count($res);
            if ($reg<='0'){
                $res=0;
                return $res;
            }else{
                return $res;
            }
        }
    }
?>