<?php

class Category_Controller extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->view->item = [];
        $this->view->category = "";
        $this->view->errorMessage = "";
    }

    function render()
    {
        $this->view->render('products/index');
    }
    function renderProductInfo()
    {
        $this->view->render('products/productInfo');
    }
    function busqueda()
    {
        $this->view->render('products/busqueda');
    }
    public function getItemByIDGET()
    {

        $id = $_GET['id'];

        $itemByID = $this->model->getItemByID($id);
        /*echo json_encode([
            'statuscode' => 200,
            'itemByID' => $itemByID
        ]);*/
        $this->view->item = $itemByID;
        $this->renderProductInfo();
    }

    public function Categoria()
    {

        if (isset($_GET['category'])) {
            $category = $_GET['category'];
            if ($category === '' || !$this->model->categoryExists($category)) {

                $this->view->mensaje = "No existe la categoria";
                $this->view->render('errores/index');
            } else {

                if (!$_GET['pagina']) {
                    header('location: ' . constant('URL') . 'Category/Categoria?category=' . $_GET['category'] . '&pagina=1');
                }

                $respuesta = $this->model->getItemsByCategory($category);

                if ($respuesta['resp'] == false) {
                    $this->view->mensaje = $respuesta['msj'];
                    $this->view->render('errores/index');
                } else if ($respuesta['resp'] == true) {

                    $items = $respuesta['items'];
                    $cantResult = count($items) - 1;
                    $this->view->paginas = $items[$cantResult];

                    if (empty($respuesta['items'])) {

                        if ($_GET['pagina'] > $items[$cantResult] || $_GET['pagina'] <= 0) {
                            header('location: ' . constant('URL') . 'Category/Categoria?category=' . $_GET['category'] . '&pagina=1');
                        }

                    } else {

                            unset($items[$cantResult]);
                            $this->view->item = $items;
                            $categoryActual = $category;
                            $category = ltrim($category, $category[0]);
                            if ($category == 'ombre') {
                                $this->view->category = 'Hombre';
                            } else if ($category == 'ujer') {
                                $this->view->category = 'Mujer';
                            } else if ($category == 'inio') {
                                $this->view->category = 'Niño';
                            } else if ($category == 'ccesorios') {
                                $this->view->category = 'Accesorios';
                            } else if ($category == 'baniadoresWaterpolo') {
                                $this->view->category = 'Bañadores Waterpolo';
                            } else if ($category == 'baniadoresNatacion') {
                                $this->view->category = 'Bañadores Natacion';
                            } else if ($category == 'baniadoresLisos') {
                                $this->view->category = 'Bañadores Lisos';
                            } else if ($category == 'baniadoresSupertank') {
                                $this->view->category = 'Bañadores Supertank';
                            } else if ($category == 'baniadoresJammer') {
                                $this->view->category = 'Bañadores Jammer';
                            } else if ($category == 'boxers') {
                                $this->view->category = 'Boxers';
                            } else if ($category == 'baniadoresSirene') {
                                $this->view->category = 'Bañadores Sirene';
                            } else if ($category == 'baniadoresTirante-Fino') {
                                $this->view->category = 'Bañadores Tirante-Fino';
                            } else if ($category == 'baniadoresRelax') {
                                $this->view->category = 'Bañadores Relax';
                            } else if ($category == 'baniadoresSenior-Master') {
                                $this->view->category = 'Bañadores Senior & Master';
                            } else if ($category == 'bikinis') {
                                $this->view->category = 'Bikinis';
                            } else if ($category == 'baniadoresNinios') {
                                $this->view->category = 'Bañadores Ninios';
                            } else if ($category == 'baniadoresNinias') {
                                $this->view->category = 'Bañadores Ninias';
                            } else if ($category == 'baniadoresMini') {
                                $this->view->category = 'Bañadores Mini';
                            } else if ($category == 'gorrosSilicona') {
                                $this->view->category = 'Gorros Silicona';
                            } else if ($category == 'gorrosLycra-Polister') {
                                $this->view->category = 'Gorros Lycra & Polister';
                            } else if ($category == 'gorrosWaterpolo') {
                                $this->view->category = 'Gorros Waterpolo';
                            } else if ($category == 'pelotasWaterpolo') {
                                $this->view->category = 'Pelotas Waterpolo';
                            } else if ($category == 'mochilas') {
                                $this->view->category = 'Mochilas';
                            } else if ($category == 'toallas') {
                                $this->view->category = 'Toallas';
                            } else if ($category == 'gafasNatacion') {
                                $this->view->category = 'Gafas Natacion';
                            } else if ($category == 'tapones-pinzas-nariz') {
                                $this->view->category = 'Tapones y Pinzas nariz';
                            }
                            $this->view->categoryActual = $categoryActual;
                            $this->render();
                    }
                }
            }
        }
    }
}
