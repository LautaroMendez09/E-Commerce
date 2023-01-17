<?php

class DatosPersonalesManager_Controller extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "";
    }

    function render()
    {
        $this->view->render('usersSession/index');
    }


    public function updateUser()
    {

        if (
            !empty($_POST['user_name'])    && isset($_POST['user_name']) &&
            !empty($_POST['user_surname']) && isset($_POST['user_surname'])
        ) {

            $id        = $_POST['id'];
            $name      = $_POST['user_name'];
            $surname   = $_POST['user_surname'];
            $address   = $_POST['user_address'];
            $phone     = $_POST['user_phone'];


            function isValid($text) {
                $pattern = "/^[a-zA-Z@.\sñáéíóúÁÉÍÓÚ]+$/";
                return preg_match($pattern, trim($text));
            }
            function isValidWithoutSpaces($text) {
                $pattern = "/^[a-zA-Z0-9@.sñáéíóúÁÉÍÓÚ]+$/";
                return preg_match($pattern, trim($text));
            }
            function isValidWithNumbers($text) {
                $pattern = "/^[a-zA-Z0-9@.\sñáéíóúÁÉÍÓÚ]+$/";
                return preg_match($pattern, trim($text));
            }
            function caracterLimit($text) {
                if (strlen($text) >= 6 && strlen($text) <= 20) {
                    return true;
                } else {
                    return false;
                }
            }
            function caracterLimitFullName($text) {
                if (strlen($text) >= 2 && strlen($text) <= 20) {
                    return true;
                } else {
                    return false;
                }
            }
            function caracterLimitAddress($text) {
                if (strlen($text) >= 6 && strlen($text) <= 120) {
                    return true;
                } else {
                    return false;
                }
            }


            if (!isValid($name) && !ctype_alpha($name)) {
                echo json_encode([
                    'statuscode' => 400,
                    'message' => 'El nombre solo puede contener letras',
                ]);
            } else if (!caracterLimitFullName($name) && !caracterLimitFullName($surname)) {
                echo json_encode([
                    'statuscode' => 400,
                    'message' => 'El nombre y el apellido deben tener entre 2 y 20 cáracteres',
                ]);
            } else if (!isValid($surname) && !ctype_alpha($surname)) {
                echo json_encode([
                    'statuscode' => 400,
                    'message' => 'El apellido solo puede contener letras',
                ]);
            } else if (!empty($address) && !isValidWithNumbers($address)) {
                echo json_encode([
                    'statuscode' => 400,
                    'message' => 'La dirección solo puede contener letras y números',
                ]);
            } else if (!empty($address) && !caracterLimitAddress($address)) {
                echo json_encode([
                    'statuscode' => 400,
                    'message' => 'La dirección debe tener entre 6 y 120 cáracteres',
                ]);
            } else if (!empty($address) && !preg_match('/^[0-9]+$/', trim($phone))) {
                echo json_encode([
                    'statuscode' => 400,
                    'message' => 'El teléfono solo puede contener números',
                ]);
            } else if (!empty($address) && !caracterLimit($phone)) {
                echo json_encode([
                    'statuscode' => 400,
                    'message' => 'El teléfono debe tener entre 6 y 20 cáracteres',
                ]);
            } else {
                
                if($this->model->sameUser(['id' => $id, 'name' => $name, 'surname' => $surname, 'phone' => $phone, 'address' => $address])) {

                    if ($this->model->update(['id' => $id, 'name' => $name, 'surname' => $surname, 'phone' => $phone, 'address' => $address])) {

                        echo json_encode([
                            'statuscode' => 200,
                            'message' => 'Usuario actualizado correctamente',
                        ]);
                    } else {
            
                        echo json_encode([
                            'statuscode' => 400,
                            'message' => 'No se pudo actualizar el usuario',
                        ]);
                    }

                } else {
                    echo json_encode([
                        'statuscode' => 400,
                        'message' => 'Los datos ingresados son idénticos a los actuales',
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

    public function deleteProv()
    {

        if (isset($_GET['id'])) {
            $res = $this->model->removeProv($_GET['id']);
            if ($res) {
                echo json_encode(['statuscode' => 200]);
            } else {
                echo json_encode(['statuscode' => 400]);
            }
        } else {
            // error
        }
    }
}
