<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer/src/Exception.php";
require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/SMTP.php";



class Index_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function render()
    {
        $this->view->render('index/index');
    }
    public function nosotros()
    {
        $this->view->render('index/nosotros');
    }
    public function PreguntasFrecuentes()
    {
        $this->view->render('index/preguntasFrecuentes');
    }
    public function contacto()
    {
        $this->view->render('index/contacto');
    }
    public function envios()
    {
        $this->view->render('index/envios');
    }

    public function sendContactEmail()
    {
        

        $fullName = $_POST['contacto_nombre'] . " " . $_POST['contacto_apellido'];
        $asunto = $_POST['contacto_asunto'];
        $email = $_POST['contacto_email'];
        $mensaje = $_POST['contacto_mensaje'];
      

        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = false;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'simontw1899@gmail.com';
            $mail->Password = 'pvzojyzgeqgivksk';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('proyecto3bhls@gmail.com', 'Del Plata Indumentaria');
            $mail->addAddress($email, $fullName);

            //Content
            $mail->isHTML(true);
            $mail->Subject = $asunto;
            $mail->Body    =
                $fullName . " envio un mensaje:<br/>
                " . $mensaje;

            if ($mail->send()) {

                echo json_encode([
                    'statuscode' => 200,
                    'message' => 'Se ha enviado su correo electrónico correctamente',
                ]);
            }
        } catch (Exception $e) {
            echo 'No se pudo enviar el email: ', $mail->ErrorInfo;
        }
    }
}
