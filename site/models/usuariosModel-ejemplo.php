<?php
class usuariosModel extends Model
{
    public function __construct() {
        parent::__construct();
    }
// cambiar clave de usuario
public function cambiarclave($clave, $id_usuario)
    {
        
       echo $sql="update usuario_farma set password='" . Hash::getHash('sha1', $clave, HASH_KEY) ."' where id_usuario='".$id_usuario."'";
         $this->_db->query($sql);
         return 0;
    } 

// Funcion que busca las cuentas contables registradas en el sistema para mostrarlas en la pantalla de administrar cuentas contables.
    public function buscarusuarios()
    {
     
        $sql2 = "SELECT * FROM `usuario_farma` ORDER BY `usuario_farma`.`nombre` ASC";
        $datos=$this->_db->query($sql2);
        return $datos->fetchall();
    }
// --------------------------------------------------------------------------------------------------
// Funcion que inserta un nuevo usuario al Sistema.
public function agregar_usuario($datos){
    $sql="INSERT INTO usuario_farma values (NULL,'".$datos['usuario']."' ,'" . Hash::getHash('sha1', $datos['clave'], HASH_KEY) ."','".$datos['cedula']."' ,'".$datos['nombre']."' ,'".$datos['apellido']."' ,'".$datos['correo']."','".$datos['direccion']."','".$datos['cargo']."','".$datos['lugar']."',0,'".$datos['banco']."','".$datos['tipo_cuenta']."','".$datos['nro_cuenta']."','".$datos['centro_costo']."','1','3')";
        $this->_db->query($sql);
   }
// Funcion que elimina un usuario seleccionada de la lista.
    public function eliminar_usuario($id_usuario){
   
    $sql="DELETE FROM usuario_farma WHERE id_usuario=$id_usuario";
    $datos = $this->_db->query($sql);
    return 0;
 }

 // Funcion que busca un usuario seleccionada de la lista.
    public function buscar_usuario($id_usuario){
   
    $sql="SELECT * FROM usuario_farma WHERE id_usuario=$id_usuario";
    $datos = $this->_db->query($sql);
    return $datos->fetch();
 }


public function  editar_usuario($datos){
   
    $sql2="UPDATE `usuario_farma` SET `cedula`='".$datos['cedula']."', `nombre`='".$datos['nombre']."',`apellido`='".$datos['apellido']."',`correo`='".$datos['correo']."', `direccion`='".$datos['direccion']."', `cargo`='".$datos['cargo']."', `lugar`='".$datos['lugar']."',`codigo_sad`='".$datos['codigo_sad']."',`banco`='".$datos['banco']."',`tipo_cuenta`='".$datos['tipo_cuenta']."',`nro_cuenta`='".$datos['nro_cuenta']."',`id_centro`='".$datos['centro_costo']."' WHERE `usuario_farma`.`id_usuario` ='".$datos['id_usuario']."'";
        $this->_db->query($sql2);
    return 0;
 }

 // Funcion que elimina un usuario seleccionada de la lista.
   


}
?>