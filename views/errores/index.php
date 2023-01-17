<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="<?php echo constant('IMG'); ?>nav/logo.png">
    <title>Error | Del Plata Indumentaria</title>
</head>
<body>

    <?php require 'views/partials/header.php'; ?>

    <div id="main">
        <p class="center error"><?php echo $this->mensaje; ?></p>
    </div>
    
    <?php require 'views/partials/footer.php'; ?>   

    <script src="<?php echo constant('URL'); ?>public/js/script.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/carrito.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/category.js"></script>
</body>
</html>