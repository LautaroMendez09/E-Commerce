<?php


class Venta_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }
    public function verifyCurrentSession()
    {
        if (isset($_SESSION['email'])) {
            return $_SESSION['email'];
        }
    }

    public function checkStock($prods)
    {

        $hasStock = [];
        foreach ($prods as $prod) {
            $query = $this->db->connect()->prepare('SELECT cantidad FROM items WHERE id = :id');
            $query->execute(['id' => $prod['id']]);
            $row_cant = $query->fetch(PDO::FETCH_ASSOC);
            $cantActual = $row_cant['cantidad'];

            if ($cantActual > $prod['cant']) {
                $prodStock = [
                    'id' => $prod['id'],
                ];
                array_push($hasStock, $prodStock);
            }
        }
        return $hasStock;
    }

    public function getIdByEmail($email)
    {
        $query = $this->db->connect()->prepare('SELECT id_user FROM users WHERE user_email = :email');
        $query->execute(['email' => $email]);
        $row_id_user = $query->fetch(PDO::FETCH_ASSOC);
        $id_user = $row_id_user['id_user'];
        return $id_user;
    }

    function registrarVenta($venta)
    {
        
        $query = $this->db->connect()->prepare('INSERT INTO venta (id_transaccion, fecha, envio, status, email, id_userVenta, id_cliente, total) VALUES (?,?,?,?,?,?,?,?)');

        if ($query->execute([
            $venta['id_transaccion'], $venta['fecha'], $venta['envio'], $venta['status'], $venta['email'],
            $venta['id_user'], $venta['id_cliente'], $venta['total']
        ])) {

            $productos = json_decode($_SESSION['carrito']);
            $array = json_decode(json_encode($productos), true);

            if ($array != null) {


                $j = 0;

                for ($i = 0; $i < count($array); $i++) {
                    $clave = $array[$i]['id'];



                    $cantidad = $array[$i]['cantidad'];

                    $query = $this->db->connect()->prepare('SELECT id, nombre, precio FROM items WHERE id = ?');
                    if ($query->execute([$clave])) {
                        $row_prod = $query->fetch(PDO::FETCH_ASSOC);
                        $precio = $row_prod['precio'];

                        $querySelect = $this->db->connect()->prepare('SELECT id FROM venta WHERE id_transaccion = :idTransac');
                        if ($querySelect->execute(['idTransac' => $venta['id_transaccion']])) {
                            $row_idVenta = $querySelect->fetch(PDO::FETCH_ASSOC);
                            $id = $row_idVenta['id'];


                            $queryInsert = $this->db->connect()->prepare('INSERT INTO detalle_venta (id_ventaDV, id_productoDV, nombreProdDV, precioDV, cantidadDV) 
                                                                            VALUES (?,?,?,?,?)');

                            if ($queryInsert->execute([$id, $clave, $row_prod['nombre'], $precio, $cantidad])) {
                                $j++;
                                if ($j == count($array)) {
                                    return true;
                                }
                            } else {
                                return false;
                            }
                        } else {
                            return false;
                        }
                    } else {
                        return false;
                    }
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function getVentas($id)
    {
        $querySelect = $this->db->connect()->prepare('SELECT id FROM `venta` WHERE id_userVenta = :id');
        if ($querySelect->execute(['id' => $id])) {

            $ventas = [];

            if ($querySelect->rowCount()) {
                $idVentas = [];
                while ($row = $querySelect->fetch(PDO::FETCH_ASSOC)) {

                    $idVenta = [
                        'id' => $row['id'],
                    ];
                    array_push($idVentas, $idVenta);
                }

                $query = $this->db->connect()->prepare('SELECT * FROM `detalle_venta`
                                                    INNER JOIN venta ON detalle_venta.id_ventaDV = :idVenta GROUP BY detalle_venta.idDV');


                foreach ($idVentas as $idVen) {

                    if ($query->execute(['idVenta' => $idVen['id']])) {

                        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

                            $venta = [
                                'id_trans' => $row['id_transaccion'],
                                'fecha'    => $row['fecha'],
                                'nombre'   => $row['nombreProdDV'],
                                'precio'   => $row['precioDV'],
                                'cant'     => $row['cantidadDV'],
                            ];

                            array_push($ventas, $venta);
                        }
                    }
                }
                return $ventas;
            } else {
                $ventas = 0;
                return $ventas;
            }
        } else {
            return false;
        }
    }
}
