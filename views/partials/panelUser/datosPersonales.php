<div class="container-panelUser">
    <h1 class="title-index">Datos personales</h1>

    <div class="horizontal-division division-panelUser"></div>

    <form class="form" id="form-datosPersonales" method="POST">
        <div class="container-data">
            <div class="container-inps-datosPerso">

                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

                <div class="div-middle-modal-data">
                    <div class="div-half-modal-data">
                        <p class="p-editUser">Nombre:</p>
                        <input class="inp-editUser" type="text" name="user_name" value="<?php echo $user['name']; ?>">
                    </div>

                    <div class="div-half-modal-data">
                        <p class="p-editUser">Apellido:</p>
                        <input class="inp-editUser" type="text" name="user_surname" value="<?php echo $user['surname']; ?>">
                    </div>
                </div>

                <p class="p-editUser">Correo electrónico:</p>
                <input class="inp-editUser" type="email" name="user_email" value="<?php echo $user['email']; ?>" readonly>

                <p class="p-editUser">Dirección:</p>
                <input class="inp-editUser" type="text" name="user_address" value="<?php echo $user['address']; ?>">

                <p class="p-editUser">Teléfono: (+598)</p>
                <input class="inp-editUser" type="text" name="user_phone" value="<?php echo $user['phone']; ?>">

            </div>

            <button class="button btn-save-datosPerso" type="submit"><i class="fa-solid fa-floppy-disk icon-datosPerso"></i>Guardar cambios</button>

        </div>
    </form>

</div>