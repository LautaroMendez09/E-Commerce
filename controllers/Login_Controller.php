<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer/src/Exception.php";
require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/SMTP.php";


class Login_Controller extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->view->errorLogin = "";
        $this->view->errorRestablecer = "";
    }

    public function render()
    {
        $this->view->render('login/index');
    }
    public function ContraseniaOlvidada()
    {
        $this->view->render('login/forgotPassword');
    }
    public function recuperarContrasenia()
    {
        $this->view->render('login/resetPassword');
    }

    public function userTest()
    {

        if (!empty($_POST["user_email"]) && !empty($_POST["password"]) && isset($_POST['user_email']) && isset($_POST['password'])) {

            $email = $_POST['user_email'];
            $pass = $_POST['password'];

            $ip = $_SERVER['REMOTE_ADDR'];
            $captcha =  $_POST['g-recaptcha-response'];
            $secretkey = '6LddvhIjAAAAABhJg41LTuQNeezVqgpoaciIkz8C';

            $respuesta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$captcha&remoteip=$ip");

            $atributos = json_decode($respuesta, TRUE);

            if (!$atributos['success']) {
                echo json_encode([
                    'statuscode' => 400,
                    'message' => 'Verifica el captcha',
                ]);
                //$this->view->errorLogin = "Verifica el captcha";
                //$this->render();
            } else {

                if ($this->model->userExists($email, $pass)) {

                    $role = $this->model->getRole($email);
                    $this->model->setUser($email);
                    $this->model->setCurrentUser($email);

                    echo json_encode([
                        'statuscode' => 200,
                        'role' => $role,
                    ]);
                } else {
                    echo json_encode([
                        'statuscode' => 400,
                        'message' => 'Correo electronico y/o password incorrecto',
                    ]);

                }
            }
        } else {
            echo json_encode([
                'statuscode' => 400,
                'message' => 'Complete todos los campos',
            ]);

        }
    }

    public function sendEmail()
    {

        if (!empty($_POST['user_email']) && isset($_POST['user_email'])) {

            $email = $_POST['user_email'];

            if ($this->emailExists($email)) {

                $user = $this->model->getNameSurname($email);
                $fullName = $user['name'] . " " . $user['surname'];
                $codigo = rand(1000, 9999);

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
                    $mail->Subject = 'Restablezca su contraseña';
                    $mail->Body    =
                        "Hola! " . $fullName . "<br/>
                        El código para restablecer su cuenta es el siguiente:" . $codigo . ".<br/>
                        Si no has sido tú, cambia tu contraseña lo antes posible";

                    if ($mail->send()) {

                        $reset = $this->model->passwordReset(['email' => $email, 'codigo' => $codigo]);

                        echo json_encode([
                            'statuscode' => 200,
                            'message' => 'Se ha enviado un correo electrónico con el código de recuperación de su cuenta',
                            'reset' => $reset,
                        ]);
                    }
                } catch (Exception $e) {
                    echo 'No se pudo enviar el email: ', $mail->ErrorInfo;
                }
            } else {
                echo json_encode([
                    'statuscode' => 400,
                    'message' => 'Correo electrónico no existente',
                ]);
            }
        } else {
            echo json_encode([
                'statuscode' => 400,
                'message' => 'Complete todos los campos',
            ]);
        }
    }

    public function emailExists($email)
    {
        if ($this->model->emailVerify($email)) {
            return true;
        } else {
            return false;
        }
    }

    public function codeExists()
    {

        if (
            !empty($_POST['code']) && isset($_POST['code']) &&
            !empty($_POST['email']) && isset($_POST['email']) &&
            !empty($_POST['token']) && isset($_POST['token'])
        ) {

            $code  = $_POST['code'];
            $email = $_POST['email'];
            $token = $_POST['token'];

            if ($this->model->codeVerify(['code' => $code, 'email' => $email, 'token' => $token])) {

                $fecha = $this->model->getDateResetPassword($email);
                $fechaActual = date("Y-m-d h:m:s");
                $seconds = strtotime($fechaActual) - strtotime($fecha);
                if ($seconds > 480) {
                    echo json_encode([
                        'statuscode' => 400,
                        'message' => 'Código vencido',
                    ]);
                } else {
                    echo json_encode([
                        'statuscode' => 200,
                        'email' => $email,
                    ]);
                }
            } else {
                echo json_encode([
                    'statuscode' => 400,
                    'message' => 'Código incorrecto',
                ]);
            }
        } else {
            echo json_encode([
                'statuscode' => 400,
                'message' => 'Complete todos los campos',
            ]);
        }
    }
    public function cambiarContrasenia()
    {

        if (
            !empty($_POST['password1']) && isset($_POST['password1']) &&
            !empty($_POST['password2']) && isset($_POST['password2'])
        ) {

            $pass1 = $_POST['password1'];
            $pass2 = $_POST['password2'];
            $email = $_POST['email'];

            function isValidWithNumbers($text)
            {
                $pattern = "/^[a-zA-Z0-9@.\sñáéíóúÁÉÍÓÚ]+$/";
                return preg_match($pattern, trim($text));
            }
            function hasCapitalLetter($text)
            {
                $pattern = "/^A-Z\+$/";
                return preg_match($pattern, trim($text));
            }
            function caracterLimit($text)
            {
                if (strlen($text) >= 6 && strlen($text) <= 20) {
                    return true;
                } else {
                    return false;
                }
            }

            if ($pass1 === $pass2) {
                if ($this->model->samePassword($pass1, $email)) {
                    echo json_encode([
                        'statuscode' => 400,
                        'message' => 'La contraseña es igual a la actual',
                    ]);
                } else {
                    if (!isValidWithNumbers($_POST['password'])) {
                        echo json_encode([
                            'statuscode' => 400,
                            'message' => 'La contraseña solo puede contener letras y números',
                        ]);
                        
                    } else if (!caracterLimit($_POST['password'])) {
                        echo json_encode([
                            'statuscode' => 400,
                            'message' => 'La contraseña debe tener entre 6 y 20 cáracteres',
                        ]);
                        
                    } else if (!hasCapitalLetter($_POST['password']) && ctype_alpha($_POST['password'])) {
                        echo json_encode([
                            'statuscode' => 400,
                            'message' => 'La contraseña debe tener al menos una mayúscula y un número',
                        ]);
                        
                    } else {
                        if ($this->model->changePassword($pass1, $email)) {
                            echo json_encode([
                                'statuscode' => 200,
                                'message' => 'Su contraseña ha sido exitosamente cambiada!',
                            ]);
                        } else {
                            echo json_encode([
                                'statuscode' => 400,
                                'message' => 'Hubo un error al intentar cambiar la contraseña',
                            ]);
                        }
                    }
                }
            } else {
                echo json_encode([
                    'statuscode' => 400,
                    'message' => 'Las contraseñas no coinciden',
                ]);
            }
        } else {
            echo json_encode([
                'statuscode' => 400,
                'message' => 'Complete todos los campos',
            ]);
        }
    }
}
