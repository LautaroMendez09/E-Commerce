<?php


class Apibusqueda_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }
    public function busqueda($search)
    {
        
        $pdo = $this->db->connect();

        try {
            $query = $pdo->prepare('SELECT * FROM items WHERE nombre LIKE :textostr');
            // $query = '%' . $search . '%';
            $term = "%$search%";

            $query->bindParam(':textostr', $term, PDO::PARAM_STR);
            $items = [];
            $query->execute();
            while ($row = $query->fetch()) {
                $item = [
                    'id' => $row['id'],
                    'nombre' => $row['nombre'],
                    'precio' => $row['precio'],
                    'imagen' => $row['imagen'],
                ];
                array_push($items, $item);
            }
        } catch (PDOException $e) {
            var_dump($e);
        } finally {
            $pdo = null;
        }
        return $items;
    } //end ver

}
