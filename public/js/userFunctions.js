/* REGISTER */

const formRegister = document.querySelector('#form-register');

if (formRegister != null) {
    formRegister.addEventListener('submit', (e) => {

        e.preventDefault();
        var data = new FormData(formRegister);


        fetch('http://localhost/proyecto3BCFinal/Register/userNew', {
            method: 'POST',
            body: data
        })
            .then(response => {
                return response.json();
            })
            .then(data => {

                $msj = data['message'];
                if (data['statuscode'] == 200) {

                    window.location.href = 'http://localhost/proyecto3BCFinal/login';

                } else if (data['statuscode'] == 400) {

                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: $msj,
                        showConfirmButton: false,
                        timer: 2500,
                        timerProgressBar: true,
                        toast: true,
                    });
                }
            });

    });
}




/* LOGIN */

const formLogin = document.querySelector('#form-login');

if (formLogin != null) {
    formLogin.addEventListener('submit', (e) => {

        e.preventDefault();
        var data = new FormData(formLogin);


        fetch('http://localhost/proyecto3BCFinal/Login/userTest', {
            method: 'POST',
            body: data
        })
            .then(response => {
                return response.json();
            })
            .then(data => {

                $msj = data['message'];

                if (data['statuscode'] == 200) {
                    
                    window.location.href = 'http://localhost/proyecto3BCFinal/';

                } else if (data['statuscode'] == 400) {

                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: $msj,
                        showConfirmButton: false,
                        timer: 2500,
                        timerProgressBar: true,
                        toast: true,
                    });
                }
            });

    });
}




/* BOTON RESTABLECER CONTRASEÑA */

/* VERIFICA QUE EL EMAIL EXISTA Y SI ES ASI ENVIA UN CORREO CON EL CODIGO DE RECUPERACION */
const formResetPassword = document.querySelector('#form-resetPassword');

if (formResetPassword != null) {
    formResetPassword.addEventListener('submit', (e) => {

        e.preventDefault();
        var data = new FormData(formResetPassword);


        fetch('http://localhost/proyecto3BCFinal/Login/sendEmail', {
            method: 'POST',
            body: data
        })
            .then(response => {
                return response.json();
            })
            .then(data => {

                $msj = data['message'];
                if (data['statuscode'] == 200) {

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: $msj,
                        showConfirmButton: false,
                        timer: 2500,
                        timerProgressBar: true,
                        toast: true,
                    });

                    $reset = data['reset'];
                    $email = $reset['email'];
                    $token = $reset['token'];

                    resetPassword($email, $token);



                } else if (data['statuscode'] == 400) {

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

    });
}

function resetPassword($email, $token) {
    fetch("http://localhost/proyecto3BCFinal/Login/recuperarContrasenia?email=" + $email + "&token=" + $token)
        .then(response => {
            console.log(response);
            return response.text();
        })
        .then(data => {

            window.location.href = "http://localhost/proyecto3BCFinal/Login/recuperarContrasenia?email=" + $email + "&token=" + $token;

        });
}

const formInsertCode = document.querySelector('#form-insertCode');

if (formInsertCode != null) {
    formInsertCode.addEventListener('submit', (e) => {

        e.preventDefault();
        var data = new FormData(formInsertCode);


        fetch('http://localhost/proyecto3BCFinal/Login/codeExists', {
            method: 'POST',
            body: data
        })
            .then(response => {
                return response.json();
            })
            .then(data => {

                $msj = data['message'];
                if (data['statuscode'] == 200) {
                    $email = data['email'];
                    html = `<form class="form" id="form-changePassword" action="" method="POST">

                                <p id="forgotPassword-title">Ingrese su nueva contraseña</p>

                                <div class="division division-register"></div>
                
                                <div class="container-inps-forgotPassword" style="flex-direction: column;">
                                    <input class="inp-login" type="password" placeholder="Contraseña nueva" name="password1">
                                    <input class="inp-login" type="password" placeholder="Confirmar contraseña" name="password2">
                                    <input type="hidden" name="email" value="${$email}">
                                </div>
                
                                <div class="division division-register"></div>
                
                                <div class="container-btn-forgotPassword">
                                    <button class="button btn-forgotPassword" type="submit">Aceptar</button>
                                </div>
                                
                            </form>`;

                    const containerResetPassword = document.querySelector('#container-forgotPassword');
                    containerResetPassword.innerHTML = html;

                } else if (data['statuscode'] == 400) {

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


                const formChangePassword = document.querySelector('#form-changePassword');

                if (formChangePassword != null) {
                    formChangePassword.addEventListener('submit', (e) => {

                        e.preventDefault();
                        var data = new FormData(formChangePassword);


                        fetch('http://localhost/proyecto3BCFinal/Login/cambiarContrasenia', {
                            method: 'POST',
                            body: data
                        })
                            .then(response => {
                                return response.json();
                            })
                            .then(data => {

                                $msj = "";
                                
                                if (data['statuscode'] == 200) {

                                    $msj = data['message'];

                                      Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: $msj,
                                        showConfirmButton: true,
                                        allowOutsideClick: false,
                                        allowEscapeKey: false,
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = "http://localhost/proyecto3BCFinal/login/";
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

                    });
                }
            });

    });
}

