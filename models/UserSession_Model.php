<?php

class UserSession_Model extends Model{

    public function __construct(){    
        parent::__construct();
    }

    public function getCurrentUser(){
        if(isset($_SESSION['email'])) {
            return $_SESSION['email'];
        }
    }

    public function getUser($email){
        
        $query = $this->db->connect()->prepare('SELECT * FROM users WHERE user_email = :email');
        $query->execute(['email' => $email]);
        while ($row = $query->fetch()) {

            $user = [
                'id'        => $row['id_user'],
                'name'      => $row['name'],
                'surname'   => $row['surname'],
                'email'     => $row['user_email'],
                'address'   => $row['address'],
                'phone'     => $row['phone'],
                'pass'      => $row['password'],
            ];

        }
        return $user;
    }

    public function verifyPassword($email, $pass) {
        $query = $this->db->connect()->prepare('SELECT * FROM users WHERE user_email = :email AND password = :pass');
        $query->execute(['email' => $email, 'pass' => $pass]);
        if ($query->rowCount()) {
            return true;
        } else {
            return false;
        }  
    }

    public function changePassword($passNew1, $email)
    {
        $query = $this->db->connect()->prepare('UPDATE `users` SET `password` = :pass WHERE `users`.`user_email` = :email;');
        if ($query->execute(['email' => $email, 'pass' => $passNew1])) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($email, $password) {
        $query = $this->db->connect()->prepare('DELETE FROM users WHERE user_email = :email AND password = :pass');
        if ($query->execute(['email' => $email, 'pass' => $password])) {
            return true;
        } else {
            return false;
        } 
    }

    public function closeSession(){
        session_unset();
        session_destroy();
    }
    
    public function rolValidation($email){
        $query = $this->db->connect()->prepare('SELECT rol FROM `rol`
                                                    INNER JOIN users ON rol.id_rol = users.id_role
                                                        WHERE users.user_email = :email');
        $query->execute(['email' => $email]);
        $role = $query->fetch(PDO::FETCH_ASSOC);
        return $role['rol'];
    }
}
?>
