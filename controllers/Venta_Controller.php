<?php

class Venta_Controller extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->view->mensajeError = '';
    }
    function render()
    {
        $this->view->render('compra/index');
    }
    function pago()
    {
        $session = $this->model->verifyCurrentSession();
        if (isset($session)) {
            $this->view->render('compra/pago');
        } else {
            $this->render();
        }
    }
    function verifySession()
    {
        $session = $this->model->verifyCurrentSession();

        if (!empty($session) && isset($session)) {
            $prods = [];

            for ($i = 0; $i < count($_POST) / 2; $i++) {
                $prod = [
                    'id' => $_POST['id' . $i],
                    'cant' => $_POST['cant' . $i],
                ];
                array_push($prods, $prod);
            }

            $hasStock = $this->model->checkStock($prods);

            $cantProds = count($prods);
            $prodsWithStock = 0;
            $prodsWithoutStock = [];

            if ($hasStock != []) {
                foreach ($prods as $prod) {

                    for ($j = 0; $j < count($hasStock); $j++) {

                        if ($prod['id'] == $hasStock[$j]['id']) {
                            $prodsWithStock++;
                            continue 2;
                        } else {

                            if ($j == count($hasStock) - 1) {
                                $prodWithoutStock = [
                                    'id' => $prod['id'],
                                ];
                                array_push($prodsWithoutStock, $prodWithoutStock);
                            }
                        }
                    }
                }

                if ($cantProds == $prodsWithStock) {
                    echo json_encode([
                        'statuscode' => 200,
                    ]);
                } else if ($prodsWithStock < $cantProds) {
                    echo json_encode([
                        'statuscode' => 400,
                        'ids' => $prodsWithoutStock,
                    ]);
                }
            } else {
                echo json_encode([
                    'statuscode' => 400,
                    'msj' => 'Ningun producto tiene stock.',
                ]);
            }
        } else {
            echo json_encode([
                'statuscode' => 400,
                'msj' => 'Necesitas estar ingresado para realizar una compra',
            ]);
        }
    }

    function capturaVenta()
    {
        $json = file_get_contents('php://input');
        $datos = json_decode($json, true);

        $email = $this->model->verifyCurrentSession();
        $id_user = $this->model->getIdByEmail($email);

        if (is_array($datos)) {
            $id_transaccion = $datos['detalles']['id'];
            $total = $datos['detalles']['purchase_units'][0]['amount']['value'];
            $status = $datos['detalles']['status'];
            $fecha = $datos['detalles']['update_time'];
            $fecha_nueva = date('Y-m-d H:i:s', strtotime($fecha));
            $email = $datos['detalles']['payer']['email_address'];
            $id_cliente = $datos['detalles']['payer']['payer_id'];
            $metodoEnvio = $datos['envio'];

            if ($this->model->registrarVenta([
                'id_transaccion' => $id_transaccion, 'total' => $total,
                'status' => $status, 'fecha' => $fecha_nueva, 'email' => $email, 'id_user' => $id_user,
                'id_cliente' => $id_cliente, 'envio' => $metodoEnvio
            ])) {
                echo json_encode([
                    'statuscode' => 200,
                ]);
            } else {
                echo json_encode([
                    'statuscode' => 400,
                ]);
            }
        } else {
            echo json_encode([
                'statuscode' => 400,
            ]);
        }
    }

    function getVentasByUser()
    {

        /*if(isset($_GET['id']) && $_SESSION['email'] == $_GET['id']) {
            
        }*/
        $id = $_GET['id'];

        $ventas = $this->model->getVentas($id);

        echo json_encode([
            'statuscode' => 200,
            'ventas'     => $ventas,
        ]);
    }
}
