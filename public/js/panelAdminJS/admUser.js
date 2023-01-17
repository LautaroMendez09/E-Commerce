renderAdminUsers();


function renderAdminUsers() {
    fetch('http://localhost/proyecto3BCFinal/UserManager/renderAdminUsers')
        .then(response => response.text())
        .then(data => {
            const admUserContainer = document.querySelector('#admUser');
            admUserContainer.innerHTML = data;



            // FUNCIONES DE CERRAR Y ABRIR EL MODAL AL CLICKEAR ACEPTAR

            const modalCreateUser = document.querySelector('#modal-createUser');
            const modalEditUser = document.querySelectorAll('.modal-editUser');

            function closeModelAcceptButton() {
                modalCreateUser.classList.remove('showed');
            }


            const btnCreateUser = document.querySelector('#btn-createUser');
            const closeModalUser = document.querySelectorAll('.modal-close');

            function openModalCreateUser() {
                modalCreateUser.classList.add('showed');
            }
            btnCreateUser.addEventListener('click', openModalCreateUser);

            closeModalUser.forEach(closeModalFN => {
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

            const btnEditUser = document.querySelectorAll('.btn-edit-user');

            btnEditUser.forEach(openModal => {
                openModal.addEventListener('click', (e) => {
                    e.preventDefault();
                    const modalUserEdit = openModal.parentElement.parentElement.children[1];
                    modalUserEdit.classList.add('showed');
                })
            });





            // BOTON ACEPTAR CREAR

            const formCreateUser = document.querySelector('#form-createUser');

            formCreateUser.addEventListener('submit', function (e) {
                e.preventDefault();
                var data = new FormData(formCreateUser);

                fetch('http://localhost/proyecto3BCFinal/UserManager/createUser', {
                    method: 'POST',
                    body: data
                })
                    .then(response => {
                        return response.json();
                    })
                    .then(data => {

                        if (data['statuscode'] == 200) {
                            renderAdminUsers();
                            closeModelAcceptButton();
                        }
                    })

            });



            // BOTON CANCELAR CREAR Y EDITAR

            const btnCancelarUser = document.querySelectorAll('.btn-cancel-modal');

            btnCancelarUser.forEach(cancelBtnUser => {
                cancelBtnUser.addEventListener('click', (e) => {
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
                            modalCloseCancel = cancelBtnUser.parentElement.parentElement.parentElement.parentElement.parentElement;
                            modalCloseCancel.classList.remove('showed');
                        }
                    })
                })
            });


            // BOTON ACEPTAR EDITAR

            const formEditUser = document.querySelectorAll('.form-editUser');

            formEditUser.forEach(formEditUserBtn => {
                formEditUserBtn.addEventListener('submit', (e) => {
                    e.preventDefault();
                    var data = new FormData(formEditUserBtn);


                    fetch('http://localhost/proyecto3BCFinal/UserManager/updateUser', {
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
                                    title: 'Usuario editado con éxito',
                                    showConfirmButton: false,
                                    timer: 2500,
                                    timerProgressBar: true,
                                    toast: true,
                                })

                                const modalForm = formEditUserBtn.parentElement.parentElement.parentElement;
                                modalForm.classList.remove('showed');

                                renderAdminUsers();
                            }
                        })

                });
            });

            // BOTON ELIMINAR 

            const btnRmvUser = document.querySelectorAll('.btn-rmv-user');

            btnRmvUser.forEach(botonUser => {
                botonUser.addEventListener('click', () => {

                    const id = botonUser.parentElement.children[0].children[0].value;
                    Swal.fire({
                        title: '¿Desea eliminar el usuario con ID: ' + id + '?',
                        text: "No podrás revertir este cambio.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, elimínalo',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            eliminarUser(id);
                            Swal.fire(
                                'Eliminado!',
                                'Este usuario ha sido eliminado.',
                                'success'
                            )
                        }
                    })

                })
            });
            function eliminarUser(id) {
                fetch('http://localhost/proyecto3BCFinal/UserManager/deleteUser?id=' + id)
                    .then(response => {
                        return response.json();
                    })
                    .then(data => {
                        if (data['statuscode'] == 200) {

                            const divUsers = document.querySelector("#div-users");
                            const filaUser = document.querySelector("#fila-user-" + id);

                            divUsers.removeChild(filaUser);

                        }
                    })
            }

        });

}



