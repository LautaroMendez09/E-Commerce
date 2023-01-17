<?php

class apiCarrito_Controller extends Controller
{

    public function __construct(){
        parent::__construct();
    }

    public function apiCarri()
    {
        if (isset($_GET['action'])) {

            $accion = $_GET['action'];
            $carrito = new apiCarrito_Model();
            switch ($accion) {
                case 'mostrar':
                    $this->mostrar($carrito);
                    break;

                case 'add':
                    $this->add($carrito);
                    break;

                case 'remove':
                    $this->remove($carrito);
                    break;

                case 'delete':
                    $this->delete($carrito);
                    break;

                default:
            }
        } else {
            echo json_encode([
                'statuscode' => 404,
                'response' => 'No se puede procesar la solicitud'
            ]);
        }
    }

    public function mostrar($carrito)
    {
        $itemsCarrito = json_decode($carrito->load(), 1);
        $fullItems = [];
        $total = 0;
        $totalItems = 0;
        foreach ($itemsCarrito as $itemCarrito) {
            $httpRequest = file_get_contents('http://localhost/proyecto3BCFinal/apiProductos/apiProd?get-item=' . $itemCarrito['id']);
            $itemProducto = json_decode($httpRequest, 1)['item'];
            
            $itemProducto['cantidad'] = $itemCarrito['cantidad'];
            
            $itemProducto['subtotal'] = $itemProducto['cantidad'] * $itemProducto['precio'];
            $total += $itemProducto['subtotal'];
            $totalItems += $itemProducto['cantidad'];
            array_push($fullItems, $itemProducto);
        }
        $resArray = array('info' => ['count' => $totalItems, 'total' => $total], 'items' => $fullItems);
        echo json_encode($resArray);
    }

    public function add($carrito) {
        if (isset($_GET['id'])) {
            $res = $this->model->add($_GET['id']);
            echo $res;
        } else {
            // error
        }
    }

    public function remove($carrito) {
        if (isset($_GET['id'])) {
            $res = $this->model->remove($_GET['id']);
            if ($res) {
                echo json_encode(['statuscode' => 200]);
            } else {
                echo json_encode(['statuscode' => 400]);
            }
        } else {
            // error
        }
    }

    public function delete($carrito) {
        if (isset($_GET['id'])) {
            $res = $this->model->delete($_GET['id']);
            if ($res) {
                echo json_encode(['statuscode' => 200]);
            } else {
                echo json_encode(['statuscode' => 400]);
            }
        } else {
            // error
        }
    }

    public function clean() {
        $this->model->cleanCarrito();
    }
}
