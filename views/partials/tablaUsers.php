<div class="fila-table" id="fila-user-<?php echo $user['id']; ?>">
    <div class="table-item"><?php echo $user['id']; ?></div>
    <div class="table-item"><?php echo $user['name']; ?></div>
    <div class="table-item"><?php echo $user['surname']; ?></div>
    <div class="table-item"><?php echo $user['email']; ?></div>
    <div class="table-item"><?php echo $user['address']; ?></div>
    <div class="table-item"><?php echo $user['phone']; ?></div>
    <div class="table-item"><?php echo $user['pass']; ?></div>
    <div class="table-item"><?php echo $user['role']; ?></div>
    <div class="table-item">
        <div class="div-btn-adm">

            <form class="form form-editUser form-btnEditarUser">
                <input type='hidden' name="userId" value='<?php echo $user['id']; ?>' />
                <button class="btn-adm btn-edit btn-edit-user" type="click"><i class="fa-regular fa-pen-to-square icon-btnsEdit"></i>Editar</button>
            </form>

            <div class="modal modal-editUser" id="modal-editUser">
                <div class="modal-container" id="modal-container-id-user">

                    <div class="modal-header">
                        <p class="modal-title">Editando usuario</p>
                        <p class="modal-close no-seleccion" id="modal-closeEdit-id">&#215</p>
                    </div>

                    <div class="modal-info modal-info-edit-user">
                        <form class="form form-editUser" method="POST">
                            <div class="modal-data">

                                <div class="div-middle-modal-data">
                                    <div class="div-half-modal-data">
                                        <p class="p-editUser">ID:</p>
                                        <input class="inp-editUser editItem-id" type="number" name="id" readonly value="<?php echo $user['id']; ?>">
                                    </div>
                                    <div class="div-half-modal-data">
                                        <p class="p-editUser">Rol:</p>

                                        <select name="select-rol" class="select-histCompras" required>
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
                                </div>
                                
                                <div class="div-middle-modal-data">

                                    <div class="div-half-modal-data">
                                        <p class="p-editUser">Nombre:</p>
                                        <input class="inp-editUser" type="text" name="user_name" required value="<?php echo $user['name']; ?>">
                                    </div>

                                    <div class="div-half-modal-data">
                                        <p class="p-editUser">Apellido:</p>
                                        <input class="inp-editUser" type="text" name="user_surname" required value="<?php echo $user['surname']; ?>">
                                    </div>

                                </div>

                                <p class="p-editUser">Email:</p>
                                <input class="inp-editUser" type="email" name="user_email" required value="<?php echo $user['email']; ?>">

                                <p class="p-editUser">Dirección:</p>
                                <input class="inp-editUser" type="text" name="user_address" value="<?php echo $user['address']; ?>">

                                <p class="p-editUser">Teléfono: (+598)</p>
                                <input class="inp-editUser" type="number" name="user_tel" value="<?php echo $user['phone']; ?>">

                                <p class="p-editUser">Contraseña:</p>
                                <input class="inp-editUser" type="password" name="user_pass" required value="<?php echo $user['pass']; ?>">

                            </div>

                            <div class="modal-btns">
                                <button class="btn-modal btn-accept-editUser" type="submit">Aceptar</button>

                                <div class="btn-modal btn-cancel-modal no-seleccion" id="btn-cancel-editUser">Cancelar</div>
                            </div>
                        </form>
                    </div>


                </div>
            </div>

            <div>|</div>

            <div class="btn-adm btn-rmv btn-rmv-user" data-id="<?php echo $user['id']; ?>"><i class="fa-sharp fa-solid fa-trash icon-btnsEdit"></i>Eliminar</div>

        </div>
    </div>
</div>