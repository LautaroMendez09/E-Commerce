<div class="div-create">
    <button class="btn-create btn-createItem" id="btn-createUser">
        <i class="fa-solid fa-user" style="margin-right: 7px;"></i>
        Registrar usuario
    </button>
</div>
<div class="modal" id="modal-createUser">
    <div class="modal-container">
        <div class="modal-header">

            <p class="modal-title">Registrando usuario</p>
            <p class="modal-close no-seleccion">&#215</p>
        </div>

        <div class="modal-info-create">
            <form class="form" id="form-createUser" method="POST">
                <div class="modal-data">

                    <div class="div-middle-modal-data">

                        <div class="div-half-modal-data">
                            <p class="p-editUser">Nombre:</p>
                            <input class="inp-editUser" type="text" name="user_name" required>
                        </div>

                        <div class="div-half-modal-data">
                            <p class="p-editUser">Apellido:</p>
                            <input class="inp-editUser" type="text" name="user_surname" required>
                        </div>

                    </div>

                    <p class="p-editUser">Email:</p>
                    <input class="inp-editUser" type="email" name="user_email" required>

                    <p class="p-editUser">Dirección:</p>
                    <input class="inp-editUser" type="text" name="user_address">

                    <p class="p-editUser">Teléfono: (+598)</p>
                    <input class="inp-editUser" type="number" name="user_tel">

                    <p class="p-editUser">Contraseña:</p>
                    <input class="inp-editUser" type="password" name="user_pass" required>

                    <p class="p-editUser">Rol:</p>
                    
                    <select name="select-rol" class="select-histCompras" id="">
                        <option value="">Seleccione un rol:</option>
                        <?php
                            $response = json_decode(file_get_contents('http://localhost/proyecto3BCFinal/UserManager/getRolesUsers'), TRUE);
                    
                            if ($response['statuscode'] == 200) {
                                foreach ($response['roles'] as $roles) {
                                    $id_rol = $roles['id_rol'];
                            ?> <option value="<?php echo $id_rol ?>"><?php echo $roles['rol'] ?></option> <?php
                    
                                }
                            } else {
                                echo $response['response'];
                            }
                        ?>
                    </select>

                </div>

                <div class="modal-btns">
                    <button class="btn-modal btn-accept-editUser" id="btn-accept-createUser" type="submit">Aceptar</button>
                    <div class="btn-modal btn-cancel-modal no-seleccion" id="btn-cancel-createUser">Cancelar</div>
                </div>
            </form>
        </div>

    </div>
</div>
<div class="container-table container-table-user" id="div-users">

    <div class="table-title table-title-user">Gestor de ususarios</div>


    <div class="table-header">ID</div>
    <div class="table-header">Nombre</div>
    <div class="table-header">Apellido</div>
    <div class="table-header">Email</div>
    <div class="table-header">Dirección</div>
    <div class="table-header">Teléfono</div>
    <div class="table-header">Contraseña</div>
    <div class="table-header">Rol</div>
    <div class="table-header">Opciones</div>


    <?php
    $resp = json_decode(file_get_contents('http://localhost/proyecto3BCFinal/UserManager/getUsers'), TRUE);

    if ($resp['statuscode'] == 200) {

        foreach ($resp['users'] as $user) {
            include('views/partials/tablaUsers.php');
        }
    }
    ?>

</div>