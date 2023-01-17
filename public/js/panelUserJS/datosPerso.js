const formDatosPersonales = document.querySelector('#form-datosPersonales');

formDatosPersonales.addEventListener('submit', (e) => {
    e.preventDefault();
    var data = new FormData(formDatosPersonales);

    fetch('http://localhost/proyecto3BCFinal/DatosPersonalesManager/updateUser', {
        method: 'POST',
        body: data
    })
        .then(response => {
            return response.json();
        })
        .then(data => {

            $msj = '';

            if (data['statuscode'] == 200) {

                $msj = data['message'];
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: $msj,
                    showConfirmButton: false,
                    timer: 2500,
                    timerProgressBar: true,
                    toast: true,
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
        })
});
