<div class="container-table container-table-histVentas" id="div-ventas">

    <div class="table-title table-title-histVentas">Historial de ventas</div>

    <div class="table-header">ID</div>
    <div class="table-header">Transacción</div>
    <div class="table-header">Fecha</div>
    <div class="table-header">Envío</div>
    <div class="table-header">Estado</div>
    <div class="table-header">Email</div>
    <div class="table-header">Total</div>
    <div class="table-header">Opciones</div>

    <div class="dplayCont" id="container-items-histVentas">
        <?php
        $response = json_decode(file_get_contents('http://localhost/proyecto3BCFinal/VentaManager/getVentas'), TRUE);

        if ($response['statuscode'] == 200) {
            foreach ($response['ventas'] as $venta) {
                include('views/partials/tablaVentas.php');
            }
        }
        ?>
    
    </div>

</div>