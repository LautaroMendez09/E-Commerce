<?php

class ProveedoresManager_Controller extends Controller
{

    function __construct() {
        parent::__construct();
        $this->view->mensaje = "";
    }

    function render()
    {
        $this->view->render('usersSession/admin');
    }
    function renderAdminProveedores()
    {
        $this->view->render('partials/panelAdmin/adminProveedores');
    }

    function getProvs()
    {

        $provs = $this->model->getAll();
        echo json_encode([
            'statuscode' => 200,
            'provs' => $provs
        ]);
        $this->view->provs = $provs;
    }

    function createProv()
    {
        $rut    = $_POST['prov_rut'];
        $name   = $_POST['prov_name'];
        $tel    = $_POST['prov_tel'];
        $direc  = $_POST['prov_direc'];
        if ($this->model->registerProv(['rut' => $rut, 'name' => $name, 'tel' => $tel, 'direc' => $direc])) {
            
            $this->view->mensaje = "Proveedor creado correctamente";

            echo json_encode([
                'statuscode' => 200,
            ]);
        }
    }

    public function updateProv() {

        $id     = $_POST['id'];
        $rut    = $_POST['prov_rut'];
        $name   = $_POST['prov_name'];
        $tel    = $_POST['prov_tel'];
        $direc  = $_POST['prov_direc'];


        if($this->model->update(['id' => $id, 'rut' => $rut, 'name' => $name, 'tel' => $tel, 'direc' => $direc])){

            echo json_encode([
                'statuscode' => 200,
            ]);
            $this->view->mensaje = "Proveedor actualizado correctamente";
        } else {
            
            echo json_encode([
                'statuscode' => 400,
            ]);
            $this->view->mensaje = "No se pudo actualizar el Proveedor";
        }
    }

    public function deleteProv() {

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
