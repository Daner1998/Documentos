<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
class Principal extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }
    function index()
    {
        $data['title'] = 'Iniciar sesiòn';
        $this->views->getView('principal', 'index', $data);
    }

    ### LOGIN ###
    public function validar()
    {
        $correo = $_POST['correo'];
        $clave = $_POST['clave'];
        $data = $this->model->getUsuario($correo);

        if (!empty($data)) {
            if (password_verify($clave, $data['clave'])) {
                $_SESSION['id'] = $data['id'];
                $_SESSION['correo'] = $data['correo'];
                $_SESSION['nombre'] = $data['nombre'];
                $_SESSION['apellido'] = $data['apellido'];
                $res = array('tipo' => 'success', 'mensaje' => 'BIENVENIDO A AL SISTEMA DE GESTION DE ARCHIVOS');
            } else {
                $res = array('tipo' => 'warning', 'mensaje' => 'LA CONTRASEÑA INCORRECTA');
            }
        } else {
            $res = array('tipo' => 'warning', 'mensaje' => 'EL CORREO NO EXISTE');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }

    //RESETAR CLAVE
    public function enviarCorreo($correo)
    {

        $connsulta = $this->model->getUsuario($correo);
        if (!empty($connsulta)) {
            $mail = new PHPMailer(true);

            try {
                $token = md5(date('Y-m-d H:i:s'));
                $this->model->updateToken($token, $correo);
                //Server settings
                $mail->SMTPDebug = 0;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'mecatovallunos@gmail.com';                     //SMTP username
                $mail->Password   = 'cvqq pntf skfw brrv';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('dariodanner45@gmail.com', 'Gestor Documental');
                $mail->addAddress($correo);

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Restablecer Clave';
                $mail->Body    = 'Has pedido restablecer tu contraseña, si no has sido tu omite este mensaje
            <br> <a href="' . BASE_URL . 'principal/reset/' . $token . '" >CLIK AQUI PARA RESTABLECER CONTRASEÑA</a>';

                $mail->send();
                $res = array('tipo' => 'success', 'mensaje' => 'CORREO ENVIADO CON UN TOKEN DE SEGURIDAD');
            } catch (Exception $e) {
                $res = array('tipo' => 'success', 'mensaje' => $mail->ErrorInfo);
            }
        } else {
            $res = array('tipo' => 'warning', 'mensaje' => 'EL CORREO NO EXISTE');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function reset($token)
    {
        $data['title'] = 'Restablecer Clave';
        $data['usuario'] = $this->model->getToken($token);
        if ($data['usuario']['token'] == $token) {
            $this->views->getView('principal', 'reset', $data);
        } else {
            header('location: ' . BASE_URL . 'errors');
        }
    }

    public function cambiarPass()
    {
        $nueva = $_POST['clave_nueva'];
        $confirmar = $_POST['clave_confirmar'];
        $token = $_POST['token'];
        if (empty($nueva) || empty($confirmar) || empty($confirmar)) {
            $res = array('tipo' => 'warning', 'mensaje' => 'TODOS LOS CAMPOS SON REQUERIDOS');
        } else {
            if ($nueva != $confirmar) {
                $res = array('tipo' => 'warning', 'mensaje' => 'LAS CONTRASEÑAS NO CONCIDEN');
            } else {
                $resul = $this->model->getToken($token);
                if ($token == $resul['token']) {
                    $hash = password_hash($nueva, PASSWORD_DEFAULT);
                    $data = $this->model->cambiarPass($hash, $token);
                    if ($data == 1) {
                        $res = array('tipo' => 'success', 'mensaje' => 'CONTRASEÑA RESTABLECIDA');
                    } else {
                        $res = array('tipo' => 'error', 'mensaje' => 'ERROR AL RESTABLECIDA CONTRASEÑA');
                    }
                }
            }
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }
}
