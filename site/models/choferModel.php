<?php
class choferModel extends Model{
    public function __construct() {
        parent::__construct();
    }

    public function guardar_chofer($datos){
        $sql2="SELECT cho_codigo FROM chofer WHERE cho_codigo='".$datos['cho_codigo']."'";
        $bandera =  $this->_db->query($sql2);
        $bandera=$bandera->fetch();
        if($bandera!=''){
            if ($bandera['cho_codigo']==$datos['cho_codigo']){
                //'codigo duplicado'
                return "dp_codigo";
            }
        }       
        $sql="INSERT INTO chofer 
                values (NULL,
                    '".$datos['cho_codigo']."',
                    '".$datos['cho_nombre']."',
                    '".$datos['cho_correo']."',
                    '".$datos['cho_telefono']."',
                    '".$datos['cho_estado']."',
                    '".$datos['cho_equipamento']."',
                    '".$datos['cho_dispacher']."',
                    '".$datos['cho_nro_camion']."',
                    '".$datos['cho_nro_trailer']."',
                    CURDATE(),
                    '1'
                )";
        $datos=$this->_db->query($sql);
        $id=$this->_db->lastInsertId();
        return $id;
    }

    public function editar_chofer($datos){
        if($_SESSION['role']=='1'){
            $sql2="UPDATE `chofer` SET 
                `cho_codigo`='".$datos['cho_codigo']."', 
                `cho_nombre`='".$datos['cho_nombre']."',
                `cho_correo`='".$datos['cho_correo']."',
                `cho_telefono`='".$datos['cho_telefono']."',
                `cho_estado`='".$datos['cho_estado']."',
                `cho_equipamento`='".$datos['cho_equipamento']."',
                `id_usuario`='".$datos['cho_dispacher']."',
                `cho_nro_camion`='".$datos['cho_nro_camion']."',
                `cho_nro_trailer`='".$datos['cho_nro_trailer']."'
            WHERE `chofer`.`cho_pk` ='".$datos['cho_pk']."'";
        }else if($_SESSION['role']=='2'){
            $sql2="UPDATE `chofer` SET 
                `cho_codigo`='".$datos['cho_codigo']."', 
                `cho_nombre`='".$datos['cho_nombre']."',
                `cho_correo`='".$datos['cho_correo']."',
                `cho_telefono`='".$datos['cho_telefono']."',
                `cho_estado`='".$datos['cho_estado']."',
                `cho_equipamento`='".$datos['cho_equipamento']."',
                `id_usuario`='".$datos['id_usuario']."',
                `cho_nro_camion`='".$datos['cho_nro_camion']."',
                `cho_nro_trailer`='".$datos['cho_nro_trailer']."'
            WHERE `chofer`.`cho_pk`='".$datos['cho_pk']."' AND chofer.id_usuario='".session::get('id_usuario')."'";
        }else if($_SESSION['role']=='3'){
            $sql2="UPDATE `chofer` SET 
                `cho_codigo`='".$datos['cho_codigo']."', 
                `cho_nombre`='".$datos['cho_nombre']."',
                `cho_correo`='".$datos['cho_correo']."',
                `cho_telefono`='".$datos['cho_telefono']."',
                `cho_estado`='".$datos['cho_estado']."',
                `cho_equipamento`='".$datos['cho_equipamento']."',
                `id_usuario`='".$datos['id_usuario']."',
                `cho_nro_camion`='".$datos['cho_nro_camion']."',
                `cho_nro_trailer`='".$datos['cho_nro_trailer']."'
            WHERE `chofer`.`cho_pk`='".$datos['cho_pk']."' AND chofer.id_empresa='".session::get('id_usuario')."'";
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

    public function buscar_chofer_general(){
        if($_SESSION['role']=='1'){
            $sql="SELECT * FROM chofer";
            $datos =  $this->_db->query($sql);
        }else if($_SESSION['role']=='2'){
            $sql="SELECT * FROM chofer WHERE chofer.id_usuario='".session::get('id_usuario')."'";
            $datos =  $this->_db->query($sql);
        }else if($_SESSION['role']=='3'){
            $sql="SELECT * FROM chofer WHERE chofer.id_empresa='".session::get('id_usuario')."'";
            $datos =  $this->_db->query($sql);
        }        
        return $datos->fetchall();
    }

    public function buscar_chofer_especifico($datos){
        $sql="SELECT * FROM chofer WHERE chofer.cho_codigo='".$datos['cho_codigo']."'";
        $datos =  $this->_db->query($sql);
        return $datos->fetch();
    }


    public function desactivar_chofer($cho_codigo,$cho_status){
        if($cho_status=='1'){
            $cho_status=2;
        }else{
            $cho_status=1;
        }
        $sql="UPDATE `chofer` SET `cho_status`='".$cho_status."' WHERE `cho_codigo` ='".$cho_codigo."'";
        $datos=$this->_db->query($sql);
        $filas=$datos->rowCount();
        return $filas;
    }
}   
?>