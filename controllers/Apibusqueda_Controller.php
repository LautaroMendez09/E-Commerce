<?php

class Apibusqueda_Controller extends Controller
{

    public function render() {
        $this->view->render("products/busqueda");
    }

    public function busqueda()
    {
        
        /*$json = file_get_contents('php://input');
        $obj       = json_decode($json);
        $texto     = $obj->texto;*/
        $texto = $_POST['texto'];
        $resp = $this->model->busqueda($texto);
        //print_r($resp);
        if(!empty($resp)) {
            $this->view->items = $resp;
            $this->render();
            /*echo json_encode([
                'statuscode' => 200,
                'items' => $resp,
            ]);*/
        } else {
            echo json_encode([
                'statuscode' => 400,
                'message' => 'No se encontraron resultados',
            ]);
        }
        //$this->view->items = $resp;
        
        //$this->render();
        //header('location: ' . constant('URL') . 'products/busqueda');
        /* 
        $this->view->respuesta = json_encode($respuesta);

        $this->view->render("products/productInfo");*/
    }
}