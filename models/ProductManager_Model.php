<?php


class ProductManager_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function getAll(){
        $query = $this->db->connect()->prepare('SELECT * FROM `items`
        INNER JOIN categoriasproductos ON categoriasproductos.idProdCategoriasProd = items.id
            INNER JOIN categorias ON categorias.idCategorias = categoriasproductos.idCategCategoriasProd
                ORDER BY items.id');
        $query->execute();
        $items = [];
        while ($row = $query->fetch()) {

            $item = [
                'id'          => $row['id'],
                'code'        => $row['codigoProd'],
                'name'        => $row['nombre'],
                'description' => $row['descripcionProd'],
                'stock'       => $row['cantidad'],
                'price'       => $row['precio'],
                'category'    => $row['nombreCategorias'],
                'image'       => $row['imagen'],

                'idProdCategoriasProd' => $row['idProdCategoriasProd'],
            ];

            array_push($items, $item);
        }
        return $items;
    }
    
    public function getNames(){
        $query = $this->db->connect()->prepare('SELECT id, nombre FROM `items`');
        $query->execute();
        $items = [];
        while ($row = $query->fetch()) {

            $item = [
                'id'   => $row['id'],
                'name' => $row['nombre'],
            ];

            array_push($items, $item);
        }
        return $items;
    }

    public function getAllCategories() {
        $query = $this->db->connect()->prepare('SELECT nombreCategorias FROM categorias');
        $query->execute();
 
        $categories = [];
        while ($row = $query->fetch()) {

            $category = [
                'category' => $row['nombreCategorias'],
                
            ];

            array_push($categories, $category);
        }
        return $categories;
    }

    public function removeItem($id){
        $query = $this->db->connect()->prepare('DELETE FROM items WHERE id = :id');
        $query->execute(['id' => $id]);
        return $query;
    }

    public function update($item) {
        
        $query = $this->db->connect()->prepare("UPDATE `items` SET codigoProd = :code, nombre = :name, descripcionProd = :description, precio = :price WHERE id = :id");
        try {
            $query->execute([
                'id'          => $item['id'],
                'code'        => $item['code'],
                'name'        => $item['name'],
                'description' => $item['description'],
                'price'       => $item['price'],
                //'image'       => $item['image'],
            ]);
            if($this->updateCategory($item)){
                return true;
            } else {
                return false;
            } 
        }catch (PDOException $e) {
            return false;
        }
    }

    public function updateCategory($item) {
        $query = $this->db->connect()->prepare('SELECT items.id FROM items WHERE items.codigoProd = :code');
        if ($query->execute(['code' => $item['code']])) {
            $id = $query->fetch();
            $querySelect = $this->db->connect()->prepare('SELECT idCategoriasProd FROM `categoriasproductos` WHERE idProdCategoriasProd = :id');
            if ($querySelect->execute(['id' => $id['id']])) {
                
                $idsCategoriasProductos = [];
                while ($row = $querySelect->fetch()) {
                    $ids= [
                        'idCategoriasProd' => $row['idCategoriasProd'],
                    ];
                    array_push($idsCategoriasProductos, $ids);
                }
                
                foreach ($idsCategoriasProductos as $idCat) {
                    $queryDelete = $this->db->connect()->prepare("DELETE FROM `categoriasproductos` WHERE idCategoriasProd = :idCat");
                    $queryDelete->execute(['idCat' => $idCat['idCategoriasProd']]);
                }
                $query = $this->db->connect()->prepare('SELECT categorias.idCategorias FROM categorias WHERE categorias.nombreCategorias = :category');

                $i = 0;
                $cantCategorias = count($item['category']);
                foreach ($item['category'] as $category) {
                    $query->execute(['category' => $category]);
                    $idCategory = $query->fetch();
                    $queryInsert = $this->db->connect()->prepare('INSERT INTO categoriasproductos (idCategoriasProd, idProdCategoriasProd, idCategCategoriasProd) VALUES (NULL, :idProd, :idCategoria)');

                    if ($queryInsert->execute(['idProd' => $id['id'], 'idCategoria' => $idCategory['idCategorias']])) {
                        $i++;
                        if ($i == $cantCategorias) {
                            return true;
                        }
                    } else {
                        return false;
                    }  
                }
            }
        } else {
            return false;
        }
    }

    public function getItemByID($id){

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
         //$this->getCategoryById($id);
        return $itemByID;
    }

    public function getItemByCode($code){
        
        $query = $this->db->connect()->prepare('SELECT * FROM items WHERE codigoProd = :code');
        $query->execute(['code' => $code]);

        while ($row = $query->fetch()) {

            $ItemByCode = [
                'id'          => $row['id'],
                'code'        => $row['codigoProd'],
                'name'        => $row['nombre'],
                'description' => $row['descripcionProd'],
                'price'       => $row['precio'],
                'image'       => $row['imagen'],
            ];
        }
        return $ItemByCode;
    }


    public function registerItem($item) {
  
        $query = $this->db->connect()->prepare('INSERT INTO items (codigoProd, nombre, descripcionProd, precio, imagen) 
                                                    VALUES (:code, :name, :description, :price, :image)');
        
        try { 
            $query->execute([
            'code'        => $item['code'],
            'name'        => $item['name'],
            'description' => $item['description'],
            'price'       => $item['price'],
            'image'       => $item['image'],
            ]);
            if($this->itemWithCategory($item)){
                return true;
            } else {
                return false;
            } 
        } catch (PDOException $e) {
            return false;
        }
    }

    public function itemWithCategory($item) {
        
        
        $query = $this->db->connect()->prepare('SELECT items.id FROM items WHERE items.codigoProd = :code');
        if ($query->execute(['code' => $item['code']])) {
            $id = $query->fetch();
            $query = $this->db->connect()->prepare('SELECT categorias.idCategorias FROM categorias WHERE categorias.nombreCategorias = :category');

            $i = 0;
            $cantCategorias = count($item['category']);
            
            foreach ($item['category'] as $category) {
                $query->execute(['category' => $category]);
                $idCategory = $query->fetch();
                $queryInsert = $this->db->connect()->prepare('INSERT INTO categoriasproductos (idCategoriasProd, idProdCategoriasProd, idCategCategoriasProd) 
                                                                VALUES (NULL, :idProd, :idCategoria)');

                if ($queryInsert->execute(['idProd' => $id['id'], 'idCategoria' => $idCategory['idCategorias']])) {
                    $i++;
                    if ($i == $cantCategorias) {
                        return true;
                    }
                } else {
                    return false;
                }  
            }
 
        } else {
            return false;
        }

    }
    
}

