<?php

class Register_Controller extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->view->errorRegister = "";
        //echo "<p>Nuevo controlador Main</p>";
    }
    public function render()
    {
        $this->view->render('register/index');
    }
    public function userNew()
    {
        if (
            !empty($_POST['user_name'])    && isset($_POST['user_name']) &&
            !empty($_POST['user_surname']) && isset($_POST['user_surname']) &&
            !empty($_POST['user_email'])   && isset($_POST['user_email']) &&
            !empty($_POST['password'])     && isset($_POST['password'])
        ) {

            function isValid($text)
            {
                $pattern = "/^[a-zA-Z@.\sñáéíóúÁÉÍÓÚ]+$/";
                return preg_match($pattern, trim($text));
            }
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
            function caracterLimitEmail($text)
            {
                if (strlen($text) >= 6 && strlen($text) <= 60) {
                    return true;
                } else {
                    return false;
                }
            }

            if (!isValid($_POST['user_name']) && !ctype_alpha($_POST['user_name'])) {
                echo json_encode([
                    'statuscode' => 400,
                    'message' => 'El nombre solo puede contener letras',
                ]);
                
            } else if (!isValid($_POST['user_surname']) && !ctype_alpha($_POST['user_surname'])) {
                echo json_encode([
                    'statuscode' => 400,
                    'message' => 'El apellido solo puede contener letras',
                ]);
                
            } else if (!isValidWithNumbers($_POST['user_email'])) {
                echo json_encode([
                    'statuscode' => 400,
                    'message' => 'El correo electrónico solo puede contener letras y números',
                ]);
                
            } else if (!caracterLimitEmail($_POST['user_email'])) {
                echo json_encode([
                    'statuscode' => 400,
                    'message' => 'El correo electrónico debe tener entre 6 y 60 cáracteres',
                ]);
                
            } else if (!isValidWithNumbers($_POST['password'])) {
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

                $name = $_POST['user_name'];
                $surname = $_POST['user_surname'];
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
                    //$this->view->errorRegister = "Verifica el captcha";
                    //$this->view->render('register/index');
                } else {

                    if ($this->model->emailExists($email)) {
                        echo json_encode([
                            'statuscode' => 400,
                            'message' => 'Correo electronico ya existente',
                        ]);
                        //$this->view->render('register/index');
                        //$this->view->errorRegister = "Correo electronico ya existente";
                    } else {
                        $this->model->userCreate($name, $surname, $email, $pass);
                        echo json_encode([
                            'statuscode' => 200,
                            'message' => 'Creado',
                        ]);
                    }
                }
            }
        } else {
            echo json_encode([
                'statuscode' => 400,
                'message' => 'Complete todos los campos',
            ]);
        }
    }
}
