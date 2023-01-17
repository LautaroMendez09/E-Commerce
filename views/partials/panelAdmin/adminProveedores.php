<div class="div-create">
    <button class="btn-create btn-createItem" id="btn-createProv">
        <i class="fa-solid fa-truck-ramp-box" style="margin-right: 7px;"></i>
        Agregar Proveedor
    </button>
</div>
<div class="modal" id="modal-createProv">
    <div class="modal-container">
        
        <div class="modal-header">
            <p class="modal-title">Agregando proveedor</p>
            <p class="modal-close no-seleccion">&#215</p>
        </div>

        <div class="modal-info-create">
            <form class="form" id="form-createProv" method="POST">
                <div class="modal-data">

                    <p class="p-editUser">RUT:</p>
                    <input class="inp-editUser" type="number" name="prov_rut" required>

                    <p class="p-editUser">Nombre:</p>
                    <input class="inp-editUser" type="text" name="prov_name" required>

                    <p class="p-editUser">Teléfono:</p>
                    <input class="inp-editUser" type="number" name="prov_tel" required>

                    <p class="p-editUser">Dirección:</p>
                    <input class="inp-editUser" type="text" name="prov_direc" required>

                </div>

                <div class="modal-btns">
                    <button class="btn-modal btn-accept-editUser" id="btn-accept-createProv" type="submit">Aceptar</button>
                    <div class="btn-modal btn-cancel-modal no-seleccion" id="btn-cancel-createProv">Cancelar</div>
                </div>
            </form>
        </div>

    </div>
</div>
<div class="container-table container-table-prov" id="div-provs">

    <div class="table-title table-title-prov">Gestor de proveedores</div>


    <div class="table-header">ID</div>
    <div class="table-header">RUT</div>
    <div class="table-header">Nombre</div>
    <div class="table-header">Teléfono</div>
    <div class="table-header">Dirección</div>
    <div class="table-header">Opciones</div>


    <?php
    $resp = json_decode(file_get_contents('http://localhost/proyecto3BCFinal/ProveedoresManager/getProvs'), TRUE);

    if ($resp['statuscode'] == 200) {
        foreach ($resp['provs'] as $prov) {
            include('views/partials/tablaProvs.php');
        }
    }
    ?>

</div>