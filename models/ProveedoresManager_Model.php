<?php


class ProveedoresManager_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }
    public function getAll(){
        $query = $this->db->connect()->prepare('SELECT * FROM `proveedores`');
        $query->execute();
        $provs = [];
        while ($row = $query->fetch()) {

            $prov = [
                'id'        => $row['id'],
                'rut'       => $row['RUT'],
                'name'      => $row['nombre'],
                'telefono'  => $row['telefono'],
                'direccion' => $row['direccion'],
            ];

            array_push($provs, $prov);
        }
        return $provs;
    }


    public function registerProv($prov) {
  
        $query = $this->db->connect()->prepare('INSERT INTO proveedores (RUT, nombre, telefono, direccion) 
                                                    VALUES (:rut, :name, :tel, :direc)');
        
        try { 
            $query->execute([
            'rut'       => $prov['rut'],
            'name'      => $prov['name'],
            'tel'       => $prov['tel'],
            'direc'     => $prov['direc'],
            ]);
            
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function update($prov) {

        $query = $this->db->connect()->prepare("UPDATE `proveedores` SET rut = :rut, nombre = :name, telefono = :tel, direccion = :direc WHERE id = :id");
        try {
            $query->execute([
                'id'       => $prov['id'],
                'rut'      => $prov['rut'],
                'name'     => $prov['name'],
                'tel'      => $prov['tel'],
                'direc'    => $prov['direc'],
            ]);
            
            return true;
        }catch (PDOException $e) {
            return false;
        }
    }

    public function removeProv($id){
        $query = $this->db->connect()->prepare('DELETE FROM proveedores WHERE id = :id');
        $query->execute(['id' => $id]);
        return $query;
    }
}