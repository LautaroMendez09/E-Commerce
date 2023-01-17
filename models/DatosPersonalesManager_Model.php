<?php


class DatosPersonalesManager_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }
    
    public function sameUser($user) {
        $query = $this->db->connect()->prepare('SELECT * FROM users WHERE id_user = :id AND name = :name AND surname = :surname AND phone = :phone AND address = :address');
        
        $query->execute([
            'id'       => $user['id'],
            'name'     => $user['name'],
            'surname'  => $user['surname'],
            'phone'    => $user['phone'],
            'address'  => $user['address'],
        ]);
        if ($query->rowCount()) {
            return false;
        } else {
            return true;
        }  
    }

    public function update($user) {

        $query = $this->db->connect()->prepare("UPDATE `users` SET name = :name, surname = :surname, phone = :phone, address = :address WHERE id_user = :id");
        try {
            $query->execute([
                'id'       => $user['id'],
                'name'     => $user['name'],
                'surname'  => $user['surname'],
                'phone'    => $user['phone'],
                'address'  => $user['address'],
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