var modal = document.getElementById("myModal");
var openModalBtn = document.getElementById("openModalBtn");
var closeBtn = document.getElementsByClassName("close")[0];

mostrar = function () {
  modal.style.display = "block";
};

closeBtn.onclick = function () {
  modal.style.display = "none";
};

window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};

function cargarContenido(abrir) {
  var contenedor;
  contenedor = document.getElementById("contenido");
  fetch(abrir)
    .then((response) => response.text())
    .then((data) => (contenedor.innerHTML = data));
}

function ver(id) {
  var url = `formMostrar.php?id=${id}`;
  var contenedor = document.getElementById("contenido");
  fetch(url)
    .then((response) => response.text())
    .then((data) => {
		  document.querySelector("#titulo-modal").innerHTML = "Editar"
		  document.querySelector("#contenido-modal").innerHTML = data
		  document.getElementById("myModal").style.display = "block";
	});
}
function initLogin(id) {
    document.getElementById("btnLogin").addEventListener("click", function(){
        const form = document.getElementById("formlogin");
        const formData = new FormData(form)
            var ajax = new XMLHttpRequest(); //crea el objeto ajax
            ajax.open("get", abrir, true);
            ajax.onreadystatechange = function () {
                if (ajax.readyState == 4 && ajax.status == 200) {
                    document.querySelector('#contenido').innerHTML = ajax.responseText;
                }
            }
            ajax.setRequestHeader("Content-Type", "text/html; charset=utf-8");
            ajax.send();





    })
}

