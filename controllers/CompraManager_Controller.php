<?php

class CompraManager_Controller extends Controller
{

    function __construct() {
        parent::__construct();
        $this->view->mensaje = "";
    }

    function render()
    {
        $this->view->render('usersSession/admin');
    }
    function renderHistCompras()
    {
        $this->view->render('partials/panelAdmin/histCompras');
    }

    function getCompras()
    {

        $compras = $this->model->getAll();
        echo json_encode([
            'statuscode' => 200,
            'compras' => $compras
        ]);
        $this->view->compras = $compras;
    }

    

    public function createCompra()
    {
        $orden = $_POST['compra_orden'];
        if($this->ordenExists($orden)) {

            $prov    = $_POST['compra_prov'];

            for ($i = 0; $i < count($_POST); $i++) {
                if (isset($_POST['compra_prod'.$i]) && isset($_POST['compra_cant'.$i]) && isset($_POST['compra_precio'.$i])) {
                    $prod[]   = $_POST['compra_prod'.$i];
                    $cant[]   = $_POST['compra_cant'.$i];
                    $precio[] = $_POST['compra_precio'.$i];
                }
            }

            $estado  = $_POST['compra_estado'];
            $notas   = $_POST['compra_notas'];
            $total   = $_POST['compra_total'];
            if ($this->model->registerCompra(['prov' => $prov, 'orden' => $orden, 'prod' => $prod, 'cant' => $cant, 'precio' => $precio, 'estado' => $estado, 'notas' => $notas, 'total' => $total])) {
                
                $this->view->mensaje = "Compra registrada correctamente";

                echo json_encode([
                    'statuscode' => 200,
                ]);
            }
        } else {
            echo json_encode([
                'statuscode' => 400,
                'message' => 'La orden de compra ya existe',
            ]);
        }
    }

    public function ordenExists($orden) {
        $resp = $this->model->ordenVerify($orden);
        return $resp;
    }

    public function getCompraByID() {
        $id = $_GET['id'];
        $compraDetail = $this->model->getCompra($id);

        echo json_encode([
            'statuscode'    => 200,
            'comprasDetail' => $compraDetail,
        ]);
    }
  
    public function updateCompra() {

        $id       = $_POST['itemId'];
        $estado   = $_POST['compra_estado'];
        $notas    = $_POST['compra_notas'];



        if($this->model->update(['id' => $id, 'estado' => $estado, 'notas' => $notas])){

            echo json_encode([
                'statuscode' => 200,
            ]);
            
        } else {
            
            echo json_encode([
                'statuscode' => 400,
            ]);
           
        }
    }

    public function deleteCompra() {

        if (isset($_GET['id'])) {
            $res = $this->model->removeCompra($_GET['id']);
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
