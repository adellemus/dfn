<?php


class admin_serviciosController extends Controller
{
	
	private $_index;
    public function __construct() {
        parent::__construct();
          $this->getLibrary('simpleimage');
  	 $this->_index=$this->loadModel('admin_servicios');	
      
    }

    public function index()
    {

if(!Session::get('autenticado')){
            $this->redireccionar('login');
        }
        
			
			$this->_view->setJs(array('principal'));
			$this->_view->setCss(array('css','style'));
        	$this->_view->titulo = 'Administrar Servicios - COTEDEM';

        	$servicios=$this->_index->buscar_servicios_admin();
            $servicio_r=$this->_index->buscar_servicios_admin_solucionados();
        	
        	$this->_view->servicio_r=$servicio_r;
            $this->_view->servicio=$servicios;
			$this->_view->renderizar('index');

							
			
	}

	function registrar_servicio(){
       $this->_index->registrar_servicio($_POST);
    }


    function buscar_servicio_usuario(){
       echo json_encode( $this->_index->buscar_servicio_usuario($_POST['servicio']));
    }

    function editar_servicio_s(){
       echo json_encode( $this->_index->editar_servicio_s($_POST['id_servicio']));
    }


    function buscar_servicios_solucionados(){
       echo json_encode( $this->_index->buscar_servicios_solucionados($_POST['usuario']));
    }

 function modificar_solucion_servicio(){
    $this->_index->modificar_solucion_servicio($_POST);
    }

    function eliminar_servicio_pendiente(){
    $this->_index->eliminar_servicio_pendiente($_POST['id_servicio']);
    }

    function eliminar_solucion_servicio(){
    $this->_index->eliminar_solucion_servicio($_POST['id_servicio']);
    }

    function buscar_fotos_servicio_solucionado(){
        $datos=$this->_index->buscar_fotos_servicio_solucionado($_POST['id_solucion']);
         if(!$datos){
                    $fotos=0;
                        echo json_encode($fotos);
                }else{

         
                    for ($i=0; $i < count($datos) ; $i++) { 
                    $dataPieces = explode('/',$datos[$i]['tipo']); 
                    $solucion = 'solucion'.$i.'.'.$dataPieces[1];
                    $encodedImg1= base64_encode($datos[$i]['foto']);
                    $decodedImg1 = base64_decode($encodedImg1); 
                    file_put_contents($solucion,$decodedImg1);
                    $fotos[$i]=$solucion;
                    }
                    echo json_encode($fotos);
                    } 
                    
    }


    function buscar_fotos_pedido_servicio(){

         $datos=$this->_index->buscar_fotos_pedido_servicio($_POST['id_servicio']);
            if(!$datos){
                    $fotos=0;
                        echo json_encode($fotos);
                }else{
                        for ($i=0; $i < count($datos) ; $i++) { 
                    $dataPieces = explode('/',$datos[$i]['tipo']); 
                    $pedido = 'pedido'.$i.'.'.$dataPieces[1];
                    $encodedImg1= base64_encode($datos[$i]['foto']);
                    $decodedImg1 = base64_decode($encodedImg1); 
                    file_put_contents($pedido,$decodedImg1);
                    $fotos[$i]=$pedido;
                        
                    } 
                    echo json_encode($fotos);
                }          
                    
    }
    
    


    function cambiar_estatus_servicio(){
       $this->_index->cambiar_estatus_servicio($_POST,$_FILES);

            $horai = $_POST['hora_inicio'];
            $horaf = $_POST['hora_fin'];

            $hora_inicio = explode(":", $horai);
            $hora_fin = explode(":", $horaf);
  
if($_POST['enviar_correo']==1){
     $this->getLibrary('class.phpmailer');
            
          /* $email_user = "info@cotedem.com";
            $email_password = "Cotedem@2018";
            $asunto = "Respuesta a su solicitud de soporte";
            $nombre = $_POST['nombre'];
            $mensaje = $_POST['observacion'];
            $correo = $_POST['correo'];
            $pedido = $_POST['pedido'];
            $horai = $_POST['hora_inicio'];
            $horaf =  $_POST['hora_fin'];

            $phpmailer = new PHPMailer();

            // ---------- Datos de la cuenta de correo -----------------------------
            $phpmailer->Username = $email_user;
            $phpmailer->Password = $email_password; 
            //---------------------------------------------------------------------
            $phpmailer->SMTPSecure = 'tsl';
            $phpmailer->Host = "smtp.office365.com";
            $phpmailer->Port = 587;
            //$phpmailer->SMTPDebug = 2;
            $phpmailer->IsSMTP();
            $phpmailer->SMTPAuth = true;

            $phpmailer->setFrom($phpmailer->Username,'Soporte COTEDEM');
            $phpmailer->AddAddress($correo);
            $phpmailer->Subject =$asunto; 

            $phpmailer->Body .="<spam style='color:#000;'>Estimado (a) <b>".$nombre."</b></spam>";
            $phpmailer->Body .= "<p> Nos permitimos indicar que su requierimiento de soporte, fue <i style='color:green;'> <b> Solucionado.</b> </i></p>";
            $phpmailer->Body .="<p> <b> Observación/Solución:</b> </p> <p>".$mensaje." </p>";
             $phpmailer->Body .="<p>Si desea obtener mayor información de su soporte lo invitamos a ingresar su usuario y verificar los detalles en sus solicitudes. Haga clic aqui <a href='https://Cotedem.com/soporte/'> Sistema Soporte Cotedem.</a></p>";
             $phpmailer->Body .="<p>Sin mas que agregar, se despide el equipo de soporte de Cotedem Cia. Ltda.</p>";
             $phpmailer->Body .="<img src='https://cotedem.com/img/LogoCotedem.png' border='0' />";  
        
         

             //$phpmailer->Body .= "<p>Se inicio hoy a las "+$horai+" horas, y se finalizo a las "+$horaf+" horas</p><br> Sin mas que agregar, se Despide el equipo de soporte de Cotedem.</p>";


            $phpmailer->AddAttachment($mensaje, "attach1");
            $phpmailer->AddBCC($correo, "bcc1");
            $phpmailer->IsHTML(true);
            // Activo condificacción utf-8
            $phpmailer->CharSet = 'UTF-8';
            $enviado = $phpmailer->Send();
            if($enviado) {
                echo 'Email Enviado Exiosamente';
            }*/
// funcion buena de enviar correo xD -----------------------------------------------------
    /*    $this->getLibrary('PHPMailer');
        $this->getLibrary('SMTP');

            
            $email_user = "info@cotedem.com";
            $email_password = "Cotedem@2018";
            $asunto = "Respuesta a su solicitud de soporte";
            $nombre = $_POST['nombre'];
            $mensaje = $_POST['observacion'];
            $correo = $_POST['correo'];
            $pedido = $_POST['pedido'];
            $horai = $_POST['hora_inicio'];
            $horaf =  $_POST['hora_fin'];

            $mail = new PHPMailer\PHPMailer\PHPMailer();
            // Dile a PHPMailer que use SMTP
            $mail->isSMTP();
            // Habilitar la depuración de SMTP
            // 0 = apagado (para uso de producción)
            // 1 = mensajes del cliente
            // 2 = mensajes de cliente y servidor
            $mail->SMTPDebug = 0;
            // Establecer el nombre de host del servidor de correo
            $mail->Host = 'smtp.office365.com';
            // utilizar
            // $ mail-> Host = gethostbyname ('smtp.gmail.com');
            // si su red no soporta SMTP sobre IPv6
            // Establezca el número de puerto SMTP: 587 para TLS autenticado, a.k.a. RFC4409 envío SMTP
            $mail->Port = 587;
            // Configurar el sistema de encriptación para usar - ssl (en desuso) o tls
            $mail->SMTPSecure = 'tls';
            // Si utilizar la autenticación SMTP
            $mail->SMTPAuth = true;
            // Nombre de usuario que se usará para la autenticación SMTP: use la dirección de correo electrónico completa.
            $mail->Username = "soporte@cotedem.com";
            // Contraseña para usar para la autenticación SMTP
            $mail->Password = "Cotedem2019";
            // Establecer de quién será enviado el mensaje
            $mail->setFrom($mail->Username,'Soporte COTEDEM');
            // Establecer una dirección de respuesta alternativa
            $mail->addReplyTo('soporte@cotedem.com', 'First Last');
            // Establecer a quién se enviará el mensaje
            $mail->AddAddress($correo);
            // Establecer la línea de asunto
            $mail->Subject =$asunto; 
            // Llenar el cuerpo del mensaje.,
            $mail->Body .="<spam style='color:#000;'>Estimado (a) <b>".$nombre."</b></spam>";
            $mail->Body .= "<p> Nos permitimos indicar que su requierimiento de soporte, fue <i style='color:green;'> <b> Solucionado.</b> </i></p>";
            $mail->Body .="<p> <b> Observación/Solución:</b> </p> <p>".$mensaje." </p>";
             $mail->Body .="<p>Si desea obtener mayor información de su soporte lo invitamos a ingresar su usuario y verificar los detalles en sus solicitudes. Haga clic aqui <a href='https://Cotedem.com/soporte/'> Sistema Soporte Cotedem.</a></p>";
             $mail->Body .="<p>Sin mas que agregar, se despide el equipo de soporte de Cotedem Cia. Ltda.</p>";
             $mail->Body .="<img src='https://cotedem.com/img/LogoCotedem.png' border='0' />";  
             //$phpmailer->Body .= "<p>Se inicio hoy a las "+$horai+" horas, y se finalizo a las "+$horaf+" horas</p><br> Sin mas que agregar, se Despide el equipo de soporte de Cotedem.</p>";
            // Dile a phpmailer que es hay codigo html en el cuerpo del mensaje.,
            $mail->IsHTML(true);
            // Activo condificacción utf-8
            $mail->CharSet = 'UTF-8';
            // Adjuntar un archivo de imagen
            //$mail->addAttachment('hola');
            // enviar el mensaje, comprobar si hay errores
            if (!$mail->send()) {
                echo "Error al enviar: " . $mail->ErrorInfo;
            } else {
                echo "Mensaje enviado exisotamente.";
                   


               }*/
}


    $this->redireccionar('admin_servicios');

    }
    
function buscar_informacion_correo(){
       echo json_encode( $this->_index->buscar_informacion_correo($_POST['id_servicio']));
    }


     function reenviar_correo(){


 /*    $this->getLibrary('class.phpmailer');
            
            $email_user = "info@cotedem.com";
            $email_password = "Cotedem@2018";
            $asunto = "Respuesta a su solicitud de soporte";
            $nombre = $_POST['nombre'];
            $mensaje = $_POST['observacion'];
            $correo = $_POST['correo'];
            $phpmailer = new PHPMailer();

            // ---------- Datos de la cuenta de correo -----------------------------
            $phpmailer->Username = $email_user;
            $phpmailer->Password = $email_password; 
            //---------------------------------------------------------------------
            $phpmailer->SMTPSecure = 'ssl';
            $phpmailer->Host = "box308.bluehost.com";
            $phpmailer->Port = 465;
            //$phpmailer->SMTPDebug = 2;
            $phpmailer->IsSMTP();
            $phpmailer->SMTPAuth = true;

            $phpmailer->setFrom($phpmailer->Username,'Soporte COTEDEM');
            $phpmailer->AddAddress($correo);
            $phpmailer->Subject =$asunto; 

            $phpmailer->Body .="<spam style='color:#000;'>Estimado (a) <b>".$nombre."</b></spam>";
            $phpmailer->Body .= "<p> Nos permitimos indicar que su requierimiento de soporte, fue <i style='color:green;'> <b> Solucionado.</b> </i></p>";
            $phpmailer->Body .="<p> <b> Observación/Solución:</b> </p> <p>".$mensaje." </p>";
             $phpmailer->Body .="<p>Si desea obtener mayor información de su soporte lo invitamos a ingresar su usuario y verificar los detalles en sus solicitudes. Haga clic aqui <a href='https://Cotedem.com/soporte/'> Sistema Soporte Cotedem.</a></p>";
             $phpmailer->Body .="<p>Sin mas que agregar, se despide el equipo de soporte de Cotedem Cia. Ltda.</p>";
             $phpmailer->Body .="<img src='https://cotedem.com/img/LogoCotedem.png' border='0' />";  
        
         

             //$phpmailer->Body .= "<p>Se inicio hoy a las "+$horai+" horas, y se finalizo a las "+$horaf+" horas</p><br> Sin mas que agregar, se Despide el equipo de soporte de Cotedem.</p>";


            $phpmailer->AddAttachment($mensaje, "attach1");
            $phpmailer->AddBCC($correo, "bcc1");
            $phpmailer->IsHTML(true);
            // Activo condificacción utf-8
            $phpmailer->CharSet = 'UTF-8';
            $enviado = $phpmailer->Send();
            if($enviado) {
                echo 'Email Enviado Exiosamente';
            }*/

              $this->getLibrary('PHPMailer');
        $this->getLibrary('SMTP');

            $email_user = "info@cotedem.com";
            $email_password = "Cotedem@2018";
            $asunto = "Respuesta a su solicitud de soporte";
            $nombre = $_POST['nombre'];
            $mensaje = $_POST['observacion'];
            $correo = $_POST['correo'];

            $mail = new PHPMailer\PHPMailer\PHPMailer();
            // Dile a PHPMailer que use SMTP
            $mail->isSMTP();
            // Habilitar la depuración de SMTP
            // 0 = apagado (para uso de producción)
            // 1 = mensajes del cliente
            // 2 = mensajes de cliente y servidor
            $mail->SMTPDebug = 0;
            // Establecer el nombre de host del servidor de correo
            $mail->Host = 'smtp.office365.com';
            // utilizar
            // $ mail-> Host = gethostbyname ('smtp.gmail.com');
            // si su red no soporta SMTP sobre IPv6
            // Establezca el número de puerto SMTP: 587 para TLS autenticado, a.k.a. RFC4409 envío SMTP
            $mail->Port = 587;
            // Configurar el sistema de encriptación para usar - ssl (en desuso) o tls
            $mail->SMTPSecure = 'tls';
            // Si utilizar la autenticación SMTP
            $mail->SMTPAuth = true;
            // Nombre de usuario que se usará para la autenticación SMTP: use la dirección de correo electrónico completa.
            $mail->Username = "soporte@cotedem.com";
            // Contraseña para usar para la autenticación SMTP
            $mail->Password = "Cotedem2019";
            // Establecer de quién será enviado el mensaje
            $mail->setFrom($mail->Username,'Soporte COTEDEM');
            // Establecer una dirección de respuesta alternativa
            $mail->addReplyTo('soporte@cotedem.com', 'First Last');
            // Establecer a quién se enviará el mensaje
            $mail->AddAddress($correo);
            // Establecer la línea de asunto
            $mail->Subject =$asunto; 
            // Llenar el cuerpo del mensaje.,
            $mail->Body .="<spam style='color:#000;'>Estimado (a) <b>".$nombre."</b></spam>";
            $mail->Body .= "<p> Nos permitimos indicar que su requierimiento de soporte, fue <i style='color:green;'> <b> Solucionado.</b> </i></p>";
            $mail->Body .="<p> <b> Observación/Solución:</b> </p> <p>".$mensaje." </p>";
             $mail->Body .="<p>Si desea obtener mayor información de su soporte lo invitamos a ingresar su usuario y verificar los detalles en sus solicitudes. Haga clic aqui <a href='https://Cotedem.com/soporte/'> Sistema Soporte Cotedem.</a></p>";
             $mail->Body .="<p>Sin mas que agregar, se despide el equipo de soporte de Cotedem Cia. Ltda.</p>";
             $mail->Body .="<img src='https://cotedem.com/img/LogoCotedem.png' border='0' />";  
             //$phpmailer->Body .= "<p>Se inicio hoy a las "+$horai+" horas, y se finalizo a las "+$horaf+" horas</p><br> Sin mas que agregar, se Despide el equipo de soporte de Cotedem.</p>";
            // Dile a phpmailer que es hay codigo html en el cuerpo del mensaje.,
            $mail->IsHTML(true);
            // Activo condificacción utf-8
            $mail->CharSet = 'UTF-8';
            // Adjuntar un archivo de imagen
            //$mail->addAttachment('hola');
            // enviar el mensaje, comprobar si hay errores
            if (!$mail->send()) {
                echo "Error al enviar: " . $mail->ErrorInfo;
            } else {
                echo "Mensaje enviado exisotamente.";
                   


               }



    $this->redireccionar('admin_servicios');

    }



	function buscar_servicio_solucionado(){
       echo json_encode( $this->_index->buscar_servicio_solucionado($_POST['servicio']));
    }

	
}


?>