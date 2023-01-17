<script type="text/javascript">
    const url = ( "<?php echo constant('URL'); ?>" );
    const urlIMG = ( "<?php echo constant('IMG'); ?>" );
</script>
<link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>public/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>public/css/header.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>public/css/responsive.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link 
  href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>
  
<script src="https://kit.fontawesome.com/8efff646d1.js" crossorigin="anonymous"></script>

<section id="sec-nav">
    <div id="nav">
        <div id="nav-info">
            <div class="conteCarrusel no-seleccion">
                <i class="fa-solid fa-angle-left flecha" id="izq"></i>
                <p class="itemNavInfo showed2 " id="p1">Hecho en Uruguay</p>
                <p class="itemNavInfo " id="p2">Envíos a todo el país</p>
                <p class="itemNavInfo " id="p3">A partir de 100$, envíos gratis!</p>
                <i class="fa-solid fa-angle-right flecha" id="der"></i>
            </div>
        </div>
        <div id="nav-elem">
            <div id="div-logo" class="no-seleccion">
                <a id="a-logo" href="<?php echo constant('URL'); ?>"><img id="logo-img" src="<?php echo constant('IMG'); ?>nav/LOGO.png"></a>
            </div>
            <input type="checkbox" class="checkCat" id="check">
            <label for="check" class="menu-hamburguer mostrar-menu"> &#8801 </label>
            <div id="categorias">
                <ul id="categorias-ul">
                    <li class="nav-item no-seleccion"><a class="menu-item" href="<?php echo constant('URL'); ?>">INICIO</a>
                    <li class="nav-item no-seleccion">
                        <div class="name-cat">
                            <a class="menu-item categoryClick" id="hombre">HOMBRE</a>
                            <i class="fa-solid fa-angle-down flecha-nav"></i>
                        </div>
                        <div class="submenu">
                            <div class="submenu-division sm-img">
                                <img src="<?php echo constant('IMG'); ?>nav/hombre.jpg" alt="">
                            </div>
                            <div class="submenu-division">
                                <ul>
                                    <li><a class="submenu-item categoryClick" href="" id="HbaniadoresWaterpolo">Bañadores Waterpolo</a></li>
                                    <li><a class="submenu-item categoryClick" href="" id="HbaniadoresNatacion">Bañadores Natación</a></li>
                                    <li><a class="submenu-item categoryClick" href="" id="HbaniadoresLisos">Bañadores lisos</a></li>
                                    <li><a class="submenu-item categoryClick" href="" id="Hboxers">Bóxers</a></li>
                                </ul>
                            </div>
                            <div class="submenu-division">
                                <ul>
                                    <li><a class="submenu-item categoryClick" href="" id="HbaniadoresSupertank">Bañadores Supertank</a></li>
                                    <li><a class="submenu-item categoryClick" href="" id="HbaniadoresJammer">Bañadores Jammer</a></li>
                                </ul>
                            </div>
                           
                        </div>
                    </li>
                    <li class="nav-item no-seleccion">
                        <div class="name-cat">
                            <a class="menu-item categoryClick" id="mujer">MUJER</a>
                            <i class="fa-solid fa-angle-down flecha-nav"></i>
                        </div>
                        <div class="submenu">
                            <div class="submenu-division sm-img">
                                <img src="<?php echo constant('IMG'); ?>nav/mujer.jpg" alt="">
                            </div>
                            <div class="submenu-division">
                                <ul>
                                    <li><a class="submenu-item categoryClick" href="" id="MbaniadoresWaterpolo">Bañadores Waterpolo</a></li>
                                    <li><a class="submenu-item categoryClick" href="" id="MbaniadoresRevolution">Bañadores Revolution</a></li>
                                    <li><a class="submenu-item categoryClick" href="" id="MbaniadoresLisos">Bañadores lisos</a></li>
                                    <li><a class="submenu-item categoryClick" href="" id="MbaniadoresSirene">Bañadores Sirene</a></li>
                                </ul>
                            </div>
                            <div class="submenu-division">
                                <ul>
                                    <li><a class="submenu-item categoryClick" href="" id="MbaniadoresTirante-Fino">Bañadores tirante fino</a></li>
                                    <li><a class="submenu-item categoryClick" href="" id="MbaniadoresRelax">Bañadores Relax</a></li>
                                    <li><a class="submenu-item categoryClick" href="" id="MbaniadoresSenior-Master">Bañadores Senior & Master</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item no-seleccion">
                        <div class="name-cat">
                            <a class="menu-item categoryClick" id="ninio">NIÑO</a>
                            <i class="fa-solid fa-angle-down flecha-nav"></i>
                        </div>
                        <div class="submenu">
                            <div class="submenu-division  sm-img">
                                <img src="<?php echo constant('IMG'); ?>nav/niños.jpg" alt="">
                            </div>
                            <div class="submenu-division">
                                <ul>
                                    <li><a class="submenu-item categoryClick" href="" id="NbaniadoresNinios">Bañadores niños</a></li>
                                    <li><a class="submenu-item categoryClick" href="" id="NbaniadoresNinias">Bañadores niñas</a></li>
                                    <li><a class="submenu-item categoryClick" href="" id="NbaniadoresMini">Bañadores Mini</a></li>
                                    <li><a class="submenu-item categoryClick" href="" id="NbaniadoresLisos">Bañadores lisos</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item no-seleccion">
                        <div class="name-cat">
                            <a class="menu-item categoryClick" id="accesorios">ACCESORIOS</a>
                            <i class="fa-solid fa-angle-down flecha-nav"></i>
                        </div>
                        <div class="submenu">
                            <div class="submenu-division sm-img">
                                <img src="<?php echo constant('IMG'); ?>nav/accesorios.jpg" alt="">
                            </div>
                            <div class="submenu-division">
                                <ul>
                                    <li><a class="submenu-item categoryClick" href="" id="AgorrosSilicona">Gorros de silicona</a></li>
                                    <li><a class="submenu-item categoryClick" href="" id="AgorrosLycra-Polister">Gorros de Lycra & Polister</a></li>
                                    <li><a class="submenu-item categoryClick" href="" id="AgorrosWaterpolo">Gorros Waterpolo</a></li>
                                    <li><a class="submenu-item categoryClick" href="" id="ApelotasWaterpolo">Pelotas Waterpolo</a></li>
                                </ul>
                            </div>
                            <div class="submenu-division">
                                <ul>
                                    <li><a class="submenu-item categoryClick" href="" id="Amochilas">Mochilas</a></li>
                                    <li><a class="submenu-item categoryClick" href="" id="Atoallas">Toallas</a></li>
                                    <li><a class="submenu-item categoryClick" href="" id="AgafasNatacion">Gafas de natación</a></li>
                                    <li><a class="submenu-item categoryClick" href="" id="Atapones-pinzas-nariz">Tapones y pinzas nariz</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item no-seleccion"><a class="menu-item" href="<?php echo constant('URL'); ?>index/nosotros">NOSOTROS</a>
                    <label for="check" class="esconder-menu"> &#215 </label>
                </ul>
            </div>
            <div id="extras">
                <div class="inicio-icon"><i id="searchOpen" class="item-extras fa-solid fa-magnifying-glass"></i>
                    <div id="divSearch" class="divSearch ">
                        <div class="subdiv-search">
                            <input type="search" id="search" class="no-seleccion" placeholder="Buscar" />
                            <button id="btn-search"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </div>
                </div>
                <div class="inicio-icon" id="i-i-margin"><a href="<?php echo constant('URL'); ?>UserSession/SessionStatus"><i class="item-extras fa-solid fa-user"></i></a></div>
                <div class="inicio-icon"><i class="item-extras btn-carrito fa-solid fa-cart-shopping"></i>
                    <div id="divShopping" class="divShopping ">
                        <div class="subdiv-shopping" id="subdiv-shopping">
                            <div id="tabla">

                            </div>
                            <div class="texto" id="textTotal">
                                
                            </div>
                            <div class="no-seleccion" id="div-btn-shopping"><a href="<?php echo constant('URL'); ?>venta" id="a-shopping">FINALIZAR PEDIDO</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


