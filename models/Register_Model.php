<?php


class Register_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function render()
    {
        $this->view->render('register/index');
    }
    
    public function userCreate($name, $surname, $email, $pass) {
        $query = $this->db->connect()->prepare('INSERT INTO users (name, surname, user_email, password) VALUES(:name, :surname, :email, :pass)');
        $query->execute(['name' => $name,'surname' => $surname, 'email' => $email, 'pass' => $pass]);
    }

    public function emailExists($email) {
        $query = $this->db->connect()->prepare('SELECT * FROM users WHERE user_email = :email');
        $query->execute(['email' => $email]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }
}