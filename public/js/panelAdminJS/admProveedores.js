renderAdminProveedores();


function renderAdminProveedores() {
    fetch('http://localhost/proyecto3BCFinal/ProveedoresManager/renderAdminProveedores')
        .then(response => response.text())
        .then(data => {
            const admProveedoresContainer = document.querySelector('#admProveedores');
            admProveedoresContainer.innerHTML = data;



            const modalCreateProv = document.querySelector('#modal-createProv');

            function closeModelAcceptButton() {
                modalCreateProv.classList.remove('showed');
            }

            const btnCreateProv = document.querySelector('#btn-createProv');

            function openModalCreateProv() {
                modalCreateProv.classList.add('showed');
            }
            btnCreateProv.addEventListener('click', openModalCreateProv);



            const closeModalProv = document.querySelectorAll('.modal-close');

            closeModalProv.forEach(closeModalFN => {
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


            const btnEditProv = document.querySelectorAll('.btn-edit-prov');

            btnEditProv.forEach(openModal => {
                openModal.addEventListener('click', (e) => {
                    e.preventDefault();
                    const modalprovEdit = openModal.parentElement.parentElement.children[1];
                    modalprovEdit.classList.add('showed');
                })
            });





            /* BOTON ACEPTAR EN CREAR */

            const formCreateProv = document.querySelector('#form-createProv');

            formCreateProv.addEventListener('submit', function (e) {

                e.preventDefault();
                var data = new FormData(formCreateProv);

        
                fetch('http://localhost/proyecto3BCFinal/ProveedoresManager/createProv', {
                    method: 'POST',
                    body: data
                })
                    .then(response => {
                        return response.json();
                    })
                    .then(data => {

                        if (data['statuscode'] == 200) {
                            renderAdminProveedores();
                            closeModelAcceptButton(); 
                        }
                    })
            });


            /* BOTON ACEPTAR EDITAR */

            const formEditProv = document.querySelectorAll('.form-editProv');

            formEditProv.forEach(formEditProvBtn => {
                formEditProvBtn.addEventListener('submit', (e) => {
                    e.preventDefault();
                    var data = new FormData(formEditProvBtn);

    

                    fetch('http://localhost/proyecto3BCFinal/ProveedoresManager/updateProv', {
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
                                title: 'Proveedor editado con éxito',
                                showConfirmButton: false,
                                timer: 2500,
                                timerProgressBar: true,
                                toast: true,
                                })
    
                            const modalForm = formEditProvBtn.parentElement.parentElement.parentElement;
                            modalForm.classList.remove('showed');
                            
                            renderAdminProveedores();      
                        }
                    })
             
                });
            });



            /* BOTON CANCELAR CREAR Y EDITAR */

            const btnCancelarProv = document.querySelectorAll('.btn-cancel-modal');

            btnCancelarProv.forEach(cancelBtnProv => {
                cancelBtnProv.addEventListener('click', (e) => {
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
                            modalCloseCancel = cancelBtnProv.parentElement.parentElement.parentElement.parentElement.parentElement;
                            modalCloseCancel.classList.remove('showed');
                        }
                    })
                })
            });



            /* BOTON ELIMINAR */

            const btnRmvProv = document.querySelectorAll('.btn-rmv-prov');

            btnRmvProv.forEach(botonProv => {
                botonProv.addEventListener('click', () => {
                    const id = botonProv.parentElement.children[0].children[0].value;
                    Swal.fire({
                        title: '¿Desea eliminar el proveedor con ID: ' + id + '?',
                        text: "No podrás revertir este cambio.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, elimínalo',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            eliminarProv(id);
                            Swal.fire(
                                'Eliminado!',
                                'Este proveedor ha sido eliminado.',
                                'success'
                            )

                        }
                    })

                })
            });

            function eliminarProv(id) {
                fetch('http://localhost/proyecto3BCFinal/ProveedoresManager/deleteProv?id=' + id)
                    .then(response => {
                        return response.json();
                    })
                    .then(data => {
                        if (data['statuscode'] == 200) {

                            const divProvs = document.querySelector("#div-provs");
                            const filaProv = document.querySelector("#fila-prov-" + id);

                            divProvs.removeChild(filaProv);

                        }
                    })
            }


        });

    }