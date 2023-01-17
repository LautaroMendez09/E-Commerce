<?php 


class apiProductos_Model extends Model{

    function __construct(){
        parent::__construct();
    }

    public function get($id){
        $query = $this->db->connect()->prepare('SELECT * FROM items WHERE id = :id');
        $query->execute(['id' => $id]);

        $row = $query->fetch();

        return [
                'id'        => $row['id'],
                'nombre'    => $row['nombre'],
                'precio'    => $row['precio'],
                //'categoria' => $row['categoria'],
                'imagen'    => $row['imagen']
                ];
    }

    public function getItemsByCategory($category){
        $query = $this->db->connect()->prepare('SELECT * FROM `items`
            INNER JOIN categoriasproductos ON categoriasproductos.idProdCategoriasProd = items.id
                INNER JOIN categorias ON categorias.idCategorias = categoriasproductos.idCategCategoriasProd
                    WHERE nombreCategorias = :cat');
        $query->execute(['cat' => $category]);
        $items = [];
        
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $item = [
                    'id'        => $row['id'],
                    'nombre'    => $row['nombre'],
                    'precio'    => $row['precio'],
                    'categoria' => $row['nombreCategorias'],
                    'imagen'    => $row['imagen']
                    ];
            array_push($items, $item);
        }
        return $items;
    }
}

?>