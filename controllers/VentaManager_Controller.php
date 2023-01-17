<?php

class VentaManager_Controller extends Controller
{

    function __construct() {
        parent::__construct();
        $this->view->mensaje = "";
    }

    function render()
    {
        $this->view->render('usersSession/admin');
    }
    function renderHistVentas()
    {
        $this->view->render('partials/panelAdmin/histVentas');
    }

    function getVentas()
    {

        $ventas = $this->model->getAll();
        echo json_encode([
            'statuscode' => 200,
            'ventas' => $ventas
        ]);
        $this->view->ventas = $ventas;
    }
    
    public function getVentaByID() {
        $id = $_GET['id'];
        $ventaDetail = $this->model->getVenta($id);

        echo json_encode([
            'statuscode'    => 200,
            'ventaDetail' => $ventaDetail,
        ]);
    }

    public function deleteVenta() {

        if (isset($_GET['id'])) {
            $res = $this->model->removeVenta($_GET['id']);
            if ($res) {
                echo json_encode(['statuscode' => 200]);
            } else {
                echo json_encode(['statuscode' => 400]);
            }
        } else {
            echo json_encode(['statuscode' => 400]);
        }
    }
}
