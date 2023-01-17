<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo constant('IMG'); ?>nav/logo.png">
    <title>Finalice su compra | Del Plata Indumentaria</title>
</head>
<body id="bodyCompra">
    <?php require 'views/partials/header.php'; ?>
    
    <div class="div-container-tableCompra">

        <div class="container-table container-table-compra" id="container-table-compra-id">
            <div class="table-title table-title-compra">Finalice su compra</div>
        
            <div class="table-header grid-1 row-1">Producto</div>
            <div class="table-header grid-1">Precio</div>
            <div class="table-header grid-1">Cantidad</div>
            <div class="table-header grid-1">Subtotal</div>
            <div class="table-header grid-1">Quitar</div>
            <div class="dplayCont" id="container-items-compra">
        
            </div>
        </div>

        <div id="container-btnCompra">

        </div>
        <div id="getMsjAlert">
            <input type="hidden" value="<?php echo $this->mensajeError; ?>">
        </div>
    </div>
    
    
    <?php require 'views/partials/footer.php'; ?>    

    <script src="<?php echo constant('URL'); ?>public/js/script.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/carrito.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/category.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>