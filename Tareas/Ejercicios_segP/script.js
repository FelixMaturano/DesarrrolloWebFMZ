function cargarContenido(abrir) {

        if (abrir === 'datos.php') {
        cargarLibros(); // Usa la función fetch
        return;
    }

    var ajax = new XMLHttpRequest(); //crea el objeto ajax
    ajax.open("get", abrir, true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.querySelector('#contenido').innerHTML = ajax.responseText;
            
            // Ejecuta esta función solo si se carga tresenraya.html
            if (abrir === 'tresenraya.html') {
                inicializarJuego();
            }
            // Agrega esto en cargarContenido() después de cargar tabla.html
            if (abrir === 'tabla.html') {
                document.querySelector('#contenido').addEventListener('click', function(e) {
                    if (e.target.id === 'generarTabla') {  // Delegación de eventos
                        calcular();
                    }
                });
            }
            if (abrir === 'formlogin.html') initLogin(); // ¡Nueva función!
        }
    }
    ajax.setRequestHeader("Content-Type", "text/html; charset=utf-8");
    ajax.send();
    
}

// Función para inicializar el juego
function inicializarJuego() {
    let turnoActual = "X";
    const mensaje = document.querySelector('#contenido #mensaje '); // Selecciona el mensaje dentro del contenido cargado
    const turnoDisplay = document.querySelector('#contenido #turno');
    
    document.querySelectorAll('#contenido input').forEach(input => {
        input.addEventListener('input', function() {
            manejarTurno(this);
        });
        
        input.addEventListener('paste', function(e) {
            e.preventDefault();
        });
    });
    
    function manejarTurno(input) {
        const valor = input.value.toUpperCase();
        mensaje.textContent = '';
        
        if (valor !== 'X' && valor !== 'O') {
            input.value = '';
            mensaje.textContent = 'Solo se permiten X u O';
            return;
        }
        
        if (valor !== turnoActual) {
            input.value = '';
            mensaje.textContent = `No es tu turno, debe jugar ${turnoActual}`;
            return;
        }
        
        if (input.dataset.ocupado === 'true') {
            input.value = input.dataset.valor;
            mensaje.textContent = 'Esta casilla ya está ocupada';
            return;
        }
        
        input.dataset.ocupado = 'true';
        input.dataset.valor = valor;
        input.readOnly = true;
        
        turnoActual = turnoActual === 'X' ? 'O' : 'X';
        turnoDisplay.textContent = `Turno ${turnoActual}`;
    }
}
// Modifica la función calcular()
function calcular() {
    const numero = parseInt(document.querySelector('#contenido #desde').value);
    const hasta = parseInt(document.querySelector('#contenido #hasta').value);
    var checkboxes = document.querySelectorAll('#contenido input[name="operacion"]:checked');
    var resultado = document.querySelector('#contenido');
    let salida = '';

    if (isNaN(numero) || isNaN(hasta) || checkboxes.length === 0) {
        alert("Completa todos los campos y selecciona al menos una operación");
        return;
    }

    checkboxes.forEach(checkbox => {
        const operacion = checkbox.value;
        let signo = '';
        switch(operacion) {
            case 'sumar': signo = '+'; break;
            case 'restar': signo = '-'; break;
            case 'multiplicar': signo = '×'; break;
            case 'dividir': signo = '÷'; break;
        }

        salida += `<table class="tabla-resultados">
                    <thead>
                        <tr>
                            <th>Número 1</th>
                            <th>Operación</th>
                            <th>Número 2</th>
                            <th>Resultado</th>
                        </tr>
                    </thead>
                    <tbody>`;

        for (let i = 1; i <= hasta; i++) {
            let res;
            switch (operacion) {
                case 'sumar': res = numero + i; break;
                case 'restar': res = numero - i; break;
                case 'multiplicar': res = numero * i; break;
                case 'dividir': res = i === 0 ? '∞' : (numero / i).toFixed(2); break;
            }
            salida += `<tr>
                        <td>${numero}</td>
                        <td>${signo}</td>
                        <td>${i}</td>
                        <td>${res}</td>
                      </tr>`;
        }

        salida += `</tbody></table>`;
    });

    resultado.innerHTML += salida;  // ¡Aquí insertas la tabla en el DOM!
}

// Función para manejar el login (nueva)
function initLogin() {
    document.getElementById('btnLogin').addEventListener('click', function() {
        const form = document.getElementById('formLogin');
        const formData = new FormData(form);
        
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'autenticar.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                if (xhr.responseText.trim() === "success") {
                    cargarContenido('read.php'); // Carga el contenido dinámicamente
                } else {
                    alert(xhr.responseText);
                }
            }
        };
        xhr.send(formData);
    });
}
function cambiarNivel(nivel, id) {
    var ajax = new XMLHttpRequest();
    xhr.open('GET', `cambiar_nivel.php?nivel=${nivel}&id=${id}`, true);
    
    xhr.onload = function() {
        if (ajax.status === 200) {
            alert(ajax.responseText);
            // Recargar la tabla después de 1 segundo
            setTimeout(function() {
                cargarContenido('read.php');
            }, 1000);
        } else {
            alert('Error: ' + ajax.statusText);
        }
    };
    
    ajax.onerror = function() {
        alert('Error de conexión');
    };
    
    ajax.send();
}

function ordenarTabla(columna) {
    // Obtener el orden actual (si existe)
    let ordenActual = 'asc';
    const tabla = document.querySelector('#contenido table');
    
    if(tabla && tabla.dataset.orden === columna) {
        ordenActual = tabla.dataset.direccion === 'asc' ? 'desc' : 'asc';
    }
    
    // Hacer petición AJAX
    const ajax = new XMLHttpRequest();
    ajax.open("GET", `listar.php?orden=${columna}&asendente=${ordenActual}`, true);
    
    ajax.onreadystatechange = function() {
        if(ajax.readyState === 4 && ajax.status === 200) {
            // Actualizar solo el contenido de la tabla
            document.querySelector('#contenido').innerHTML = ajax.responseText;
            
            // Guardar estado de ordenación
            const nuevaTabla = document.querySelector('#contenido table');
            if(nuevaTabla) {
                nuevaTabla.dataset.orden = columna;
                nuevaTabla.dataset.direccion = ordenActual;
            }
        }
    };
    
    ajax.send();
}


function cargarLibros() {
  fetch(`datos.php`)
    .then((response) => response.json())
    .then((data) => {
      contenido.innerHTML = "";
      let select = document.createElement("select");
      select.id = "libros";
      data.forEach((libro) => {
        let option = document.createElement("option");
        option.value = libro.imagen;
        option.innerHTML = libro.titulo;
        select.appendChild(option);
      });
      contenido.appendChild(select);
      let img = document.createElement("img");
      img.id = "imagen";
      img.style.height = "200px";
      img.src = `images/${data[0].imagen}`;
      contenido.appendChild(img);
      select.addEventListener("change", (e) => {
        let img = document.querySelector("#imagen");
        img.src = `images/${e.target.value}`;
      });
    });
}

// function cargarLibros(){
//     fetch('datos.php')
//         .then(response=>{
//             if(!response.ok){
//                 throw new Error('Error al cargar los libros');
//             }
//             return response.json();
//         })
//         .then(data=>{
//             if(!data || data.length === 0){
//                 throw new Error('No hay libros disponibles');
//             }
//             //Limpiar el contenedor
//             const contenido = document.querySelector('#contenido');
//             contenido.innerHTML='';

//             //Crear select
//             const select = document.createElement('select');
//             select.id = 'libros-select';

//             //Llenar las opciones
//             data.forEach(libro=>{
//                 const option = document.createElement('option');
//                 option.value = libro.imagen;
//                 option.textContent=libro.titulo;
//                 select.appendChild(option);
//             });

//             //crear imagen
//             const imagen = document.createElement('img');
//             imagen.id = 'libro-imagen';
//             imagen.src =`images/${data[0].imagen}`;
//             imagen.style.height='200px';
//             imagen.alt='portada del libro';

//             // Evento para cambiar imagen
//             select.addEventListener('change',(e)=>{
//                 imagen.src=`images/${e.target.value}`;
//             });

//             //Agregar el DOM
//             contenido.appendChild(select);
//             contenido.appendChild(imagen);
            
//         })
//             .catch(error => {
//             console.error('Error:', error);
//             document.querySelector('#contenido').innerHTML = `
//                 <p class="error">${error.message}</p>
//             `;
//         });
// }