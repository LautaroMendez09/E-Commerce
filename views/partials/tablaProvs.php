<div class="fila-table" id="fila-prov-<?php echo $prov['id']; ?>">
    <div class="table-item"><?php echo $prov['id']; ?></div>
    <div class="table-item"><?php echo $prov['rut']; ?></div>
    <div class="table-item"><?php echo $prov['name']; ?></div>
    <div class="table-item"><?php echo $prov['telefono']; ?></div>
    <div class="table-item"><?php echo $prov['direccion']; ?></div>

    <div class="table-item">
        <div class="div-btn-adm">

            <form class="form form-editProv form-btnEditarItem">
                <input type='hidden' name="itemId" value='<?php echo $prov['id']; ?>' />
                <button class="btn-adm btn-edit btn-edit-prov" type="click"><i class="fa-regular fa-pen-to-square icon-btnsEdit"></i>Editar</button>
            </form>

            <div class="modal modal-editItem" id="modal-editItem">
                <div class="modal-container" id="modal-container-id-item">

                    <div class="modal-header">
                        <p class="modal-title">Editando proveedor</p>
                        <p class="modal-close no-seleccion" id="modal-closeEdit-id">&#215</p>
                    </div>

                    <div class="modal-info modal-info-edit-item">
                        <form class="form form-editProv" method="POST">
                            <div class="modal-data">

                                <div class="div-middle-modal-data">
                                    <div class="div-half-modal-data">
                                        <p class="p-editUser">ID:</p>
                                        <input class="inp-editUser editItem-id" type="number" name="id" readonly required value="<?php echo $prov['id']; ?>">
                                    </div>
                                    <div class="div-half-modal-data">
                                        <p class="p-editUser">RUT:</p>
                                        <input class="inp-editUser editItem-id" type="number" name="prov_rut" required value="<?php echo $prov['rut']; ?>">
                                    </div>
                                </div>

                                <p class="p-editUser">Nombre:</p>
                                <input class="inp-editUser editItem-name" type="name" name="prov_name" required value="<?php echo $prov['name']; ?>">

                                <p class="p-editUser">Teléfono:</p>
                                <input class="inp-editUser editItem-name" type="number" name="prov_tel" required value="<?php echo $prov['telefono']; ?>">

                                <p class="p-editUser">Dirección:</p>
                                <input class="inp-editUser" type="text" name="prov_direc" required value="<?php echo $prov['direccion']; ?>">

                            </div>
                            <div>
                                <p><?php echo $this->mensaje; ?></p>
                            </div>
                            <div class="modal-btns">
                                <button class="btn-modal btn-accept-editUser" type="submit">Aceptar</button>

                                <div class="btn-modal btn-cancel-modal no-seleccion" id="btn-cancel-editItem">Cancelar</div>
                            </div>
                        </form>
                    </div>


                </div>
            </div>

            <div>|</div>

            <div class="btn-adm btn-rmv btn-rmv-prov" data-id="<?php echo $prov['id']; ?>"><i class="fa-sharp fa-solid fa-trash icon-btnsEdit"></i>Eliminar</div>

        </div>
    </div>
</div>