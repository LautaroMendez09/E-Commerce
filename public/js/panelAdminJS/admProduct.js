renderAdminProducts();


function renderAdminProducts() {
    fetch('http://localhost/proyecto3BCFinal/ProductManager/renderAdminProducts')
        .then(response => response.text())
        .then(data => {
            const admProductContainer = document.querySelector('#admProduct');
            admProductContainer.innerHTML = data;



            // FUNCIONES DE CERRAR Y ABRIR EL MODAL AL CLICKEAR ACEPTAR

            const modalCreateItem = document.querySelector('#modal-createItem');
            const modalEditItem = document.querySelectorAll('.modal-editItem');

            function closeModelAcceptButton() {
                modalCreateItem.classList.remove('showed');
            }


            const btnCreateItem = document.querySelector('#btn-createItem');
            const closeModalItem = document.querySelectorAll('.modal-close');

            function openModalCreateItem() {
                modalCreateItem.classList.add('showed');
                //modalEdit.classList.remove('showed');
            }
            btnCreateItem.addEventListener('click', openModalCreateItem);

            closeModalItem.forEach(closeModalFN => {
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
                            //Swal.fire('Cambios descartados')
                            modalEdit = closeModalFN.parentElement.parentElement.parentElement;
                            modalEdit.classList.remove('showed');
                        }
                    })
                })
            });

            const btnEditItem = document.querySelectorAll('.btn-edit-item');

            btnEditItem.forEach(openModal => {
                openModal.addEventListener('click', (e) => {
                    e.preventDefault();
                    const modalItemEdit = openModal.parentElement.parentElement.children[1];
                    modalItemEdit.classList.add('showed');
                })
            });





            // BOTON ABRIR CATEGORIAS EN MODAL

            var btnOpenContainer = document.querySelectorAll('.btn-open-container');

            btnOpenContainer.forEach(openContainerCategories => {
                openContainerCategories.addEventListener('click', (e) => {
                    const containerCateg = openContainerCategories.parentElement.children[2];
                    if (contador == 0) {
                        containerCateg.classList.add('showed');
                        contador = 1;
                    } else {
                        containerCateg.classList.remove('showed');
                        contador = 0;
                    }
                })
            });


            // BOTON ACEPTAR CREAR

            const formCreateItem = document.querySelector('#form-createItem');

            formCreateItem.addEventListener('submit', function (e) {

                e.preventDefault();
                var data = new FormData(formCreateItem);

                var suma = 0;
                var checkboxes = document.querySelectorAll('.inp-createItem');

                for (var i = 0; i < checkboxes.length; i++) {

                    if (checkboxes[i].checked == true) {
                        suma++;
                    }
                }
                if (suma >= 1) {
                    fetch('http://localhost/proyecto3BCFinal/ProductManager/createItem', {
                        method: 'POST',
                        body: data
                    })
                        .then(response => {
                            return response.json();
                        })
                        .then(data => {

                            if (data['statuscode'] == 200) {
                                renderAdminProducts();
                                closeModelAcceptButton(); 
                            }
                        })
                } else {
                    console.log('El producto debe tener al menos una categoria');
                }
            });


            
            // BOTON CANCELAR CREAR Y EDITAR

            const btnCancelarItem = document.querySelectorAll('.btn-cancel-modal');

            btnCancelarItem.forEach(cancelBtnItem => {
                cancelBtnItem.addEventListener('click', (e) => {
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
                            //Swal.fire('Cambios descartados')
                            modalCloseCancel = cancelBtnItem.parentElement.parentElement.parentElement.parentElement.parentElement;
                            modalCloseCancel.classList.remove('showed');
                        }
                    })
                })
            });


            // BOTON ACEPTAR EDITAR

            const formEditItem = document.querySelectorAll('.form-editItem');

            formEditItem.forEach(formEditItemBtn => {
                formEditItemBtn.addEventListener('submit', (e) => {
                    e.preventDefault();
                    var data = new FormData(formEditItemBtn);

                    var suma = 0;
                    var id = data.get('id');
                    var checkboxes = document.querySelectorAll(".inp-editItem" + id);
                    for (var i = 0; i < checkboxes.length; i++) {
                        if (checkboxes[i].checked == true) {
                            suma++;
                        }
                    }
                    if (suma >= 1) {

                        fetch('http://localhost/proyecto3BCFinal/ProductManager/updateItem', {
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
                                    title: 'Producto editado con éxito',
                                    showConfirmButton: false,
                                    timer: 2500,
                                    timerProgressBar: true,
                                    toast: true,
                                  })
        
                                const modalForm = formEditItemBtn.parentElement.parentElement.parentElement;
                                modalForm.classList.remove('showed');
                                
                                renderAdminProducts();      
                            }
                        })
                    } else {
                        console.log('El producto debe tener al menos una categoria');
                    }
                });
            });

            // BOTON ELIMINAR 

            const btnRmvItem = document.querySelectorAll('.btn-rmv-item');

            btnRmvItem.forEach(botonItem => {
                botonItem.addEventListener('click', () => {

                    const id = botonItem.parentElement.children[0].children[0].value;
                    Swal.fire({
                        title: '¿Desea eliminar el producto con ID: ' + id + '?',
                        text: "No podrás revertir este cambio.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, elimínalo',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            eliminarItem(id);
                            Swal.fire(
                                'Eliminado!',
                                'Este producto ha sido eliminado.',
                                'success'
                            )
                        }
                    })

                })
            });
            function eliminarItem(id) {
                fetch('http://localhost/proyecto3BCFinal/ProductManager/deleteItem?id=' + id)
                    .then(response => {
                        return response.json();
                    })
                    .then(data => {
                        if (data['statuscode'] == 200) {

                            const divItems = document.querySelector("#div-items");
                            const filaItem = document.querySelector("#fila-item-" + id);

                            divItems.removeChild(filaItem);

                        }
                    })
            }

        });

}



