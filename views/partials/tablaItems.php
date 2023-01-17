<div class="fila-table" id="fila-item-<?php echo $item[$i]['id']; ?>">
    <div class="table-item"><?php echo $item[$i]['id']; ?></div>
    <div class="table-item"><?php echo $item[$i]['code']; ?></div>
    <div class="table-item"><?php echo $item[$i]['name']; ?></div>
    <div class="table-item table-item-large"><?php echo $item[$i]['description']; ?></div>
    <div class="table-item"><?php echo $item[$i]['stock']; ?></div>
    <div class="table-item">$ <?php echo $item[$i]['price']; ?></div>
    <div class="table-item table-item-large"><?php echo $item[$i]['category']; ?></div>
    <div class="table-item"><?php echo $item[$i]['image']; ?></div>
    <div class="table-item">
        <div class="div-btn-adm">

            <form class="form form-editItem form-btnEditarItem">
                <input type='hidden' name="itemId" value='<?php echo $item[$i]['id']; ?>'/>
                <button class="btn-adm btn-edit btn-edit-item" type="click"><i class="fa-regular fa-pen-to-square icon-btnsEdit"></i>Editar</button>
            </form>

            <div class="modal modal-editItem" id="modal-editItem">
                <div class="modal-container" id="modal-container-id-item">
                    
                        <div class="modal-header">
                            <p class="modal-title">Editando producto</p>
                            <p class="modal-close no-seleccion" id="modal-closeEdit-id">&#215</p>
                        </div>
                        
                        <div class="modal-info modal-info-edit-item">
                            <form class="form form-editItem" action="" enctype="multipart/form-data">
                                <div class="modal-data">

                                    <div class="div-middle-modal-data">
                                        <div class="div-half-modal-data">
                                            <p class="p-editUser">ID:</p>
                                            <input class="inp-editUser UserId editItem-id" type="number" name="id" readonly required value="<?php echo $item[$i]['id']; ?>">
                                        </div>
                                        <div class="div-half-modal-data">
                                            <p class="p-editUser">Categoria:</p>
                                            <div class="btn-open-container" id="btn-open-container-id"><i class="fa-solid fa-angle-down"></i></div>
                                            <div class="container-categories no-seleccion" id="createItem-category" name="item_category">
                                                <?php

                                                $resp2 = json_decode(file_get_contents('http://localhost/proyecto3BCFinal/ProductManager/getCategories'), TRUE);
                                                
                                                if ($resp2['statuscode'] == 200) {
                                                    //$i = 0;
                                                    $separacion = explode(" ", $item[$i]['category']);
                                                    $h = 0;
                                                    foreach ($resp2['categories'] as $category) {
                                                        
                                                        for ($j=0; $j < count($separacion); $j++) { 
                                                            
                                                            if ($separacion[$j] == $category['category']) {
                                                                
                                                                $checked = 'checked="checked"';
                                                                ?><div class="container-inp-categories"><input type="checkbox" name="<?php echo 'item_category'.$h ?>" class="<?php echo 'inp-editItem'.$item[$i]['id']; ?>" value="<?php echo $category['category']; ?>"  <?php echo $checked; ?> ><?php echo $category['category']; ?></div><?php
                                                                $j++;
                                                                $h++;
                                                                continue 2;
                                                            } else if ($j == count($separacion)-1) {
                                                                $checked = '';
                                                                ?><div class="container-inp-categories"><input type="checkbox" name="<?php echo 'item_category'.$h ?>" class="<?php echo 'inp-editItem'.$item[$i]['id']; ?>" value="<?php echo $category['category']; ?>" <?php echo $checked; ?> ><?php echo $category['category']; ?></div><?php
                                                                $h++;
                                                            } 
                                                        }
                                                    }
                                                } else {
                                                    echo $resp2['response'];
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="div-middle-modal-data">
                                        <div class="div-half-modal-data">
                                            <p class="p-editUser">Nombre:</p>
                                            <input class="inp-editUser editItem-name" type="name" name="item_name" required value="<?php echo $item[$i]['name']; ?>">
                                        </div>

                                        <div class="div-half-modal-data">
                                            <p class="p-editUser">Código:</p>
                                            <input class="inp-editUser editItem-name" type="name" name="item_code" required value="<?php echo $item[$i]['code']; ?>">
                                        </div>
                                    </div>

                                    <p class="p-editUser">Descripción:</p>
                                    <textarea class="inp-editUser textarea-createItem"  name="item_description" required value="<?php echo $item[$i]['description']; ?>"><?php echo $item[$i]['description']; ?></textarea>

                                    <p class="p-editUser">Precio: (US$)</p>
                                    <input class="inp-editUser"  type="number" step="0.01" name="item_price" required value="<?php echo $item[$i]['price']; ?>">
                                        
                                    <p class="p-editUser">Imagen:</p>
                                    <input class="inp-editUser"  type="file" name="item_image" value="<?php echo $item[$i]['image']; ?>">

                                </div>
                                <div><p><?php echo $this->mensaje; ?></p></div>
                                <div class="modal-btns">
                                    <button class="btn-modal btn-accept-editUser" type="submit">Aceptar</button>

                                    <div class="btn-modal btn-cancel-modal no-seleccion" id="btn-cancel-editItem">Cancelar</div>    
                                </div>
                            </form>
                        </div>
 
                    
                </div>
            </div>

            <div>|</div>
            
            <div class="btn-adm btn-rmv btn-rmv-item" data-id="<?php echo $item[$i]['id']; ?>"><i class="fa-sharp fa-solid fa-trash removeItem icon-btnsEdit"></i>Eliminar</div>
          
        </div>
    </div>
</div>