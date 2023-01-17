

//window.addEventListener("DOMContentLoaded", (event) => {

  const btnSearchClick = document.querySelector('#btn-search');
  
  btnSearchClick.addEventListener('click', (e) => {
    var texto = document.getElementById("search").value;
    var data = new FormData();
    $resp = ``;
    data.append('texto', texto);
    fetch("http://localhost/proyecto3BCFinal/apibusqueda/busqueda", {
        method: "POST",
        body: data,
      }).then(response => response.text())
      .then(data => {
          

        $resp = data
        if ($resp != ``){
          document.querySelector('#sec-inicio').innerHTML = $resp;
        }

      });

  })
  
  