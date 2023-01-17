<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo constant('IMG'); ?>nav/logo.png">
    <title>Contacto | Del Plata Indumentaria</title>
</head>

<body>

    <?php require 'views/partials/header.php'; ?>

    <section class="background pagInfo">
        <div class="container-pagInfo">
            <h3 class="title-index">Contáctanos</h3>
            <div class="container-text-pagInfo">
                <form class="form" id="form-contact" action="" method="POST">
                    <div class="container-contancto-data">

                        <div class="div-middle-modal-data">
                            <div class="div-half-modal-data">
                                <p class="p-editUser">Nombre:</p>
                                <input class="inp-editUser editItem-name" type="name" name="contacto_nombre" required>
                            </div>

                            <div class="div-half-modal-data">
                                <p class="p-editUser">Apellido:</p>
                                <input class="inp-editUser editItem-name" type="name" name="contacto_apellido" required>
                            </div>

                        </div>

                        <p class="p-editUser">Asunto:</p>
                        <input class="inp-editUser editItem-name" type="name" name="contacto_asunto" required>

                        <p class="p-editUser">Correo electrónico:</p>
                        <input class="inp-editUser editItem-name" type="name" name="contacto_email" required>

                        <p class="p-editUser">Mensaje:</p>
                        <textarea class="inp-editUser textarea-create" name="contacto_mensaje" maxlength="200" required></textarea>

                    </div>

                    <button class="button btn-enviar-contacto" type="submit">Envíar</button>

                </form>
            </div>
        </div>
    </section>

    <section class="background">
        <div style="margin-top: 300px">
            <?php require 'views/partials/footer.php'; ?>
        </div>
    </section>

    <script src="<?php echo constant('URL'); ?>public/js/script.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/carrito.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/category.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>