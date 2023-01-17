<?php

class UserSession_Controller extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function render()
    {
        $this->view->render('usersSession/index');
    }

    public function SessionStatus()
    {

        $email = $this->model->getCurrentUser();

        if (isset($email)) {

            $role = $this->model->rolValidation($email);
            $user = $this->model->getUser($email);
            switch ($role) {
                case 'account':

                    

                    if ($user['phone'] == 0 || $user['phone'] == null) {
                        $user['phone'] = '';
                    }


                    $this->view->user = $user;
                    $this->view->render('usersSession/index');
                    break;

                case 'gerente':

                    $this->view->user = $user;
                    $this->view->render('usersSession/gerente');
                    break;

                case 'admin':
                    
                    $this->view->user = $user;
                    $this->view->render('usersSession/admin');
                    break;

                default:
            }
        } else {
            //echo "no hay sesión";
            header('location: ../login');
            $this->view->render('login/index');
        }
    }

    public function changePassword()
    {

        if (
            !empty($_POST['passwordActual']) && isset($_POST['passwordActual']) &&
            !empty($_POST['passwordNew1']) && isset($_POST['passwordNew1']) &&
            !empty($_POST['passwordNew2']) && isset($_POST['passwordNew2'])
        ) {

            $passActual = $_POST['passwordActual'];
            $email = $this->model->getCurrentUser();

            if ($this->model->verifyPassword($email, $passActual)) {

                $passNew1 = $_POST['passwordNew1'];
                $passNew2 = $_POST['passwordNew2'];

                if ($passNew1 == $passNew2) {

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

                    if ($passActual == $passNew1) {
                        echo json_encode([
                            'statuscode' => 400,
                            'message' => 'La contraseña es igual a la actual',
                        ]);
                    } else {
                        if (!isValidWithNumbers($passNew1)) {
                            echo json_encode([
                                'statuscode' => 400,
                                'message' => 'La contraseña solo puede contener letras y números',
                            ]);
                        } else if (!caracterLimit($passNew1)) {
                            echo json_encode([
                                'statuscode' => 400,
                                'message' => 'La contraseña debe tener entre 6 y 20 cáracteres',
                            ]);
                        } else if (!hasCapitalLetter($passNew1) && ctype_alpha($passNew1)) {
                            echo json_encode([
                                'statuscode' => 400,
                                'message' => 'La contraseña debe tener al menos una mayúscula y un número',
                            ]);
                        } else {
                            if ($this->model->changePassword($passNew1, $email)) {
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
                        'message'    => 'Las contraseñas no coinciden',
                    ]);
                }
            } else {
                echo json_encode([
                    'statuscode' => 400,
                    'message'    => 'La contraseña actual no es correcta',
                ]);
            }
        } else {
            echo json_encode([
                'statuscode' => 400,
                'message'    => 'Complete todos los campos',
            ]);
        }
    }

    public function Logout()
    {
        $this->model->closeSession();
    }

    public function deleteAccount()
    {

        if (!empty($_POST['password']) && isset($_POST['password'])) {

            $password = $_POST['password'];
            $email = $this->model->getCurrentUser();

            if ($this->model->verifyPassword($email, $password)) {

                if ($this->model->delete($email, $password)) {
                    $this->Logout();
                    echo json_encode([
                        'statuscode' => 200,
                    ]);
                } else {
                    echo json_encode([
                        'statuscode' => 400,
                        'message'    => 'Ocurrio un error',
                    ]);
                }
            } else {
                echo json_encode([
                    'statuscode' => 400,
                    'message'    => 'La contraseña no es correcta',
                ]);
            }
        } else {
            echo json_encode([
                'statuscode' => 400,
                'message'    => 'Complete todos los campos',
            ]);
        }
    }
}
