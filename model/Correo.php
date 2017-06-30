<?php
/**
 * Description of Material
 *
 * @author Vito
 */
class Correo extends EntidadBase{
    private $de;
    private $para;
    private $asunto;
    private $cuerpo;
    private $parametro0;
    private $parametro1;
    private $parametro2;
    private $parametro3;
    private $parametro4;
    private $parametro5;
    private $parametro6;
    private $parametro7;
    private $parametro8;
     
    public function __construct($adapter) {
        $table="correo";
        parent::__construct($table, $adapter);
    }
    function getParametro6() {
        return $this->parametro6;
    }

    function getParametro7() {
        return $this->parametro7;
    }

    function setParametro6($parametro6) {
        $this->parametro6 = $parametro6;
    }

    function setParametro7($parametro7) {
        $this->parametro7 = $parametro7;
    }

        function getDe() {
        return $this->de;
    }

    function getPara() {
        return $this->para;
    }

    function getAsunto() {
        return $this->asunto;
    }

    function getCuerpo() {
        return $this->cuerpo;
    }

    function getParametro1() {
        return $this->parametro1;
    }

    function getParametro2() {
        return $this->parametro2;
    }

    function getParametro3() {
        return $this->parametro3;
    }

    function getParametro4() {
        return $this->parametro4;
    }

    function getParametro5() {
        return $this->parametro5;
    }

    function setDe($de) {
        $this->de = $de;
    }

    function setPara($para) {
        $this->para = $para;
    }

    function setAsunto($asunto) {
        $this->asunto = $asunto;
    }

    function setCuerpo($cuerpo) {
        $this->cuerpo = $cuerpo;
    }
    
    function setParametro0($parametro0) {
        $this->parametro0 = $parametro0;
    }

    function setParametro1($parametro1) {
        $this->parametro1 = $parametro1;
    }

    function setParametro2($parametro2) {
        $this->parametro2 = $parametro2;
    }

    function setParametro3($parametro3) {
        $this->parametro3 = $parametro3;
    }

    function setParametro4($parametro4) {
        $this->parametro4 = $parametro4;
    }

    function setParametro5($parametro5) {
        $this->parametro5 = $parametro5;
    }
    
    function setParametro8($parametro8) {
        $this->parametro8 = $parametro8;
    }

    function envioCorreoPrestamo(){
        require_once('config/global.php');
        require_once('PHPMailer/PHPMailerAutoload.php');
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true; 
        $mail->SMTPSecure = 'tls';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
	$mail->Username = GUSR;  
	$mail->Password = GPWD;   
	        
	$mail->SetFrom(GMAIL, GNAME);
	$mail->Subject = $this->asunto;
	$mail->Body = "$this->parametro8 \n"
                . "Datos. \n"
                . "RUT:     \t $this->parametro1 \n"
                . "Nombre:     \t $this->parametro0 \n"
                . "Material:\t $this->parametro2 \n"
                . "Cantidad:\t $this->parametro3 \n"
                . "Fecha prestamo:\t $this->parametro4 \n"
                . "Fecha devolucion:\t $this->parametro5 \n"
                . "Observacion:\t $this->parametro6 \n"
                . "Estado:\t $this->parametro7 \n"
                . "Para verificar esta informacion favor ingrese a Panol Web.";
	$mail->AddAddress($this->para);
        $mail->AddCC(CORREOPANOL,"Solicitud Profesor"); //AHI HABRIA QUE DEFINIR UN CORREO DEL SISTEMA PAÑOL
        //PODRIA SER EL MISMO DEL QUE ENVIA PO O NO? AL FINAL ES 1 CORREO PA TODO EL SISTEMA O ALGO ASI CREO YO.
	if(!$mail->Send()) {
		echo 'Error: '.$mail->ErrorInfo;
	} else {
		echo 'Mensaje enviado!';
	}
    }
    function envioCorreoUsuario(){
        require_once('config/global.php');
        require_once('PHPMailer/PHPMailerAutoload.php');
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true; 
        $mail->SMTPSecure = 'tls';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
	$mail->Username = GUSR;  
	$mail->Password = GPWD;   
	        
	$mail->SetFrom(GMAIL, GNAME);
	$mail->Subject = $this->asunto;
	$mail->Body = "Estimad@ $this->parametro3 $this->parametro4, sus credenciales de acceso son:\n"
                . "Credenciales. \n"
                . "Nombre de usuario:\t $this->parametro1 \n"
                . "Password:\t $this->parametro2 \n"
                . "Para verificar esta informacion favor ingrese a Panol Web mediante su usuario y password.";
	$mail->AddAddress($this->para);
	if(!$mail->Send()) {
		echo 'Error: '.$mail->ErrorInfo;
	} else {
		echo 'Mensaje enviado!';
	}
    }
    
}
