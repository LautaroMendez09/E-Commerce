/* BOTON CAMBIAR CONTRASEñA */


const btnChangePassword = document.querySelector('#btn-option-changePassword');

btnChangePassword.addEventListener('click', (e) => {



    (async () => {

        const { value: formPass } = await Swal.fire({
            title: 'Ingrese su contraseña actual, y luego su nueva contraseña',
            html:
                '<input id="actual-password" class="swal2-input" placeholder="Contraseña actual">' +
                '<div class="horizontal-division division-panelUser"></div>' +
                '<input id="new-password1" class="swal2-input" placeholder="Contraseña nueva">' +
                '<input id="new-password2" class="swal2-input" placeholder="Contraseña nueva">',
            showCancelButton: true,
            confirmButtonColor: '#024486',
            cancelButtonColor: '#a31414',
            confirmButtonText: `Aceptar`,
            cancelButtonText: 'Cancelar',
            allowOutsideClick: false,
            allowEnterKey: false,
            allowEscapeKey: false,
            stopKeydownPropagation: false,
            preConfirm: () => {
                return [
                    actualPass = document.getElementById('actual-password').value,
                    newPass1 = document.getElementById('new-password1').value,
                    newPass2 = document.getElementById('new-password2').value
                ]
            }
        });

        if (formPass) {
            var data = new FormData();

            data.append('passwordActual', actualPass);
            data.append('passwordNew1', newPass1);
            data.append('passwordNew2', newPass2);

            fetch('http://localhost/proyecto3BCFinal/UserSession/changePassword', {
                method: 'POST',
                body: data,
            }).then(response => {
                return response.json();
            })
                .then(data => {
                    $msj = '';

                    if (data['statuscode'] == 200) {

                        $msj = data['message'];

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: $msj,
                            showConfirmButton: true,
                            confirmButtonColor: '#024486',
                            confirmButtonText: `Aceptar`,
                            allowOutsideClick: false,
                            allowEnterKey: false,
                            allowEscapeKey: false,
                            stopKeydownPropagation: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        })
                        

                    } else if (data['statuscode'] == 400) {

                        $msj = data['message'];

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
                });
        }



    })();

});


/* BOTON CERRAR SESION */

const btnLogout = document.querySelector('#btn-option-logout');

btnLogout.addEventListener('click', (e) => {

    Swal.fire({
        icon: 'warning',
        title: '¿Desea cerrar sesión?',
        showCancelButton: true,
        confirmButtonColor: '#024486',
        cancelButtonColor: '#a31414',
        confirmButtonText: `Cerrar sesión`,
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch('http://localhost/proyecto3BCFinal/UserSession/Logout')
                .then(window.location.href = 'http://localhost/proyecto3BCFinal/');
        }
    })

});



/* BOTON ELIMINAR CUENTA */

const btnDelete = document.querySelector('#btn-option-delete');

btnDelete.addEventListener('click', (e) => {

    Swal.fire({
        icon: 'warning',
        title: '¿Desea eliminar su cuenta? Perderá toda su información',
        text: 'No habrá vuelta atras y no seremos responsable de cualquier pérdida de datos',
        showCancelButton: true,
        confirmButtonColor: '#024486',
        cancelButtonColor: '#a31414',
        confirmButtonText: `Si, eliminar mi cuenta`,
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {

            (async () => {
                const { value: password } = await Swal.fire({
                    title: 'Ingrese su contraseña para eliminar su cuenta',
                    showCancelButton: true,
                    confirmButtonColor: '#024486',
                    cancelButtonColor: '#a31414',
                    confirmButtonText: `Aceptar`,
                    cancelButtonText: 'Cancelar',
                    allowOutsideClick: false,
                    allowEnterKey: false,
                    allowEscapeKey: false,
                    stopKeydownPropagation: false,

                    input: 'password',
                    inputPlaceholder: 'Contraseña',
                });

                if (password) {
                    var data = new FormData();

                    data.append('password', password);


                    fetch('http://localhost/proyecto3BCFinal/UserSession/deleteAccount', {
                        method: 'POST',
                        body: data,
                    }).then(response => {
                        return response.json();
                    })
                        .then(data => {

                            $msj = '';

                            if (data['statuscode'] == 200) {

                                window.location.href = 'http://localhost/proyecto3BCFinal/UserSession/SessionStatus';

                            } else if (data['statuscode'] == 400) {

                                $msj = data['message'];

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
                        });
                }


            })();

        }
    })

});
