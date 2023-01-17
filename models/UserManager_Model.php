<?php

class UserManager_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $query = $this->db->connect()->prepare('SELECT * FROM `users`
                                                    INNER JOIN rol ON users.id_role = rol.id_rol
                                                        ORDER BY users.id_user');
        $query->execute();
        $users = [];
        while ($row = $query->fetch()) {

            $user = [
                'id'        => $row['id_user'],
                'name'      => $row['name'],
                'surname'   => $row['surname'],
                'email'     => $row['user_email'],
                'address'   => $row['address'],
                'phone'     => $row['phone'],
                'pass'      => $row['password'],
                'role'      => $row['rol']
            ];

            array_push($users, $user);
        }
        return $users;
    }

    public function getRoles()
    {
        $query = $this->db->connect()->prepare('SELECT * FROM `rol`');
        $query->execute();
        $roles = [];
        while ($row = $query->fetch()) {

            $role = [
                'id_rol' => $row['id_rol'],
                'rol'    => $row['rol'],
            ];

            array_push($roles, $role);
        }
        return $roles;
    }

    public function removeUser($id)
    {
        $query = $this->db->connect()->prepare('DELETE FROM users WHERE id_user = :id');
        $query->execute(['id' => $id]);
        return $query;
    }

    public function update($user)
    {

        $query = $this->db->connect()->prepare("UPDATE `users` SET 
        name = :name, surname = :surname, user_email = :user_email, address = :address, phone = :phone, password = :password, id_role = :id_rol WHERE id_user = :id");
        try {
            $query->execute([
                'id'         => $user['id'],
                'name'       => $user['name'],
                'surname'    => $user['surname'],
                'user_email' => $user['email'],
                'address'    => $user['address'],
                'phone'      => $user['phone'],
                'password'   => $user['pass'],
                'id_rol'     => $user['id_role'],
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function registerUser($user)
    {

        $query = $this->db->connect()->prepare('INSERT INTO users (name, surname, user_email, address, phone, password, id_role) 
                                                    VALUES (:name, :surname, :user_email, :address, :phone, :password, :id_rol)');

        try {
            $query->execute([
                'name'       => $user['name'],
                'surname'    => $user['surname'],
                'user_email' => $user['email'],
                'address'    => $user['address'],
                'phone'      => $user['phone'],
                'password'   => $user['pass'],
                'id_rol'     => $user['id_role'],
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

}


