<div class="fila-table" id="fila-venta-<?php echo $venta['id']; ?>">
    <div class="table-item"><?php echo $venta['id']; ?></div>
    <div class="table-item"><?php echo $venta['id_trans']; ?></div>
    <div class="table-item"><?php echo $venta['fecha']; ?></div>
    <div class="table-item"><?php echo $venta['envio']; ?></div>
    <div class="table-item"><?php echo $venta['estado']; ?></div>
    <div class="table-item"><?php echo $venta['email']; ?></div>
    <div class="table-item"><?php echo $venta['total']; ?></div>

    <div class="table-item">
        <div class="div-btn-adm">

            <form class="form form-editVenta">
                <input type='hidden' name="itemId" value='<?php echo $venta['id']; ?>' />
                <button class="btn-adm btn-edit btn-edit-venta" type="click"><i class="fa-solid fa-circle-info icon-btnsEdit"></i>Detalles</button>
            </form>

            <div class="modal modal-editItem" id="modal-editVenta">
                <div class="modal-container" id="modal-container-id-venta">

                    <div class="modal-header">
                        <p class="modal-title">Viendo venta</p>
                        <p class="modal-close no-seleccion" id="modal-closeEdit-id">&#215</p>
                    </div>

                    <div class="modal-info">
                        <form class="form form-editVenta" method="POST">

                            <input type='hidden' name="itemId" value='<?php echo $venta['id_trans']; ?>' />

                            <div class="div-middle-modal-data" style="width: 80%; justify-content: space-between;">

                                <div class="div-half-modal-data">
                                    <p class="p-editUser">Transacción:</p>
                                    <input class="inp-editUser" type="text" value="<?php echo $venta['id_trans'] ?>" readonly>
                                </div>

                                <div class="div-half-modal-data">
                                    <p class="p-editUser">Fecha:</p>
                                    <input class="inp-editUser" type='datatime' value='<?php echo $venta['fecha']; ?>' />
                                </div>

                            </div>

                            <div class="horizontal-division division-histCompras"></div>

                            <div class="modal-data modal-data-comprasPA">

                                <div id="container-productsInfo">

                                </div>

                                <div class="horizontal-division division-addProduct-compraPA"></div>

                                <div>

                                    <p class="p-editUser">Email:</p>
                                    <input class="inp-editUser" type="text" value="<?php echo $venta['email']; ?>" readonly>

                                    <p class="p-editUser">Estado:</p>
                                    <input class="inp-editUser" type="text" value="<?php echo $venta['estado']; ?>" readonly>

                                    <p class="p-editUser">Total: (US$)</p>
                                    <input class="inp-editUser" type="number" step="0.01" value="<?php echo $venta['total']; ?>" readonly>

                                </div>

                            </div>

                            <div class="horizontal-division division-histCompras"></div>

                            <div class="modal-btns">
                                <button class="btn-modal btn-accept-editUser" type="submit">Aceptar</button>

                                <div class="btn-modal btn-cancel-modal no-seleccion">Cancelar</div>
                            </div>
                        </form>
                    </div>


                </div>
            </div>

            <div>|</div>

            <div class="btn-adm btn-rmv btn-rmv-compraPA" data-id="<?php echo $prov['id']; ?>"><i class="fa-sharp fa-solid fa-trash icon-btnsEdit"></i>Eliminar</div>

        </div>
    </div>
</div>