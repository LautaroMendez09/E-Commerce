<div class="div-container-tableCompra">

    <div class="container-table container-table-histCompras">

        <div class="table-title table-title-histCompras">Historial de compras</div>

        <div class="table-header">Transacción</div>
        <div class="table-header">Fecha</div>
        <div class="table-header">Producto</div>
        <div class="table-header">Precio</div>
        <div class="table-header">Cantidad</div>

        <div class="dplayCont" id="container-items-compra">
            <?php
            $response = json_decode(file_get_contents('http://localhost/proyecto3BCFinal/Venta/getVentasByUser?id=' . $user['id']), TRUE);

            if ($response['ventas'] == 0) {
            ?> <div class="table-title table-title-compra table-msj-vacio">NO HAS REALIZADO NINGUNA COMPRA</div> <?php
                                                                                                                                } else {

                                                                                                                                    foreach ($response['ventas'] as $venta) {
                                                                                                                                    ?>
                    <div class="table-item"><?php echo $venta['id_trans']; ?></div>
                    <div class="table-item"><?php echo $venta['fecha']; ?></div>
                    <div class="table-item"><?php echo $venta['nombre']; ?></div>
                    <div class="table-item"><?php echo $venta['precio']; ?></div>
                    <div class="table-item"><?php echo $venta['cant']; ?></div>
            <?php
                                                                                                                                    }
                                                                                                                                }

            ?>
        </div>

    </div>

</div>