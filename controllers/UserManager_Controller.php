

<?php


class UserManager_Controller extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "";
    }
    public function render()
    {
        $this->view->render('usersSession/admin');
    }
    public function renderAdminUsers()
    {
        $this->view->render('partials/panelAdmin/adminUsers');
    }
    public function getUsers()
    {

        $users = $this->model->getAll();
        echo json_encode([
            'statuscode' => 200,
            'users' => $users
        ]);
        $this->view->users = $users;
    }
    public function getRolesUsers()
    {

        $roles = $this->model->getRoles();
        echo json_encode([
            'statuscode' => 200,
            'roles' => $roles
        ]);
        $this->view->roles = $roles;
    }

    public function deleteUser()
    {

        if (isset($_GET['id'])) {
            $res = $this->model->removeUser($_GET['id']);
            if ($res) {
                echo json_encode(['statuscode' => 200]);
            } else {
                echo json_encode(['statuscode' => 400]);
            }
        } else {
            echo json_encode(['statuscode' => 400]);
        }
    }
    public function updateUser()
    {
        $id = $_POST['id'];
        $name    = $_POST['user_name'];
        $surname   = $_POST['user_surname'];
        $email  = $_POST['user_email'];
        $address    = $_POST['user_address'];
        $phone  = $_POST['user_tel'];
        $pass  = $_POST['user_pass'];
        $id_role  = $_POST['select-rol'];

        if ($this->model->update([
            'id' => $id, 'name' => $name, 'surname' => $surname, 'email' => $email,
            'address' => $address, 'phone' => $phone, 'pass' => $pass, 'id_role' => $id_role
        ])) {

            echo json_encode([
                'statuscode' => 200,
            ]);
            $this->view->mensaje = "Usuario actualizado correctamente";
        } else {

            echo json_encode([
                'statuscode' => 400,

            ]);
            $this->view->mensaje = "No se pudo actualizar el usuario";
        }
    }

    function createUser()
    {
        $name    = $_POST['user_name'];
        $surname   = $_POST['user_surname'];
        $email  = $_POST['user_email'];
        $address    = $_POST['user_address'];
        $phone  = $_POST['user_tel'];
        $pass  = $_POST['user_pass'];
        $id_role  = $_POST['select-rol'];

        if ($this->model->registerUser([
            'name' => $name, 'surname' => $surname, 'email' => $email,
            'address' => $address, 'phone' => $phone, 'pass' => $pass, 'id_role' => $id_role
        ])) {

            $this->view->mensaje = "Usuario creado correctamente";

            echo json_encode([
                'statuscode' => 200,
            ]);
        }
    }
}
?>