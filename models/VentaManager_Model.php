<?php


class VentaManager_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }
    public function getAll()
    {
        $query = $this->db->connect()->prepare('SELECT *  FROM `venta`
                                                    INNER JOIN detalle_venta ON detalle_venta.id_ventaDV = venta.id
                                                        GROUP BY venta.id;');
        $query->execute();
        $ventas = [];
        while ($row = $query->fetch()) {

            $venta = [
                'id'     => $row['id'],
                'id_trans' => $row['id_transaccion'],
                'fecha'  => $row['fecha'],
                'envio'  => $row['envio'],
                'estado' => $row['status'],
                'email'  => $row['email'],
                'total'  => $row['total'],
            ];

            array_push($ventas, $venta);
        }
        return $ventas;
    }

    public function getVenta($id) {
        $query = $this->db->connect()->prepare('SELECT * FROM `detalle_venta` WHERE id_ventaDV = :id');
        $query->execute(['id' => $id]);
        $ventasDetail = [];
        
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $venta = [
                    
                    'name'   => $row['nombreProdDV'],
                    'cant'   => $row['precioDV'],
                    'precio' => $row['cantidadDV'],

                    ];
            array_push($ventasDetail, $venta);
        }
        return $ventasDetail;
    }

    public function removeCompra($id)
    {
        $query = $this->db->connect()->prepare('DELETE FROM compra WHERE id_compra = :id');

        if ($query->execute(['id' => $id])) {
            $querySelect = $this->db->connect()->prepare('SELECT idDC FROM `detalle_compra` WHERE id_compraDC = :idCompra');
            $querySelect->execute(['idCompra' => $id]);
            while ($idDC = $querySelect->fetch(PDO::FETCH_ASSOC)) {
                $queryDelete = $this->db->connect()->prepare('DELETE FROM detalle_compra WHERE idDC = :idDC');
                $queryDelete->execute(['idDC' => $idDC['idDC']]);
            }
        }

        return $queryDelete;
    }
}
