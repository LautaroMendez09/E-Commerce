<?php


class CompraManager_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }
    public function getAll(){
        $query = $this->db->connect()->prepare('SELECT *  FROM `compra`
                                                    INNER JOIN proveedores ON compra.RUT = proveedores.RUT
                                                        INNER JOIN detalle_compra ON compra.id_compra = detalle_compra.id_compraDC
                                                            GROUP BY compra.id_compra;');
        $query->execute();
        $compras = [];
        while ($row = $query->fetch()) {

            $compra = [
                'id'     => $row['id_compra'],
                'name'   => $row['nombre'],
                'orden'  => $row['orden'],
                'estado' => $row['estado'],
                'notas'  => $row['notas'],
                'total'  => $row['total'],
            ];

            array_push($compras, $compra);
        }
        return $compras;
    }
    


    public function registerCompra($compra) {
        
        
        $rut = $this->getRUT($compra['prov']);
        $nombsProd = $this->getNameProd($compra['prod']);
        
        
        $query = $this->db->connect()->prepare('INSERT INTO compra (RUT, orden, estado, notas, total) 
                                                    VALUES (:rut, :orden, :estado, :notas, :total)');
        
        try { 
            $query->execute([

            'notas'   => $compra['notas'],
            'total'   => $compra['total'],
            'estado'  => $compra['estado'],
            'rut'     => $rut['RUT'],
            'orden'   => $compra['orden'],
            
            ]);

            $querySelectID = $this->db->connect()->prepare('SELECT id_compra FROM `compra` WHERE orden = :orden');
            $querySelectID->execute(['orden' => $compra['orden']]);
            $idCompra = $querySelectID->fetch();

            $queryDC = $this->db->connect()->prepare('INSERT INTO detalle_compra (id_compraDC, id_productoDC, nombre_productoDC, cantidad_productoDC, precio_productoDC)
                                                            VALUES (:id_compraDC, :id_productoDC, :nombre_productoDC, :cantidad_productoDC, :precio_productoDC)');

            
            for ($i = 0; $i < count($compra['prod']); $i++) {
                $queryDC->execute([
                    'id_compraDC'         => $idCompra['id_compra'],
                    'id_productoDC'       => $compra['prod'][$i],
                    'nombre_productoDC'   => $nombsProd[$i]['nomb'],
                    'cantidad_productoDC' => $compra['cant'][$i],
                    'precio_productoDC'   => $compra['precio'][$i],
                ]); 
            }
            
            return true;
        } catch (PDOException $e) {
            return false;
        }
        
        
    }

    public function ordenVerify($orden){
        $query = $this->db->connect()->prepare('SELECT * FROM `compra` WHERE orden = :orden');
        $query->execute(['orden' => $orden]);
        if($query->rowCount()){
            return false;
        }else{
            return true;
        }
    }   
    
    public function getRUT($prov) {
        $query = $this->db->connect()->prepare('SELECT RUT FROM `proveedores` WHERE id = :id');
        $query->execute(['id' => $prov]);
        $rut = $query->fetch();
        return $rut;
    }

    public function getNameProd($ids) {
        $query = $this->db->connect()->prepare('SELECT nombre FROM `items` WHERE id = :id');
        $nombsProd = [];
        foreach ($ids as $id) {
            $query->execute(['id' => $id]);
            
            while($row = $query->fetch(PDO::FETCH_ASSOC)){
                $nombProd = [
                        'nomb'          => $row['nombre'],
                        ];
                array_push($nombsProd, $nombProd);
            }
        }
        
        return $nombsProd;
    }


    public function getCompra($id) {
        $query = $this->db->connect()->prepare('SELECT * FROM `detalle_compra` WHERE id_compraDC = :id');
        $query->execute(['id' => $id]);
        $comprasDetail = [];
        
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $compra = [
                    
                    'name'   => $row['nombre_productoDC'],
                    'cant'   => $row['cantidad_productoDC'],
                    'precio' => $row['precio_productoDC'],

                    ];
            array_push($comprasDetail, $compra);
        }
        return $comprasDetail;
    }

    public function update($compra) {

        $query = $this->db->connect()->prepare("UPDATE `compra` SET estado = :estado, notas = :notas WHERE id_compra = :id");
        try {
            $query->execute([
                'id'       => $compra['id'],
                'estado'   => $compra['estado'],
                'notas'    => $compra['notas'],
            ]);
            
            return true;
        }catch (PDOException $e) {
            return false;
        }
    }

    public function removeCompra($id){
        $query = $this->db->connect()->prepare('DELETE FROM compra WHERE id_compra = :id');

        if($query->execute(['id' => $id])) {
            $querySelect = $this->db->connect()->prepare('SELECT idDC FROM `detalle_compra` WHERE id_compraDC = :idCompra');
            $querySelect->execute(['idCompra' => $id]);
            while($idDC = $querySelect->fetch(PDO::FETCH_ASSOC)) {
                $queryDelete = $this->db->connect()->prepare('DELETE FROM detalle_compra WHERE idDC = :idDC');
                $queryDelete->execute(['idDC' => $idDC['idDC']]);
            }
        }
        
        return $queryDelete;
    }
}