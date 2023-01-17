<div class="fila-table" id="fila-compra-<?php echo $compra['id']; ?>">
    <div class="table-item"><?php echo $compra['id']; ?></div>
    <div class="table-item"><?php echo $compra['name']; ?></div>
    <div class="table-item"><?php echo $compra['orden']; ?></div>
    <div class="table-item"><?php echo $compra['estado']; ?></div>
    <div class="table-item"><?php echo $compra['notas']; ?></div>
    <div class="table-item">$ <?php echo $compra['total']; ?></div>

    <div class="table-item">
        <div class="div-btn-adm">

            <form class="form form-editCompraPA">
                <input type='hidden' name="itemId" value='<?php echo $compra['id']; ?>'/>
                <button class="btn-adm btn-edit btn-edit-compraPA" type="click"><i class="fa-solid fa-circle-info icon-btnsEdit"></i>Detalles</button>
            </form>

            <div class="modal modal-editItem" id="modal-editItem">
                <div class="modal-container" id="modal-container-id-item">

                    <div class="modal-header">
                        <p class="modal-title">Editando compra</p>
                        <p class="modal-close no-seleccion" id="modal-closeEdit-id">&#215</p>
                    </div>

                    <div class="modal-info">
                        <form class="form form-editCompraPA" method="POST">
                            
                            <p class="p-editUser p-title-create">Proveedor:</p>
                            <div class="container-select-histCompras">
                                <input type='hidden' name="itemId" value='<?php echo $compra['id']; ?>'/>
                                <select name="compra_prov" class="select-histCompras" readonly>

                                    <option value=""><?php echo $prov['name'] ?></option>
                    
                                </select>

                                <p class="p-editUser">Ordén de compra:</p>
                                <input class="inp-editUser calcSum" type="text" name="compra_orden" value="<?php echo $compra['orden'] ?>" readonly>

                            </div>

                            <div class="horizontal-division division-histCompras"></div>

                            <div class="modal-data modal-data-comprasPA">

                                <div id="container-productsInfo">

                                    

                                </div>
                                
                                <div class="horizontal-division division-addProduct-compraPA"></div>

                                <div>
                                    <input type="hidden" id="optionSelected" value="<?php echo $compra['estado'] ?>">
                                    <p class="p-editUser">Estado:</p>
                                    <select name="compra_estado" class="select-histCompras select-estado">

                                        
                                        <option value="">Seleccione:</option>
                                        <option class="options-estado" value="Completado">Completado</option>
                                        <option class="options-estado" value="Pendiente">Pendiente</option>
                                        <option class="options-estado" value="Rechazado">Rechazado</option>
                                        
                                    </select>

                                    <p class="p-editUser">Notas:</p>
                                    <textarea class="inp-editUser textarea-create" name="compra_notas" maxlength="120" required><?php echo $compra['notas']; ?></textarea>

                                    <p class="p-editUser">Total: (US$)</p>
                                    <input class="inp-editUser inp-total" id="valueTotal" type="number" step="0.01" name="compra_total" value="<?php echo $compra['total']; ?>" readonly>

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