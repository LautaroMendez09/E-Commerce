<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo constant('IMG'); ?>nav/logo.png">
    <title>Procesando pago | Del Plata Indumentaria</title>
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo constant('CLIENT_ID'); ?>&currency=<?php echo constant('CURRENCY'); ?>"></script>
</head>
<body id="bodyPago">
    
    <?php require 'views/partials/header.php'; ?>

    <div class="div-container-tablePago">
        <h1 class="title-index">Detalle de pago</h1>
        
        <div class="container-info-detallePago">
            <div class="container-table container-table-pago" id="container-table-pago-id">
                <div class="table-title table-title-pago">Productos</div>
            
                <div class="table-header table-header-pago grid-1 row-1">Producto</div>
                <div class="table-header table-header-pago grid-1">Cantidad</div>
                <div class="table-header table-header-pago grid-1">Subtotal</div>
                <div class="dplayCont" id="container-items-pago">
                    
                </div>
            </div>
            
            <div class="container-envio-detallePago">
                <h3 class="subtitle-index">Metódo de envío</h3>

                <div class="container-select-detallePago">
                    <select name="metodoEnvio" class="select-metodoEnvio" id="select-metodoEnvio-id">
                        <option value="">Seleccione un método de envío</option>
                        <option value="pickup">Retiro en Pickup DAC</option>
                        <option value="agencia">Envío a agencia</option>
                    </select>
                </div>

                <div class="container-select-detallePago" id="container-select-envioDetail">
                    
                </div>

                <div class="container-select-detallePago" id="container-select-agenciaDetail">
                    
                </div>
            </div>

            <div class="container-detallePago">
                <div id="paypal-button-container">

                </div>
            </div>
        </div>

    </div>

    <?php require 'views/partials/footer.php'; ?>  

    <script src="<?php echo constant('URL'); ?>public/js/script.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/carrito.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/category.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</body>
</html>