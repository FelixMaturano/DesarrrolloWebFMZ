function cargarContenido(abrir) {
  var contenedor = document.getElementById('contenido');
  fetch(abrir)
    .then(Response => Response.text())
    .then(data => contenedor.innerHTML = data);
}

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


function ver(id) {
  var url = `formModalVer.php?id=${id}`;
  fetch(url)
    .then((response) => response.text())
    .then((data) => {
      document.querySelector("#titulo-modal").innerHTML = "Detalles del Correo";
      document.querySelector("#contenido-modal").innerHTML = data;

      // Mostrar el modal
      var modal = document.getElementById("myModal");
      modal.style.display = "block";

      // Cerrar el modal cuando se hace clic en la X
      var span = document.getElementsByClassName("close")[0];
      span.onclick = function () {
        modal.style.display = "none";
      }

      // Cerrar el modal cuando se hace clic fuera de él
      window.onclick = function (event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
    })
    .catch((error) => {
      console.error('Error:', error);
    });
}

function eliminar(id) {
  // if (confirm('¿Estás seguro de que quieres eliminar este correo?')) {
  var url = `eliminarCorreo.php?id=${id}`;

  fetch(url, {
    method: 'DELETE', // o 'POST' si prefieres
  })
    .then(response => {
      if (!response.ok) {
        throw new Error('Error al eliminar el correo');
      }
      return response.text();
    })
    .then(data => {
      // Recargar la bandeja de entrada para reflejar los cambios
      cargarContenido('bEntradaU.php');
    })
    .catch(error => {
      console.error('Error:', error);
      alert('Error al eliminar el correo');
    });
}

function eliminarBS(id) {
  // if (confirm('¿Estás seguro de que quieres eliminar este correo?')) {
  var url = `eliminarCorreo.php?id=${id}`;

  fetch(url, {
    method: 'DELETE', // o 'POST' si prefieres
  })
    .then(response => {
      if (!response.ok) {
        throw new Error('Error al eliminar el correo');
      }
      return response.text();
    })
    .then(data => {
      // Recargar la bandeja de entrada para reflejar los cambios
      cargarContenido('bSalidaU.php');
    })
    .catch(error => {
      console.error('Error:', error);
      alert('Error al eliminar el correo');
    });
}

