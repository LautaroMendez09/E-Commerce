<link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>public/css/footer.css"/>
<footer>
    <div class="wave-footer"></div>
    <div id="footer">
        <div id="contenedor">
            <div class="footer-box">
                <div class="footer-title">
                    <h2>INFORMACIÓN</h2>
                </div>
                <div class="footer-info">
                    <ul>
                        <li><a href="<?php echo constant('URL'); ?>index/nosotros" class="curPointer">Sobre nosotros</a></li>
                        <li><a href="<?php echo constant('URL'); ?>index/preguntasFrecuentes" class="curPointer">Preguntas frecuentes</a></li>
                        <li class="footer-info-li"><i>Hecho en Uruguay</i></li>
                        <li class="footer-info-li"><i>Envíos a todo el país</i></li>
                        <li class="footer-info-li"><i>A partir de 100$, envíos gratis!</i></li>
                    </ul>
                </div>
            </div>
            <div class="footer-box">
                <div class="footer-title">
                    <h2>ASISTENCIA</h2>
                </div>
                <div class="footer-info">
                    <ul>
                        <li><a class="curPointer">info@ejemplo.com</a></li>
                        <li>+598 94 984 427</li>
                        <li><a class="curPointer">Contacto</a></li>
                        <li><a href="<?php echo constant('URL'); ?>index/envios" class="curPointer">Envíos</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-box">
                <div class="footer-title">
                    <h2>PRODUCTOS</h2>
                </div>
                <div class="footer-info">
                    <ul>
                        <li><a class="categoryClick curPointer" id="hombre">Hombre</a></li>
                        <li><a class="categoryClick curPointer" id="mujer">Mujer</a></li>
                        <li><a class="categoryClick curPointer" id="ninio">Niño</a></li>
                        <li><a class="categoryClick curPointer" id="accesorios">Accesorios</a></li>
                        <li><img src="<?php echo constant('IMG'); ?>metodos_de_pago/metodos_pago.png" class="no-seleccion"></li>
                    </ul>
                </div>
            </div>
            <div class="footer-box">
                <div class="footer-title">
                    <h2>NEWSLETTER</h2>
                </div>
                <div class="footer-info">
                    <P>Ingrese su correo para recibir lo último en descuentos, nuevos lanzamientos y más...</P>
                    <div id="div-nl">
                        <input type="email" placeholder="Correo electrónico" id="input-nl" class="no-seleccion">
                        <button id="btn-nl"><i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                    <div id="social-media">
                        <a href=""><i class="fa-brands fa-instagram"></i></a>
                        <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                        <a href=""><i class="fa-brands fa-twitter"></i></a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</footer>