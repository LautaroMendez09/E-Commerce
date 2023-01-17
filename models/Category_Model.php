<?php


class Category_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function getItemByID($id)
    {

        $query = $this->db->connect()->prepare('SELECT * FROM `items`
                                                    INNER JOIN categoriasproductos ON categoriasproductos.idProdCategoriasProd = items.id
                                                        INNER JOIN categorias ON categorias.idCategorias = categoriasproductos.idCategCategoriasProd
                                                            WHERE items.id = :id');
        $query->execute(['id' => $id]);
        $category = "";
        while ($row = $query->fetch()) {

            $category .= " " . $row['nombreCategorias'];
            $itemByID = [
                'id'          => $row['id'],
                'code'        => $row['codigoProd'],
                'name'        => $row['nombre'],
                'description' => $row['descripcionProd'],
                'category'    => $category,
                'price'       => $row['precio'],
                'image'       => $row['imagen'],
            ];
        }

        return $itemByID;
    }

    public function categoryExists($category)
    {
        $query = $this->db->connect()->prepare('SELECT nombreCategorias FROM categorias WHERE nombreCategorias = :cat');
        $query->execute(['cat' => $category]);
        if ($query->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    public function getItemsByCategory($category)
    {
        $query = $this->db->connect()->prepare('SELECT * FROM `items`
                                                    INNER JOIN categoriasproductos ON categoriasproductos.idProdCategoriasProd = items.id
                                                        INNER JOIN categorias ON categorias.idCategorias = categoriasproductos.idCategCategoriasProd
                                                            WHERE categorias.nombreCategorias = :cat');
        $query->execute(['cat' => $category]);
        $items = [];

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $item = [
                'id'          => $row['id'],
                'codigo'      => $row['codigoProd'],
                'nombre'      => $row['nombre'],
                'descripcion' => $row['descripcionProd'],
                'precio'      => $row['precio'],
                'categorias'  => $row['nombreCategorias'],
                'imagen'      => $row['imagen'],
            ];
            array_push($items, $item);
        }

        $itemsCat = $items;

        $articulos_x_pagina = 16;
        $total_articulos = $query->rowCount();
        $paginas = $total_articulos / $articulos_x_pagina;
        $paginas = ceil($paginas);

        $iniciar = ($_GET['pagina'] - 1) * $articulos_x_pagina;

        $queryItems = $this->db->connect()->prepare('SELECT * FROM `items`
                                                    INNER JOIN categoriasproductos ON categoriasproductos.idProdCategoriasProd = items.id
                                                        INNER JOIN categorias ON categorias.idCategorias = categoriasproductos.idCategCategoriasProd
                                                            WHERE categorias.nombreCategorias = :cat LIMIT :iniciar, :nitems');
        $queryItems->execute(['cat' => $category, 'iniciar' => $iniciar, 'nitems' => $articulos_x_pagina]);
        $itemsPag = $queryItems->fetchAll();

        if (empty($itemsCat)) {
            $respuesta = [
                'resp' => false,
                'msj' =>'No existen productos para esta categoria',
            ];
            return $respuesta;
        } else if (!empty($itemsCat) && $itemsPag == false) {
            $respuesta = [
                'resp' => true,
                'items' => $itemsPag,
            ];
            return $respuesta;
        } else if (!empty($itemsCat) && $itemsPag != false) {
            array_push($itemsPag, $paginas);
            $respuesta = [
                'resp' => true,
                'items' => $itemsPag,
            ];
            return $respuesta;
        }
    }
}
