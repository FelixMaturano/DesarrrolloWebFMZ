// Variables globales
var modal = document.getElementById("myModal");
var openModalBtn = document.getElementById("openModalBtn");
var closeBtn = document.getElementsByClassName("close")[0];
var menuVisible = true;

// Función para mostrar/ocultar el menú
function toggleMenu() {
    var botones = document.querySelectorAll('.boton:not(:first-child)');
    botones.forEach(boton => {
        boton.style.display = menuVisible ? 'none' : 'block';
    });
    menuVisible = !menuVisible;
    addToHistory(menuVisible ? 'Mostrar menú' : 'Ocultar menú');
}
// Función para cargar contenido
function cargarContenido(abrir, nombreBoton) {
    var contenedor = document.getElementById("contenido");
    fetch(abrir)
        .then(response => response.text())
        .then(data => {
            contenedor.innerHTML = data;
            addToHistory(nombreBoton || abrir);
            // Inicializar componentes según el contenido cargado
            if (abrir === 'galeria.php') initGallery();
             if (abrir === 'read.php') initGallery();

            if (abrir === 'formlogin.html') initLogin();
             if (abrir === 'galeria.php') {
 // Pequeño retraso para asegurar que las imágenes estén cargad
 setTimeout(configurarModalesImagenes, 100);
 }
        })
        .catch(error => console.error('Error:', error));
}

// Función para ver detalles
function ver(id) {
    var url = `formMostrar.php?id=${id}`;
    fetch(url)
        .then(response => response.text())
        .then(data => {
            document.querySelector("#titulo-modal").innerHTML = "Editar";
            document.querySelector("#contenido-modal").innerHTML = data;
            mostrarModal();
        });
}
// Función para mostrar el modal
function mostrarModal() {
    modal.style.display = "block";
}
// Función para cerrar el modal
function cerrarModal() {
    modal.style.display = "none";
}
// Función para añadir al historial
function addToHistory(accion) {
    var historial = document.getElementById("historial");
    var entry = document.createElement('div');
    entry.textContent = new Date().toLocaleTimeString() + ' - ' + accion;
    historial.appendChild(entry);
}
// Función para inicializar la galería
function initGallery() {
    document.querySelectorAll('.libro-img').forEach(img => {
        img.addEventListener('click', function () {
            var modalImg = document.createElement('div');
            modalImg.className = 'modal-img';
            modalImg.innerHTML = `
 <div class="modal-img-content">
 <img src="${this.src}" style="width: 600px; height: 200px; obj
ect-fit: contain;">
 <button class="accept-btn" onclick="this.parentNode.parentN
ode.remove()">Aceptar</button>
 </div>
 `;
            document.body.appendChild(modalImg);
        });
    });
}
// Función para inicializar el login
function initLogin() {
    document.getElementById("btnLogin")?.addEventListener("click", function () {
        const form = document.getElementById("formlogin");
        const formData = new FormData(form);
        fetch('autenticar.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                if (data === "success") {
                    // Obtener datos del usuario desde la sesión
                    fetch('getUserData.php')
                        .then(response => response.json())
                        .then(user => {
                            // Actualizar UI
                            document.querySelector('.boton:nth-child(4)').innerHTML =
                                user.usuario;
                            document.querySelector('.barra').textContent += ` | Usuario:
 ${user.usuario} | Nivel: ${user.nivel}`;
                            cerrarModal();
                        });
                } else {
                    alert(data);
                }
            });
    });
}
// Función para crear tabla de colores (Pregunta 3)
function crearTablaColores() {
    const contenido = document.getElementById("contenido");
    contenido.innerHTML = '';
    // Crear select de secciones
    const select = document.createElement('select');
    ['barra', 'menu', 'contenido', 'historial'].forEach(seccion => {
        const option = document.createElement('option');
        option.value = seccion;
        option.textContent = seccion;
        select.appendChild(option);
    });
    // Crear tabla 3x3
    const table = document.createElement('table');
    table.style.borderCollapse = 'collapse';
    table.style.marginTop = '10px';
    const colors = [
        '#FF0000', '#00FF00', '#0000FF',
        '#FFA500', '#800080', '#FFC0CB',
        '#808080', '#00FFFF', '#00FF00'
    ];
    for (let i = 0; i < 3; i++) {
        const row = document.createElement('tr');
        for (let j = 0; j < 3; j++) {
            const cell = document.createElement('td');
            const index = i * 3 + j;
            cell.style.width = '50px';
            cell.style.height = '50px';
            cell.style.backgroundColor = colors[index];
            cell.style.border = '1px solid black';
            cell.style.cursor = 'pointer';
            cell.addEventListener('click', function () {
                const selectedSection = document.getElementById(select.value);
                if (selectedSection) {
                    selectedSection.style.backgroundColor = colors[index];
                    addToHistory(`Cambio color dea ${colors[index]} `);
                    //  addToHistory(`Cambio color de ${select.value} a ${colors[index]} `);
                }
            });
            row.appendChild(cell);
        }
        table.appendChild(row);
    }
    contenido.appendChild(select);
    contenido.appendChild(table);
    addToHistory('Mostrar tabla de colores');
}
// Event listeners
document.getElementById("menu")?.addEventListener('click', toggleMenu);
closeBtn?.addEventListener('click', cerrarModal);
window.addEventListener('click', function (event) {
    if (event.target == modal) {
        cerrarModal();
    }
});
// Inicialización al cargar la página
document.addEventListener('DOMContentLoaded', function () {
    // Cargar datos iniciales
    document.querySelectorAll('span')[0].textContent = "Felix Maturano Zarate";
    document.querySelectorAll('span')[1].textContent = "111-531";
    document.querySelectorAll('span')[2].textContent = new Date().toLocale
    DateString();
    // Obtener número de visitas
    fetch('contador.php')
        .then(response => response.text())
        .then(data => {
            document.querySelectorAll('span')[3].textContent = data;
        });
    // Asignar eventos a los botones
    document.querySelector('.boton:nth-child(1)').addEventListener('click', function () {
        document.getElementById("contenido").innerHTML = `
                    < h1 > Segundo Examen Parcial de SIS - 256</h1 >
 <p>Nombre Estudiante: <span>Felix Maturano Zarate</span></p>
 <p>CU: <span>111-531</span></p>
 <p>Fecha: <span>${new Date().toLocaleDateString()}</span></p>
 <p>Numero Visitas: <span>${document.querySelectorAll('span')
            [3].textContent}</span></p>
                `;
        addToHistory('Inicio');
    });
    document.querySelector('.boton:nth-child(3)').addEventListener('click', crearTablaColores);
});

function cargarInicio() {
    document.getElementsByTagName("contenido").innerHTML ="";
    nombre[0].innerHTML = "Felix Maturano Zarate";
    nombre[1].innerHTML = "111-531";
    nombre[2].innerHTML = "31-05-2025";
    nombre[3].innerHTML = "1";

    console.log(parrafos);

    console.log(parrafos.lenght)
}
function configurarModalesImagenes() {
 // Seleccionar todas las imágenes de libros
 const imagenesLibros = document.querySelectorAll('#contenido img[src="images/"]');
 imagenesLibros.forEach(img => {
 // Agregar cursor pointer para indicar que es clickeable
 img.style.cursor = 'pointer';
 // Agregar evento click
 img.addEventListener('click', function() {
 // Crear el modal
 const modal = document.createElement('div');
 modal.className = 'modal-imagen';
 // Contenido del modal
 modal.innerHTML = `
 <div class="contenido-modal-imagen">
 <img src="${this.src}" style="width: 600px; height: 200px; obj
ect-fit: contain;">
 <button class="boton-aceptar">Aceptar</button>
 </div>
 `;
 document.body.appendChild(modal);
 // Configurar el botón aceptar
 modal.querySelector('.boton-aceptar').addEventListener('click', function() {
 document.body.removeChild(modal);
 });
 // Cerrar al hacer click fuera de la imagen
 modal.addEventListener('click', function(e) {
 if (e.target === modal) {
 document.body.removeChild(modal);
 }
 });
 });
 });
}
