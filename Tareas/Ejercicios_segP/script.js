function cargarContenido(abrir) {

    var ajax = new XMLHttpRequest(); //crea el objeto ajax
    ajax.open("get", abrir, true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.querySelector('#contenido').innerHTML = ajax.responseText;
            
            // Ejecuta esta función solo si se carga tresenraya.html
            if (abrir === 'tresenraya.html') {
                inicializarJuego();
            }
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