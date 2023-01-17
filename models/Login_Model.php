<?php

include_once 'models/User.php';


class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function render()
    {
        $this->view->render('login/index');
    }


    public function userExists($email, $pass)
    {

        $query = $this->db->connect()->prepare('SELECT * FROM users WHERE user_email = :email AND password = :pass');
        $query->execute(['email' => $email, 'pass'  => $pass]);

        if ($query->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    public function passwordReset($reset)
    {
        $email = $reset['email'];
        $codigo = $reset['codigo'];
        $bytes = random_bytes(5);
        $token = bin2hex($bytes);

        $query = $this->db->connect()->prepare('INSERT INTO passwords (email, token, codigo)
                                                    VALUES (:email, :token, :codigo)');
        $query->execute(['email' => $email, 'token'  => $token, 'codigo'  => $codigo]);

        $datos = [
            'email' => $email,
            'token'  => $token,
            'codigo'  => $codigo
        ];
        return $datos;
    }

    public function codeVerify($reset)
    {
        $query = $this->db->connect()->prepare('SELECT * FROM passwords WHERE email = :email AND token = :token AND codigo = :code');
        $query->execute(['email' => $reset['email'], 'token' => $reset['token'], 'code' => $reset['code']]);
        if ($query->rowCount()) {
            return true;
        } else {
            return false;
        }
    }
    public function samePassword($pass, $email)
    {
        $query = $this->db->connect()->prepare('SELECT password FROM users WHERE user_email = :email');
        $query->execute(['email' => $email]);
        $passActual = $query->fetch(PDO::FETCH_ASSOC);
        if ($passActual['password'] == $pass) {
            return true;
        } else {
            return false;
        }
    }
    public function changePassword($pass1, $email)
    {
        $query = $this->db->connect()->prepare('UPDATE `users` SET `password` = :pass WHERE `users`.`user_email` = :email;');
        if ($query->execute(['email' => $email, 'pass' => $pass1])) {
            return true;
        } else {
            return false;
        }
    }
    public function getDateResetPassword($email)
    {
        $query = $this->db->connect()->prepare('SELECT fecha FROM passwords WHERE email = :email');
        $query->execute(['email' => $email]);
        $fecha = $query->fetch(PDO::FETCH_ASSOC);
        return $fecha['fecha'];
    }

    public function getRole($email)
    {
        $query = $this->db->connect()->prepare('SELECT rol FROM `rol`
                                                    INNER JOIN users ON rol.id_rol = users.id_role
                                                        WHERE users.user_email = :email');

        $query->execute(['email' => $email]);
        $role = $query->fetch(PDO::FETCH_ASSOC);
        $_SESSION['rol'] = $role['rol'];
        return $role;
    }

    public function emailVerify($email)
    {
        $query = $this->db->connect()->prepare('SELECT * FROM users WHERE user_email = :email');
        $query->execute(['email' => $email]);

        if ($query->rowCount()) {
            return true;
        } else {
            return false;
        }
    }
    public function getNameSurname($email)
    {
        $query = $this->db->connect()->prepare('SELECT name, surname FROM users WHERE user_email = :email');
        $query->execute(['email' => $email]);
        //$user = $query->fetch();
        while ($row = $query->fetch()) {
            $user['name']       = $row['name'];
            $user['surname']    = $row['surname'];
        }
        return $user;
    }
    public function setUser($email)
    {
        $query = $this->db->connect()->prepare('SELECT * FROM users WHERE user_email = :email');
        $query->execute(['email' => $email]);
        $user = new User();
        while ($row = $query->fetch()) {

            $user->name        = $row['name'];
            $user->surname     = $row['surname'];
            $user->email       = $row['user_email'];
            $user->pass        = $row['password'];
        }
    }

    public function setCurrentUser($email)
    {
        $_SESSION['email'] = $email;
    }
}
