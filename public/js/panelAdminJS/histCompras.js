renderHistCompras();

function renderHistCompras() {
    fetch('http://localhost/proyecto3BCFinal/CompraManager/renderHistCompras')
        .then(response => response.text())
        .then(data => {
            const histCompraContainer = document.querySelector('#histCompras');
            histCompraContainer.innerHTML = data;
            
            
            const modalCreateCompraPA = document.querySelector('#modal-createCompraPA');

            function closeModelAcceptButton() {
                modalCreateCompraPA.classList.remove('showed');
            }

            const btnCreateCompraPA = document.querySelector('#btn-createCompraPA');

            function openModalCreateCompraPA() {
                modalCreateCompraPA.classList.add('showed');
            }
            btnCreateCompraPA.addEventListener('click', openModalCreateCompraPA);





            const closeModalCompraPA = document.querySelectorAll('.modal-close');

            closeModalCompraPA.forEach(closeModalFN => {
                closeModalFN.addEventListener('click', (e) => {

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

                            modalEdit = closeModalFN.parentElement.parentElement.parentElement;
                            modalEdit.classList.remove('showed');
                        }
                    })
                })
            });





            const btnAddProduct = document.querySelector('#btn-addProduct-compraPA');
            $indiceInputs = 1;
            function addContainerProduct() {
                
                htmlOptions = ``;
                fetch('http://localhost/proyecto3BCFinal/ProductManager/getItemsNames')
                .then(response => { 
                    return response.json();
                })
                .then(data => {
                    if (data['statuscode'] == 200) {

                        data.items.forEach(element => {

                            htmlOptions += `<option value="`+ element.id + `">` + element.name + `</option>`;

                        });
                    }  
                
                var divDivision = document.createElement('div');
                divDivision.classList.add('horizontal-division');
                divDivision.classList.add('division-addProduct-compraPA');
                var containerProduct = document.createElement('div');
                containerProduct.classList.add('container-compraPA-info');
                
                containerProduct.innerHTML =`   <div class="container-title-productInfo">
                                                    <p class="p-editUser">Producto:</p>
                                                    <p class="containerProductInfo-close no-seleccion">&#215</p>
                                                </div>
                                                <select name="compra_prod${$indiceInputs}" class="select-histCompras">
                                                    <option value="">Seleccione:</option>
                                                    `
                                                        + htmlOptions +
                                                        
                                                     `
                                                </select>
                                                
                                                <div class="div-middle-modal-data">
                                                
                                                    <div class="div-half-modal-data">
                                                        <p class="p-editUser">Cantidad:</p>
                                                        <input class="inp-editUser calcSum" id="valueCant" type="number" name="compra_cant${$indiceInputs}" required>
                                                    </div>
                                                    <div class="div-half-modal-data">
                                                        <p class="p-editUser">Precio: (US$)</p>
                                                        <input class="inp-editUser calcSum" id="valuePrecio" type="number" name="compra_precio${$indiceInputs}" required>
                                                    </div>
                                                    
                                                </div>
                                                
                                                <p class="p-editUser">Subtotal: (US$)</p>
                                                <input class="inp-editUser inp-subtotal" id="valueSubtotal" type="number" name="prov_subtotal" readonly required>
                                                `;
                document.querySelector('#container-productsInfo').appendChild(divDivision);
                document.querySelector('#container-productsInfo').appendChild(containerProduct);
                $indiceInputs++;
                const btnCalcSum = document.querySelectorAll('.calcSum');

                btnCalcSum.forEach(calcSum => {
                    $cant = 0;
                    $precio = 0;
                    $value = 0;
                    calcSum.onchange = function(){
                        calcularCantXPrecio(calcSum);
                    }
                });

                const btnCloseProductInfo = document.querySelectorAll('.containerProductInfo-close');
                btnCloseProductInfo.forEach(btnClose => {
                    btnClose.addEventListener('click', (e) => {
                        var containerProductInfo = btnClose.parentElement.parentElement;
                        containerProductInfo.previousSibling.remove()
                        containerProductInfo.remove();
                    });
                });
            });
                
            }
            btnAddProduct.addEventListener('click', addContainerProduct);

            

            const btnCalcSum = document.querySelectorAll('.calcSum');
    
            function calcularCantXPrecio(calcSum) {     
                if (calcSum.id === 'valueCant') {
                    $cant = calcSum.value;
                } else if (calcSum.id === 'valuePrecio') {
                    $precio = calcSum.value;
                }
                $subtotal = 0;
                if ($cant.length != 0 && $precio.length != 0 && $cant.length != undefined && $precio.length != undefined) {
                    $subtotal = $cant * $precio;
                    var inpSubtotal = calcSum.parentElement.parentElement.parentElement.children[4];
                    if (inpSubtotal != null) {
                        inpSubtotal.value = $subtotal;
                    }
                    const inpsSubtotal = document.querySelectorAll('.inp-subtotal');
                    $totalT = 0;
                    inpsSubtotal.forEach(inpSubtotal => {
                        
                        if (inpSubtotal.value.length != 0) {
                            $total = 0;
                            $value = inpSubtotal.value;

                            if (Object.values(inpsSubtotal).length > 1) {
                                $total += parseFloat($value);
                            } else {
                                $total = parseFloat($value);
                            }
                            
                            $totalT += $total;

                            const inpTotal = document.querySelector('#valueTotal');
                            inpTotal.value = $totalT;

                        }
                    });
                }

                
            }
            
            

            btnCalcSum.forEach(calcSum => {
                $cant = 0;
                $precio = 0;
                $value = 0;
                calcSum.onchange = function(){   
                    calcularCantXPrecio(calcSum);
                }
            });


            const btnEditCompraPA = document.querySelectorAll('.btn-edit-compraPA');

            btnEditCompraPA.forEach(openModal => {
                openModal.addEventListener('click', (e) => {
                    e.preventDefault();
                    const modalCompraEdit = openModal.parentElement.parentElement.children[1];
                    modalCompraEdit.classList.add('showed');
                    renderCompraByID(openModal);
                })
            });


            /* BOTON ACEPTAR EN CREAR */

            const formCreateCompraPA = document.querySelector('#form-createCompraPA');

            formCreateCompraPA.addEventListener('submit', function (e) {

                e.preventDefault();
                var data = new FormData(formCreateCompraPA);

        
                fetch('http://localhost/proyecto3BCFinal/CompraManager/createCompra', {
                    method: 'POST',
                    body: data
                })
                    .then(response => {
                        return response.json();
                    })
                    .then(data => {
                        
                        if (data['statuscode'] == 200) {
                            renderHistCompras();
                            closeModelAcceptButton(); 
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Compra registrada con éxito',
                                showConfirmButton: false,
                                timer: 2500,
                                timerProgressBar: true,
                                toast: true,
                                })

                        } else if (data['statuscode'] == 400) {
                            $message = data['message'];
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: $message,
                                showConfirmButton: false,
                                timer: 2500,
                                timerProgressBar: true,
                                toast: true,
                            })
                        }
                    })
            });

            const formEditCompra = document.querySelectorAll('.form-editCompraPA');

            function renderCompraByID(openModal){
                id = openModal.parentElement.children[0].value;
                fetch('http://localhost/proyecto3BCFinal/CompraManager/getCompraByID?id=' + id)
                .then(response => {
                    return response.json();
                })
                .then(data => {

                    const divContainer = openModal.parentElement.parentElement.children[1].children[0].children[1].children[0].children[3].children[2];
                    $estado = divContainer.children[0].value;
                    const select = divContainer.children[2];
                    const options = select.children;
                    
                    for (let i = 0; i < options.length; i++) {
                        if (options[i].value === $estado) {
                            options[i].setAttribute('selected', '');
                        }
                    }
    

                    if (data['statuscode'] == 200) {
                        html = ``
                        $subtotal = 0.00;
                        data.comprasDetail.forEach(element => {

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

                                    </div>`;
                        });

                        const containerProductsInfo = openModal.parentElement.parentElement.children[1].children[0].children[1].children[0].children[3].children[0];
                        containerProductsInfo.innerHTML = html;
                    }
                })
            }
            formEditCompra.forEach(formEditCompraBtn => {
                formEditCompraBtn.addEventListener('submit', (e) => {
                    e.preventDefault();

                    var data = new FormData(formEditCompraBtn);

                    fetch('http://localhost/proyecto3BCFinal/CompraManager/updateCompra', {
                        method: 'POST',
                        body: data
                    })
                    .then(response => {
                        return response.json();
                    })
                    .then(data => {
        
                        
                        if (data['statuscode'] == 200) {

                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Compra editada con éxito',
                                showConfirmButton: false,
                                timer: 2500,
                                timerProgressBar: true,
                                toast: true,
                                })
    
                            const modalForm = formEditCompraBtn.parentElement.parentElement.parentElement;
                            modalForm.classList.remove('showed');
                            
                            renderHistCompras();      
                        }
                    })
            
                });
            }); 

            /* BOTON CANCELAR CREAR Y EDITAR */

            const btnCancelarCompraPA = document.querySelectorAll('.btn-cancel-modal');

            btnCancelarCompraPA.forEach(cancelBtnCompraPA => {
                cancelBtnCompraPA.addEventListener('click', (e) => {
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
                            modalCloseCancel = cancelBtnCompraPA.parentElement.parentElement.parentElement.parentElement.parentElement;
                            modalCloseCancel.classList.remove('showed');
                        }
                    })
                })
            });


            /* BOTON ELIMINAR */

            const btnRmvCompra = document.querySelectorAll('.btn-rmv-compraPA');

            btnRmvCompra.forEach(botonCompra => {
                botonCompra.addEventListener('click', () => {
                    const id = botonCompra.parentElement.children[0].children[0].value;
                    Swal.fire({
                        title: '¿Desea eliminar la compra con ID: ' + id + '?',
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
                                'Esta compra ha sido eliminada.',
                                'success'
                            )

                        }
                    })

                })
            });

            function eliminarProv(id) {
                fetch('http://localhost/proyecto3BCFinal/CompraManager/deleteCompra?id=' + id)
                    .then(response => {
                        return response.json();
                    })
                    .then(data => {
                        if (data['statuscode'] == 200) {

                            const divCompras = document.querySelector("#div-compras");
                            const filaCompra = document.querySelector("#fila-compra-" + id);

                            divCompras.removeChild(filaCompra);

                        }
                    })
            }




    });
}
