renderHistVentas();

function renderHistVentas() {
    fetch('http://localhost/proyecto3BCFinal/VentaManager/renderHistVentas')
        .then(response => response.text())
        .then(data => {
            const histVentaContainer = document.querySelector('#histVentas');
            histVentaContainer.innerHTML = data;



            const closeModalVenta = document.querySelectorAll('.modal-close');

            closeModalVenta.forEach(closeModalFN => {
                closeModalFN.addEventListener('click', (e) => {


                    if (result.isDenied) {

                        modalEdit = closeModalFN.parentElement.parentElement.parentElement;
                        modalEdit.classList.remove('showed');
                    }
                })
            });





            






            const btnEditVenta = document.querySelectorAll('.btn-edit-venta');

            btnEditVenta.forEach(openModal => {
                openModal.addEventListener('click', (e) => {
                    e.preventDefault();
                    const modalVentaEdit = openModal.parentElement.parentElement.children[1];
                    modalVentaEdit.classList.add('showed');
                    renderVentaByID(openModal);
                })
            });





            const formEditVenta = document.querySelectorAll('.form-editVenta');

            function renderVentaByID(openModal) {
                id = openModal.parentElement.children[0].value;
                fetch('http://localhost/proyecto3BCFinal/VentaManager/getVentaByID?id=' + id)
                    .then(response => {
                        return response.json();
                    })
                    .then(data => {
                        console.log(openModal);
                        //const divContainer = openModal.parentElement.parentElement.children[1].children[0].children[1].children[0].children[3].children[2];

                        if (data['statuscode'] == 200) {
                            html = ``
                            $subtotal = 0.00;
                            data.ventaDetail.forEach(element => {

                                $subtotal = element.cant * element.precio;

                                html += `<div class="container-compraPA-info" id="container-compraPA-info-id">

                                        <p class="p-editUser">Producto:</p>
                                        <select name="compra_prod0" class="select-histCompras">

                                            <option value="">` + element.name + `</option>

                                        </select>

                                        <div class="div-middle-modal-data">

                                            <div class="div-half-modal-data">
                                                <p class="p-editUser">Cantidad:</p>
                                                <input class="inp-editUser calcSum" id="valueCant" type="number" value="` + element.cant + `" readonly>
                                            </div>
                                            <div class="div-half-modal-data">
                                                <p class="p-editUser">Precio: (US$)</p>
                                                <input class="inp-editUser calcSum" id="valuePrecio" type="number" step="0.01" value="` + element.precio + `" readonly>
                                            </div>

                                        </div>

                                        <p class="p-editUser">Subtotal: (US$)</p>
                                        <input class="inp-editUser inp-subtotal" id="valueSubtotal" type="number" step="0.01" name="prov_subtotal" value="`+ $subtotal + `" readonly>

                                    </div>
                                    <div class="horizontal-division division-addProduct-compraPA"></div>`;
                            });

                            const containerProductsInfo = openModal.parentElement.parentElement.children[1].children[0].children[1].children[0].children[3].children[0];
                            containerProductsInfo.innerHTML = html;
                        }
                    })
            }



            /* BOTON CANCELAR CREAR Y EDITAR */

            const btnCancelarVenta = document.querySelectorAll('.btn-cancel-modal');

            btnCancelarVenta.forEach(cancelBtnVenta => {
                cancelBtnVenta.addEventListener('click', (e) => {
                    e.preventDefault();
                    Swal.fire({
                        title: '¿Desea salir? Perderá todos los cambios.',
                        showDenyButton: true,
                        showCancelButton: true,
                        showConfirmButton: false,
                        denyButtonColor: '#024486',
                        cancelButtonColor: '#a31414',
                        denyButtonText: `Descartar cambios`,
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isDenied) {
                            modalCloseCancel = cancelBtnVenta.parentElement.parentElement.parentElement.parentElement.parentElement;
                            modalCloseCancel.classList.remove('showed');
                        }
                    })
                })
            });







            /* BOTON ELIMINAR */

            const btnRmvVenta = document.querySelectorAll('.btn-rmv-Venta');

            btnRmvVenta.forEach(botonVenta => {
                botonVenta.addEventListener('click', () => {
                    const id = botonVenta.parentElement.children[0].children[0].value;
                    Swal.fire({
                        title: '¿Desea eliminar la venta con ID: ' + id + '?',
                        text: "No podrás revertir este cambio.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, elimínala',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            eliminarProv(id);
                            Swal.fire(
                                'Eliminado!',
                                'Esta venta ha sido eliminada.',
                                'success'
                            )

                        }
                    })

                })
            });

            function eliminarVenta(id) {
                fetch('http://localhost/proyecto3BCFinal/VentaManager/deleteVenta?id=' + id)
                    .then(response => {
                        return response.json();
                    })
                    .then(data => {
                        if (data['statuscode'] == 200) {

                            const divVentas = document.querySelector("#div-ventas");
                            const filaVenta = document.querySelector("#fila-venta-" + id);

                            divVentas.removeChild(filaVenta);

                        }
                    })
            }




        });
}
