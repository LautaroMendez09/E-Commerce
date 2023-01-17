<div class="div-create">
    <button class="btn-create btn-createItem" id="btn-createCompraPA">
        <i class="fa-sharp fa-solid fa-credit-card" style="margin-right: 7px;"></i>
        Registrar compra
    </button>
</div>
<div class="modal" id="modal-createCompraPA">
    <div class="modal-container">
        <div class="modal-header">
            <p class="modal-title">Registrando compra</p>
            <p class="modal-close no-seleccion">&#215</p>
        </div>

        <div class="modal-info-create">
            <form class="form" id="form-createCompraPA" method="POST">

                <p class="p-editUser p-title-create">Proveedor:</p>
                <div class="container-select-histCompras">
                    <select name="compra_prov" class="select-histCompras" required>
                        <option value="">Seleccione:</option>
                        <?php
                            $response = json_decode(file_get_contents('http://localhost/proyecto3BCFinal/ProveedoresManager/getProvs'), TRUE);
                    
                            if ($response['statuscode'] == 200) {
                                foreach ($response['provs'] as $prov) {
                                    $id = $prov['id'];
                            ?> <option value="<?php echo $id ?>"><?php echo $prov['name'] ?></option> <?php
                    
                                }
                            } else {
                                echo $response['response'];
                            }
                        ?>
                    </select>

                    <p class="p-editUser">Ordén de compra:</p>
                    <input class="inp-editUser calcSum" type="text" name="compra_orden" required>

                </div>

                <div class="horizontal-division division-histCompras"></div>

                <div class="modal-data modal-data-comprasPA">

                    <div id="container-productsInfo">
                        <div class="container-compraPA-info" id="container-compraPA-info-id">
                            
                            <p class="p-editUser">Producto:</p>
                            <select name="compra_prod0" class="select-histCompras" required>
                                <option value="">Seleccione:</option>
                                <?php
                                    $response = json_decode(file_get_contents('http://localhost/proyecto3BCFinal/ProductManager/getItemsNames'), TRUE);
                            
                                    if ($response['statuscode'] == 200) {
                                        foreach ($response['items'] as $item) {
                                            $id = $item['id'];
                                    ?> <option value="<?php echo $id ?>"><?php echo $item['name'] ?></option> <?php
                            
                                        }
                                    } else {
                                        echo $response['response'];
                                    }
                                ?>
                            </select>
                            
                            <div class="div-middle-modal-data">
                            
                                <div class="div-half-modal-data">
                                    <p class="p-editUser">Cantidad:</p>
                                    <input class="inp-editUser calcSum" id="valueCant" type="number" name="compra_cant0" required>
                                </div>
                                <div class="div-half-modal-data">
                                    <p class="p-editUser">Precio: (US$)</p>
                                    <input class="inp-editUser calcSum" id="valuePrecio" type="number" step="0.01" name="compra_precio0" required>
                                </div>
                                
                            </div>
                            
                            <p class="p-editUser">Subtotal: (US$)</p>
                            <input class="inp-editUser inp-subtotal" id="valueSubtotal" type="number" step="0.01" name="prov_subtotal" readonly required>
                            
                        </div>
                    </div>

                    <div class="horizontal-division division-addProduct-compraPA"></div>

                    <div>

                        <p class="p-editUser">Estado:</p>
                        <select name="compra_estado" class="select-histCompras" required>
                            <option value="">Seleccione:</option>
                            <option value="Completado">Completado</option>
                            <option value="Pendiente">Pendiente</option>
                            <option value="Rechazado">Rechazado</option>
                        </select>

                        <p class="p-editUser">Notas:</p>
                        <textarea class="inp-editUser textarea-create" name="compra_notas" maxlength="120" required></textarea>

                        <p class="p-editUser">Total: (US$)</p>
                        <input class="inp-editUser inp-total" id="valueTotal" type="number" step="0.01" name="compra_total" readonly required>

                    </div>
                </div>
                
                <button class="btn-modal" id="btn-addProduct-compraPA" type="button">
                    <i class="fa-solid fa-circle-plus"></i>
                </button>
                

                <div class="horizontal-division division-histCompras"></div>

                <div class="modal-btns">
                    <button class="btn-modal btn-accept-editUser" id="btn-accept-createCompraPA" type="submit">Aceptar</button>
                    <div class="btn-modal btn-cancel-modal no-seleccion" id="btn-cancel-createCompraPA">Cancelar</div>
                </div>
            </form>
        </div>

    </div>
</div>
<div class="container-table container-table-compraPA" id="div-compras">

    <div class="table-title table-title-compraPA">Historial de compras</div>


    <div class="table-header">ID</div>
    <div class="table-header">Proveedor</div>
    <div class="table-header">Ordén de compra</div>
    <div class="table-header">Estado</div>
    <div class="table-header">Notas</div>
    <div class="table-header">Total</div>
    <div class="table-header">Opciones</div>


    <?php
    $resp = json_decode(file_get_contents('http://localhost/proyecto3BCFinal/CompraManager/getCompras'), TRUE);

    if ($resp['statuscode'] == 200) {
        foreach ($resp['compras'] as $compra) {
            include('views/partials/tablaCompras.php');
        }
    }
    ?>

</div>