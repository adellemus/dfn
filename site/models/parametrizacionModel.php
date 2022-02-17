<?php

class parametrizacionModel extends Model
{
    public function __construct() {
        parent::__construct();
    }



 public function buscar_iva(){

 $sql="SELECT * FROM `iva` where 1";
        $datos = $this->_db->query($sql);
        return $datos->fetch();
   }


   public function update_iva($datos){

 echo $sql="UPDATE `iva` SET `descripcion`='".$datos['descripcion']."',`iva`='".$datos['valor']."' WHERE  `id_iva`='".$datos['id_iva']."'";
        $datos = $this->_db->query($sql);
        return 1;
   }

 public function buscar_alimentacion(){

 $sql="SELECT * FROM `alimentacion` where 1";
        $datos = $this->_db->query($sql);
        return $datos->fetchall();
   }

   public function buscar_accesos(){

 $sql="SELECT * FROM `accesos` where 1";
        $datos = $this->_db->query($sql);
        return $datos->fetchall();
   }

   public function deshabilitar_acceso($id){

         $sql="UPDATE `accesos` SET `habilitado`='0' WHERE  `id_acceso`='".$id."'";
        $datos = $this->_db->query($sql);
        return $datos->fetch();
   }

   public function habilitar_acceso($id){

       $sql="UPDATE `accesos` SET `habilitado`='1' WHERE  `id_acceso`='".$id."'";
        $datos = $this->_db->query($sql);
        return $datos->fetch();
   }

   

   public function update_alimentacion($datos){

  $sql="UPDATE `alimentacion` SET `valor`='".$datos['valor']."' WHERE  `id_alimentacion`='".$datos['id_alimentacion']."'";
        $datos = $this->_db->query($sql);
        return 1;
   }


public function correo_parametrizacion(){

 $sql="SELECT * FROM `correo_configuracion` where 1";
        $datos = $this->_db->query($sql);
        return $datos->fetch();
   }

   public function update_correo($datos){

   $sql="UPDATE `correo_configuracion` SET email_user='".$datos['correo']."', email_password='".$datos['clave']."', smtp='".$datos['smtp']."', puerto='".$datos['puerto']."' WHERE  `id_correo_configuracion`='".$datos['id_correo_configuracion']."'";
        $datos = $this->_db->query($sql);
        return 1;
   }


public function configuracion_correo(){

 $sql="SELECT * FROM `correo_configuracion` where 1";
        $datos = $this->_db->query($sql);
        return $datos->fetch();
   }

   
}
?>
