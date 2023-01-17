<?php


class ProductManager_Controller extends Controller
{

    function __construct() {
        parent::__construct();
        $this->view->mensaje = "";
    }
    public function render() {
        $this->view->render('usersSession/admin');
    }
    public function renderAdminProducts() {
        $this->view->render('partials/panelAdmin/adminProducts');
    }
    public function getItems() {

        $items = $this->model->getAll();
        echo json_encode([
            'statuscode' => 200,
            'items' => $items
        ]);
        $this->view->items = $items;
    }
    public function getItemsNames() {

        $items = $this->model->getNames();
        echo json_encode([
            'statuscode' => 200,
            'items' => $items
        ]);
        $this->view->items = $items;
    }
    public function getCategories() {
        $categories = $this->model->getAllCategories();
        echo json_encode([
            'statuscode' => 200,
            'categories' => $categories
        ]);
    }

    public function getItemByID() {

        $id = $_POST['itemId'];

        $itemByID = $this->model->getItemByID($id);
        echo json_encode([
            'statuscode' => 200,
            'itemByID' => $itemByID
        ]);
    }

    public function getItemByCode() {

        $code = $_GET['code'];
        $itemByCode = $this->model->getItemByCode($code);
        echo json_encode([
            'statuscode' => 200,
            'itemByCode' => $itemByCode
        ]);
    }

    public function deleteItem() {

        if (isset($_GET['id'])) {
            $res = $this->model->removeItem($_GET['id']);
            if ($res) {
                echo json_encode(['statuscode' => 200]);
            } else {
                echo json_encode(['statuscode' => 400]);
            }
        } else {
            // error
        }
    }
    public function updateItem() {

        $id          = $_POST['id'];
        $codigo      = $_POST['item_code'];
        $name        = $_POST['item_name'];
        $description = $_POST['item_description'];
        $price       = $_POST['item_price'];
        $image       = $_FILES['item_image']['name'];

        $categories = $this->model->getAllCategories();
        $cantCat = count($categories);
        $i = 0;
        
        for ($i=0; $i < $cantCat; $i++) { 
            
            if (isset($_POST['item_category'.$i])) {
                $category[] = $_POST['item_category'.$i];
            }  
        } 
        //print_r($category);
        if($this->model->update(['id' => $id, 'code' => $codigo, 'category' => $category, 'name' => $name, 'description' => $description, 'price' => $price, 'image' => $image])){

            echo json_encode([
                'statuscode' => 200,
            ]);
            $this->view->mensaje = "Producto actualizado correctamente";
        } else {
            
            echo json_encode([
                'statuscode' => 400,
            ]);
            $this->view->mensaje = "No se pudo actualizar el producto";
        }
        
    }

    public function createItem() {


        $codigo      = $_POST['item_code'];
        $name        = $_POST['item_name'];
        $description = $_POST['item_description'];
        $price       = $_POST['item_price'];

        $cantPOST = count($_POST);
        $i = 0;
        
        for ($i=0; $i < $cantPOST; $i++) { 
            if (isset($_POST['item_category'.$i])) {
                $idCategory[] = $_POST['item_category'.$i];
            }  
        } 

        $image       = $_FILES['item_image']['name'];
        
        $directorio =  $_SERVER["DOCUMENT_ROOT"] . '/proyecto3BCFinal/public/img/productos/';
        $rutaImage = $directorio . basename($_FILES["item_image"]["name"]);
        $tipoArchivo = strtolower(pathinfo($rutaImage, PATHINFO_EXTENSION));
        $imageSize = getimagesize($_FILES["item_image"]["tmp_name"]);
        if($imageSize != false){

            //validando tamaño del archivo
            $size = $_FILES["item_image"]["size"];
    
            if($size > 5000000){
                //echo "El archivo tiene que ser menor a 5mb";
            }else{
                //validar tipo de imagen
                if($tipoArchivo == "jpg" || $tipoArchivo == "jpeg"){
                    // se validó el archivo correctamente
                    if(move_uploaded_file($_FILES["item_image"]["tmp_name"], $rutaImage) && $this->model->registerItem(['code' => $codigo, 'category' => $idCategory, 'name' => $name, 'description' => $description, 'price' => $price, 'image' => $image])){
                        $this->view->mensaje = "Producto creado correctamente";
            
                        echo json_encode([
                            'statuscode' => 200,
                            //'codeItem'   => $codigo,
                        ]);
                        //echo "El archivo se subió correctamente";
                    }else{
                        $this->view->mensaje = "No se pudo crear el producto";
                        echo json_encode([
                            'statuscode' => 400,
                        ]);
                        //echo "Hubo un error en la subida del archivo";
                    }
                }else{
                    //echo "Solo se admiten archivos jpg/jpeg";
                }
            }
        }else{
            //echo "El documento no es una imagen";
        }     
    }    
}