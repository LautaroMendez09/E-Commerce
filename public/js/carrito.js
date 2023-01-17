
const bodyCompra = document.querySelector('#bodyCompra');
if (bodyCompra != null) {
    renderCarritoCompra();
}
const bodyPago = document.querySelector('#bodyPago');
if (bodyPago != null) {
    renderCarritoPago();
}



const bodyProductInfo = document.querySelector('#bodyProductInfo');
if (bodyProductInfo != null) {
    functionProductInfo();
}

function functionProductInfo() {

    id = document.querySelector('#container-productCard-id').children[0].value;

    fetch('http://localhost/proyecto3BCFinal/apiCarrito/apiCarri?action=mostrar')
        .then(response => response.json())
        .then(data => {

            const productCardAmount = document.querySelector('#productCard-amount');
            $corr = false;
            $cant = 0
            data.items.forEach(element => {

                if (element.id == id) {
                    $corr = true;
                    $cant = element.cantidad;
                }

            });

            if ($corr == true) {
                productCardAmount.innerHTML = `<input class="productInfo-inpAmount" type="text" value="${$cant}" readonly>`;
            } else {
                productCardAmount.innerHTML = `<input class="productInfo-inpAmount" type="text" value="0" readonly>`;
            }

        });
}

document.querySelectorAll('.btn-remove-productInfo').forEach(boton => {
    boton.addEventListener('click', () => {
        const id = boton.parentElement.parentElement.parentElement.parentElement.parentElement.children[0].value;
        removeItemFromCarrito(id);
    })
});

document.querySelectorAll('.btn-add-productInfo').forEach(boton1 => {
    boton1.addEventListener('click', () => {
        const id = boton1.parentElement.parentElement.parentElement.parentElement.parentElement.children[0].value;
        addItemToCarrito(id);

    })
});





const selectMetodoEnvio = document.querySelector('#select-metodoEnvio-id');
if (selectMetodoEnvio != null) {
    selectMetodoEnvio.addEventListener('change', event => {
        var optionSelectedValue = selectMetodoEnvio.options[selectMetodoEnvio.selectedIndex].value;
        const btnPaypal = document.querySelector('#paypal-button-container');
        const selectEnvioDetail = document.querySelector('#container-select-envioDetail');
        if (optionSelectedValue == 'pickup') {

            selectEnvioDetail.innerHTML = `<select name="pickup" class="select-metodoEnvio" id="select-pickup-id">
                                                <option value="">Seleccione un Pick-up</option>
                                                <option value="carrrasco">DAC Carrasco</option>
                                                <option value="tresCruces">Tres Cruces</option>
                                                <option value="ciaCosta">Ciudad de la Costa</option>
                                                <option value="lasPiedras">Las Piedras</option>
                                            </select>`;

            const selectPickup = document.querySelector('#select-pickup-id');

            selectPickup.addEventListener('change', event => {
                var optionPickupValue = selectPickup.options[selectPickup.selectedIndex].value;
                var optionPickupText = selectPickup.options[selectPickup.selectedIndex].textContent;
                btnPaypal.innerHTML = ``;
                if (optionPickupValue != '') {

                    btnPaypal.innerHTML = ``;
                    paypalButton(optionPickupText);
                }
            });

        } else {
            selectEnvioDetail.innerHTML = ``;
            btnPaypal.innerHTML = ``;
        }

        const selectAgenciaDetail = document.querySelector('#container-select-agenciaDetail');
        if (optionSelectedValue == 'agencia') {

            selectEnvioDetail.innerHTML = `<select name="agencia" class="select-metodoEnvio" id="select-agencia-id">
                                                <option value="">Seleccione una agencia</option>
                                                <option value="canelones">Canelones</option>
                                                <option value="maldonado">Maldonado</option>
                                                <option value="montevideo">Montevideo</option>
                                            </select>`;


            const selectAgencia = document.querySelector('#select-agencia-id');
            selectAgencia.addEventListener('change', event => {

                var optionSelectedValueAgencia = selectAgencia.options[selectAgencia.selectedIndex].value;

                

                if (optionSelectedValueAgencia == 'canelones') {

                    selectAgenciaDetail.innerHTML = `<select name="canelones" class="select-metodoEnvio" id="select-agenciaDetail-id">
                                                            <option value="">Seleccione una agencia</option>
                                                            <option value="canelonesAgencia">Canelones</option>
                                                            <option value="santaLuciaAgencia">Santa Lucía</option>
                                                            <option value="progresoAgencia">Progreso</option>
                                                        </select>`;

                    //if()
                    const selectAgenciaDetailOption = document.querySelector('#select-agenciaDetail-id');
                    selectAgenciaDetailOption.addEventListener('change', event => {
                        var SelectedValueAgenciaDetailOption = selectAgenciaDetailOption.options[selectAgenciaDetailOption.selectedIndex].value;
                        var SelectedTextAgenciaDetailOption = selectAgenciaDetailOption.options[selectAgenciaDetailOption.selectedIndex].textContent;
                        if (SelectedValueAgenciaDetailOption != '') {
                            btnPaypal.innerHTML = ``;
                            paypalButton(SelectedTextAgenciaDetailOption);
                        } else {
                            btnPaypal.innerHTML = ``;
                        }
                    });

                } else if (optionSelectedValueAgencia == 'maldonado') {
                    selectAgenciaDetail.innerHTML = `<select name="maldonado" class="select-metodoEnvio" id="select-agenciaDetail-id">
                                                            <option value="">Seleccione una agencia</option>
                                                            <option value="maldonadoAgencia">Maldonado</option>
                                                            <option value="piriapolisAgencia">Piriapolis</option>
                                                        </select>`;
                    const selectAgenciaDetailOption = document.querySelector('#select-agenciaDetail-id');
                    selectAgenciaDetailOption.addEventListener('change', event => {
                        var SelectedValueAgenciaDetailOption = selectAgenciaDetailOption.options[selectAgenciaDetailOption.selectedIndex].value;
                        var SelectedTextAgenciaDetailOption = selectAgenciaDetailOption.options[selectAgenciaDetailOption.selectedIndex].textContent;
                        if (SelectedValueAgenciaDetailOption != '') {
                            btnPaypal.innerHTML = ``;
                            paypalButton(SelectedTextAgenciaDetailOption);
                        } else {
                            btnPaypal.innerHTML = ``;
                        }
                    });
                } else if (optionSelectedValueAgencia == 'montevideo') {
                    selectAgenciaDetail.innerHTML = `<select name="montevideo" class="select-metodoEnvio" id="select-agenciaDetail-id">
                                                            <option value="">Seleccione una agencia</option>
                                                            <option value="avItaliaAgencia">Av Italia</option>
                                                            <option value="tresCrucesAgencia">Tres cruces</option>
                                                        </select>`;
                    const selectAgenciaDetailOption = document.querySelector('#select-agenciaDetail-id');
                    selectAgenciaDetailOption.addEventListener('change', event => {
                        var SelectedValueAgenciaDetailOption = selectAgenciaDetailOption.options[selectAgenciaDetailOption.selectedIndex].value;
                        var SelectedTextAgenciaDetailOption = selectAgenciaDetailOption.options[selectAgenciaDetailOption.selectedIndex].textContent;
                        if (SelectedValueAgenciaDetailOption != '') {
                            btnPaypal.innerHTML = ``;
                            paypalButton(SelectedTextAgenciaDetailOption);
                        } else {
                            btnPaypal.innerHTML = ``;
                        }
                    });
                } else if (optionSelectedValueAgencia == '' || optionSelectedValue != 'agencia') {
                    selectAgenciaDetail.innerHTML = ``;
                    btnPaypal.innerHTML = ``;
                }

            });
        } else {
            selectAgenciaDetail.innerHTML = ``;
            btnPaypal.innerHTML = ``;
        }

    })
}

function paypalButton(optionEnvio) {
    
    paypal.Buttons({
        style: {
            color: 'blue',
            shape: 'pill',
            label: 'pay'
        },

        createOrder: function (data, actions) {

            
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: $total
                    }
                }]
            });
        },

        onApprove: function (data, actions) {
            actions.order.capture().then(function (detalles) {
                
                return fetch('http://localhost/proyecto3BCFinal/Venta/capturaVenta', {
                    method: 'POST',
                    headers: {
                        'content-type': 'application/json'
                    },
                    body: JSON.stringify({
                        detalles: detalles,
                        envio: optionEnvio,
                    })
                })
                    .then(response => response.json())
                    .then(data => {

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Se ha completado la compra!',
                            text: 'Información sobre la compra en tu perfil.',
                            showConfirmButton: true,
                            confirmButtonColor: '#024486',
                            confirmButtonText: `Aceptar`,
                            allowOutsideClick: false,
                            allowEnterKey: false,
                            allowEscapeKey: false,
                            stopKeydownPropagation: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                limpiarCarrito();
                                window.location.href = 'http://localhost/proyecto3BCFinal/';
                            }
                        })
                    });
            });
        },

        onCancel: function (data) {

            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Se ha cancelado la compra!',
                showConfirmButton: true,
                confirmButtonColor: '#024486',
                confirmButtonText: `Aceptar`,
                allowOutsideClick: false,
                allowEnterKey: false,
                allowEscapeKey: false,
                stopKeydownPropagation: false,
            });
        }
    }).render('#paypal-button-container');

}


function renderCarritoPago() {
    fetch('http://localhost/proyecto3BCFinal/apiCarrito/apiCarri?action=mostrar')
        .then(response => response.json())
        .then(data => {
            const containerPago = document.querySelector('#container-items-pago');
            html = ``;
            if (data.items.length === 0) {
                html = `<div class="table-title table-title-compra table-msj-vacio">CARRITO VACÍO</div>`;
            } else {
                data.items.forEach(element => {
                    html += `<div class="fila-table">
                                <input type='hidden' value='${element.id}'/>
                                <div class="table-item grid-2 table-item-name row-1">
                                    <img class="compra-img-product" src="${urlIMG}productos/${element.imagen}" alt="">
                                    ${element.nombre}
                                </div>
                                <div class="table-item grid-2 row-2">${element.cantidad}</div>
                                <div class="table-item grid-2 row-3">US$ ${element.subtotal}</div>
                            </div>
                        `;
                });
                html += `<div class="table-item table-item-total-compra">Total: US$ ${data.info.total} </div>`;
            }
            containerPago.innerHTML = html;

            $total = data.info.total;

        });
}















function renderCarritoCompra() {
    fetch('http://localhost/proyecto3BCFinal/apiCarrito/apiCarri?action=mostrar')
        .then(response => response.json())
        .then(data => {
            const containerCompra = document.querySelector('#container-items-compra');
            const ContainerLimpiarCompra = document.querySelector('#container-btnCompra');

            html = ``;
            btnLimpiarCarritoHtml = ``;

            if (data.items.length === 0) {
                html = `<div class="table-title table-title-compra table-msj-vacio">CARRITO VACÍO</div>`;
            } else {
                data.items.forEach(element => {
                    html += `<div class="fila-table">
                                <input type='hidden' value='${element.id}'/>
                                <div class="table-item table-item-name grid-2 row-1">
                                    <img class="compra-img-product" src="${urlIMG}productos/${element.imagen}" alt="">
                                    ${element.nombre}
                                </div>
                                <div class="table-item grid-2 row-2">US$ ${element.precio}</div>
                                <div class="table-item grid-2 row-3">
                                    <div class='botones-compra'><i class="btn-add-compra btn-compra fa-regular fa-plus"></i></div>
                                        ${element.cantidad}
                                    <div class='botones-compra'><i class="btn-remove-compra btn-compra fa-solid fa-minus"></i></div>
                                </div>
                                <div class="table-item grid-2 row-4">US$ ${element.subtotal}</div>
                                <div class="table-item grid-2 row-5">
                                    <div class='btns-compra'>
                                        <div class='botones-compra'><i class="btn-delete-compra btn-i-carr fa-solid fa-trash"></i></div>
                                    </div>
                                </div>
                            </div>
                        `;
                });
                html += `<div class="table-item table-item-total grid-2">Total: US$ ${data.info.total} </div>`;
                btnLimpiarCarritoHtml = `<div class="btnCompra" id="limpiarCarrito">Limpiar carrito</div>
                                         <div class="btnCompra" id="realizarCompra">Realizar Compra</div>`;
            }
            containerCompra.innerHTML = html;
            ContainerLimpiarCompra.innerHTML = btnLimpiarCarritoHtml;


            document.querySelectorAll('.btn-remove-compra').forEach(boton => {
                boton.addEventListener('click', () => {
                    const id = boton.parentElement.parentElement.parentElement.children[0].value;
                    removeItemFromCarrito(id);
                })
            });


            document.querySelectorAll('.btn-add-compra').forEach(boton1 => {
                boton1.addEventListener('click', () => {
                    const id = boton1.parentElement.parentElement.parentElement.children[0].value;
                    addItemToCarrito(id);
                })
            });

            document.querySelectorAll('.btn-delete-compra').forEach(boton2 => {
                boton2.addEventListener('click', () => {
                    const id = boton2.parentElement.parentElement.parentElement.parentElement.children[0].value;
                    deleteItemFromCarrito(id);
                })
            });


            const btnRealizarCompra = document.querySelector('#realizarCompra');



            function showMsjError() {

                fetch('http://localhost/proyecto3BCFinal/apiCarrito/apiCarri?action=mostrar')
                    .then(response => response.json())
                    .then(data => {
                        var formData = new FormData();
                        $i = 0;
                        data.items.forEach(element => {

                            formData.append('id' + $i, element.id);
                            formData.append('cant' + $i, element.cantidad);

                            $i++;
                        });
                        $items = data.items;
                        fetch('http://localhost/proyecto3BCFinal/Venta/verifySession', {
                            method: 'POST',
                            body: formData,
                        })
                            .then(response => response.json())
                            .then(data => {

                                if (data.statuscode == 400) {

                                    if (data['msj']) {

                                        Swal.fire({
                                            position: 'top-end',
                                            icon: 'error',
                                            title: data['msj'],
                                            showConfirmButton: false,
                                            timer: 2500,
                                            timerProgressBar: true,
                                            toast: true,
                                        })
                                    } else {
                                        $j = 0;
                                        $nombres = '';
                                        $items.forEach(element => {
                                            if (data.ids[$j].id == element.id) {
                                                $nombres += element.nombre + ' ';
                                                $j++
                                            }
                                        });
                                        $msj = 'El/los productos ' + $nombres + ' no tienen stock';

                                        Swal.fire({
                                            position: 'top-end',
                                            icon: 'error',
                                            title: $msj,
                                            showConfirmButton: false,
                                            timer: 2500,
                                            timerProgressBar: true,
                                            toast: true,
                                        })
                                    }

                                } else {
                                    window.location = url + 'venta/pago';
                                }

                            });

                    });



            }


            if (btnRealizarCompra != null) {
                btnRealizarCompra.addEventListener('click', showMsjError);
            }





            const btnlimpiarCarrito = document.querySelector('#limpiarCarrito');

            if (btnlimpiarCarrito != null) {
                btnlimpiarCarrito.addEventListener('click', limpiarCarrito);
            }


        })
}


function limpiarCarrito() {


    fetch('http://localhost/proyecto3BCFinal/apiCarrito/clean')
        .then(response => response.text())
        .then(data => {

            if (bodyCompra != null) {
                renderCarritoCompra();
            }

        });
}




document.addEventListener('DOMContentLoaded', () => {
    const cookies = document.cookie.split(';');
    let cookie = null;
    cookies.forEach(item => {
        if (item.indexOf('items') > -1) {
            cookie = item;
        }
    });
})




const bCarrito = document.querySelector('.btn-carrito');

bCarrito.addEventListener('click', (e) => {
    e.preventDefault();
    const carritoContainer = document.querySelector('#divShopping');

    if (contador == 0) {
        carritoContainer.classList.add('showed');
        contador = 1;
        actualizarCarritoUI();
    } else {
        carritoContainer.classList.remove('showed');
        contador = 0;
    }

});






function actualizarCarritoUI() {
    fetch('http://localhost/proyecto3BCFinal/apiCarrito/apiCarri?action=mostrar')
        .then(response => {
            return response.json();
        })
        .then(data => {
            let tablaCont = document.querySelector('#tabla');
            let precioTotal = '';
            let html = ``;

            data.items.forEach(element => {
                html += `
                <div class='fila'>
                    <div class='imagen no-seleccion'><img src="${urlIMG}productos/${element.imagen}" width="130"/></div>
                    <div class='cont-info'>
                        <div class='info'>
                            <input type='hidden' value='${element.id}'/>
                            <div class='nombre'>${element.nombre}</div>
                            <div class="carr-info no-seleccion">x ${element.cantidad}</div>
                            <div class="carr-info subtotal no-seleccion">$ ${element.subtotal}</div>
                        </div>
                    </div>
                    <div class='btns-carr'>
                        <div class='botones'><i class="btn-add btn-i-carr fa-regular fa-plus"></i></div>
                        <div class='botones'><i class="btn-remove btn-i-carr fa-solid fa-minus"></i></div>
                    </div>
                </div>
                <div class="carrito-divi"></div>
            
            `;
            });

            precioTotal = `${data.info.total}`;
            tablaCont.innerHTML = html;
            document.cookie = `items=${data.info.count}`;

            document.querySelector('#textTotal').innerHTML = `<div class="div-text no-seleccion" id="text-left"><span>TOTAL:</span></div>
                                                              <div class="div-text no-seleccion" id="text-right"><span>$${data.info.total}</span></div>`;




            document.querySelectorAll('.btn-remove').forEach(boton => {
                boton.addEventListener('click', () => {
                    const id = boton.parentElement.parentElement.parentElement.children[1].children[0].children[0].value;
                    removeItemFromCarrito(id);
                })
            });

            document.querySelectorAll('.btn-add').forEach(boton1 => {
                boton1.addEventListener('click', () => {
                    const id = boton1.parentElement.parentElement.parentElement.children[1].children[0].children[0].value;
                    addItemToCarrito(id);

                })
            });


        });
}




const botones = document.querySelectorAll('.carrito-prod');

botones.forEach(boton => {
    const id = boton.parentElement.parentElement.parentElement.children[0].value;

    boton.addEventListener('click', e => {
        addItemToCarrito(id);
    });
});

const addItemToCarrito = id => {
    fetch('http://localhost/proyecto3BCFinal/apiCarrito/apiCarri?action=add&id=' + id)
        .then(response => {
            return response.text();
        })
        .then(data => {
            actualizarCarritoUI();

            if (bodyProductInfo != null) {
                functionProductInfo();
            }

            if (bodyCompra != null) {
                renderCarritoCompra();
            } else {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Producto agregado al carrito',
                    showConfirmButton: false,
                    timer: 2500,
                    timerProgressBar: true,
                    toast: true,
                })
            }

        });
};

const removeItemFromCarrito = id => {
    fetch('http://localhost/proyecto3BCFinal/apiCarrito/apiCarri?action=remove&id=' + id)
        .then(res => {
            return res.json();
        })
        .then(data => {
            actualizarCarritoUI();

            if (bodyProductInfo != null) {
                functionProductInfo();
            }
            if (bodyCompra != null) {
                renderCarritoCompra();
            }
        });
};

const deleteItemFromCarrito = id => {
    fetch('http://localhost/proyecto3BCFinal/apiCarrito/apiCarri?action=delete&id=' + id)
        .then(res => {
            return res.json();
        })
        .then(data => {
            actualizarCarritoUI();

            if (bodyProductInfo != null) {
                functionProductInfo();
            }
            if (bodyCompra != null) {
                renderCarritoCompra();
            }
        });
};

