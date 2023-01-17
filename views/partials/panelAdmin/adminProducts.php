<div class="div-create">
    <button class="btn-create btn-createItem" id="btn-createItem">
        <i class="fa-sharp fa-solid fa-box" style="margin-right: 7px;"></i>
        Agregar Producto
    </button>
</div>
<div class="modal" id="modal-createItem">
    <div class="modal-container">
        <div class="modal-header">
            <p class="modal-title">Agregando producto</p>
            <p class="modal-close no-seleccion">&#215</p>
        </div>
        
        <div class="modal-info-create">
            <form class="form" id="form-createItem" method="POST" enctype="multipart/form-data">
                <div class="modal-data">

                    <div class="div-middle-modal-data">

                        <div class="div-half-modal-data">
                            <p class="p-editUser">Código:</p>
                            <input class="inp-editUser inp-editUserId" type="number" name="item_code" required>
                        </div>

                        <div class="div-half-modal-data">
                            <p class="p-editUser">Categoria:</p>

                            <div class="btn-open-container" id="btn-open-container-id"><i class="fa-solid fa-angle-down"></i></div>
                            <div class="container-categories no-seleccion" id="createItem-category">

                            <?php

                                $response = json_decode(file_get_contents('http://localhost/proyecto3BCFinal/ProductManager/getCategories'), TRUE);

                                if ($response['statuscode'] == 200) {
                                    $i = 0;
                                    foreach ($response['categories'] as $category) {
                                    
                                        ?><div class="container-inp-categories"><input type="checkbox" class="inp-createItem" name="<?php echo 'item_category'.$i ?>" value="<?php echo $category['category']; ?>"><?php echo $category['category']; ?></div><?php
                                        $i++;
                                    }
                                } else {
                                    echo $response['response'];
                                }
                                
                            ?>

                            </div>

                        </div>

                    </div>

                    <p class="p-editUser">Nombre:</p>
                    <input class="inp-editUser" id="createItem-name" type="text" name="item_name" required>

                    <p class="p-editUser">Descripción:</p>
                    <textarea class="inp-editUser textarea-create" id="createItem-description" name="item_description" maxlength="200" required></textarea>

                    <p class="p-editUser">Precio: (US$)</p>
                    <input class="inp-editUser" id="createItem-price" type="number" step="0.01" name="item_price" required>

                    <p class="p-editUser">Imagen:</p>
                    <input class="inp-editUser" id="createItem-image" type="file" name="item_image" required>

                </div>
                
                <div class="modal-btns">
                    <button class="btn-modal btn-accept-editUser" id="btn-accept-createItem" type="submit">Aceptar</button>
                    <div class="btn-modal btn-cancel-modal no-seleccion" id="btn-cancel-createItem">Cancelar</div>
                </div>
            </form>
        </div>
        
    </div>
</div>
<div class="container-table container-table-prod" id="div-items">

    <div class="table-title table-title-prod">Gestor de productos</div>


    <div class="table-header">ID</div>
    <div class="table-header">Código</div>
    <div class="table-header">Nombre</div>
    <div class="table-header">Descripción</div>
    <div class="table-header">Stock</div>
    <div class="table-header">Precio</div>
    <div class="table-header">Categorias</div>
    <div class="table-header">Imagen</div>
    <div class="table-header">Opciones</div>


    <?php
    $resp = json_decode(file_get_contents('http://localhost/proyecto3BCFinal/ProductManager/getItems'), TRUE);

    if ($resp['statuscode'] == 200) {

        $item = $resp['items'];
        $itemLength = count($item);
        //print_r($itemLength);
        $j = 1;

        for ($i = 0; $i < $itemLength; $i++) {

            if ($j != null) {

                if (isset($item[$i])) {
                    $idI = $item[$i]['id'];

                    $j = $i;
                    $j++;
                    if ($j < $itemLength) {

                        $idJ = $item[$j]['id'];
                        if (isset($idJ)) {

                            if ($idI == $idJ) {

                                $item[$i]['category'] .=  " " . $item[$j]['category'];
                                unset($item[$j]);

                                $h = $j;
                                $h++;

                                for ($h; $h < $itemLength; $h++) {

                                    $idH = $item[$h]['id'];
                                    if ($idI == $idH) {
                                        $item[$i]['category'] .=  " " . $item[$h]['category'];
                                        unset($item[$h]);
                                    }
                                }
                            }
                        }
                    }
                    //print_r($item);
                    include('views/partials/tablaItems.php');
                }
            }
        }
    
    }
    ?>

</div>
