<?php

class apiProductos_Controller extends Controller
{

    function __construct()
    {
        parent::__construct();

    }


    public function apiProd()
    {
        if (isset($_GET['categoria'])) {
            $categoria = $_GET['categoria'];

            if ($categoria == '') {
                echo json_encode([
                    'statuscode' => 400,
                    'response' => 'No existe la categoria'
                ]);
            } else {
                $productos = new apiProductos_Model();
                $items = $this->model->getItemsByCategory($categoria);
                echo json_encode([
                    'statuscode' => 200,
                    'items' => $items
                ]);
            }
        } else if (isset($_GET['get-item'])) {
            $id = $_GET['get-item'];

            if ($id == '') {
                echo json_encode([
                    'statuscode' => 400,
                    'response' => 'No hay valor para id'
                ]);
            } else {
                $productos = new apiProductos_Model();
                $item = $this->model->get($id);
                echo json_encode([
                    'statuscode' => 200,
                    'item' => $item
                ]);
            }
        } else {
            echo json_encode([
                'statuscode' => 404,
                'response' => 'No se puede procesar la solicitud'
            ]);
        }
    }
}
