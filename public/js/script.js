var btnSearch = document.getElementById('searchOpen'),
    divSearch = document.getElementById('divSearch'),
    contador = 0;

function searchMostrar() {
    if (contador == 0) {
        divSearch.classList.add('showed');
        contador = 1;
    } else {
        divSearch.classList.remove('showed');
        contador = 0;
    }
}
btnSearch.addEventListener("click", searchMostrar, true);

var der = document.getElementById('der'),
    izq = document.getElementById('izq'),
    item1 = document.getElementById('p1'),
    item2 = document.getElementById('p2'),
    item3 = document.getElementById('p3'),
    conta = 1;

function irDer() {
    if (conta == 1) {
        item1.classList.remove('showed2');
        item2.classList.add('showed2');
        conta = 2;
    } else if (conta == 2) {
        item2.classList.remove('showed2');
        item3.classList.add('showed2');
        conta = 3;
    } else if (conta == 3) {
        item3.classList.remove('showed2');
        item1.classList.add('showed2');
        conta = 1;
    }
}

der.addEventListener("click", irDer, true);

function irIzq() {
    if (conta == 1) {
        item1.classList.remove('showed2');
        item3.classList.add('showed2');
        conta = 3;
    } else if (conta == 2) {
        item2.classList.remove('showed2');
        item1.classList.add('showed2');
        conta = 1;
    } else if (conta == 3) {
        item3.classList.remove('showed2');
        item2.classList.add('showed2');
        conta = 2;
    }
}

izq.addEventListener("click", irIzq, true);






(function () {

    const navItems = document.querySelectorAll('.nav-item');
    const menu = document.querySelector('.menu__hamburguer');

    if (window.innerWidth <= 770) {
        navItems.forEach(element => {
            element.addEventListener('click', () => {

                let subMenu = element.children[1];
                let height = 0;

                if (subMenu.clientHeight === 0) {
                    height = subMenu.scrollHeight;
                }
                subMenu.style.height = `${height}px`;

            });

        });
    }



})();





const formContact = document.querySelector('#form-contact');

if (formContact != null) {

    formContact.addEventListener('submit', (e) => {
        e.preventDefault();
        var data = new FormData(formContact);

        fetch('http://localhost/proyecto3BCFinal/index/sendContactEmail', {
            method: 'POST',
            body: data
        })
            .then(response => {
                return response.json();
            })
            .then(data => {
                if (data['statuscode'] == 200) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Su correo ha sido enviado con éxito!',
                        showConfirmButton: true,
                        confirmButtonColor: '#024486',
                        confirmButtonText: `Aceptar`,
                        allowOutsideClick: false,
                        allowEnterKey: false,
                        allowEscapeKey: false,
                        stopKeydownPropagation: false,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'http://localhost/proyecto3BCFinal/';
                        }
                    })
                }
            });
    });

}













function showpass() {
    const btnPass = document.querySelectorAll(".inp-pass");

    btnPass.forEach(element => {

        (element.type == "password") ? element.type = "text" : element.type = "password";

    });
}







function filterTools(value) {

    let btnTools = document.querySelectorAll(".a-dashboard");


    btnTools.forEach((button) => {


        texto = button.innerText.replace(/\s+/g, '');
        texto = texto.normalize('NFD').replace(/[\u0300-\u036f]/g, "");
        liContainer = button.parentNode;

        if (value.toUpperCase() == texto.toUpperCase()) {
            button.classList.add("a-dashboard-active");
            liContainer.classList.add("li-dashboard-active");
        } else {
            button.classList.remove("a-dashboard-active");
            liContainer.classList.remove("li-dashboard-active");
        }
    });


    let tools = document.querySelectorAll(".panelAdminTool");

    tools.forEach((element) => {
        //display all cards on 'all' button click

        //Check if element contains category class
        if (element.classList.contains(value)) {
            //display element based on category
            element.classList.remove("panelAdminToolHide");
        } else {
            //hide other elements
            element.classList.add("panelAdminToolHide");
        }

    });
}

/*
window.onload = () => {
    filterTools("administracionDeUsuarios");
};*/
window.onload = () => {
    filterTools("datosPersonales");
};

