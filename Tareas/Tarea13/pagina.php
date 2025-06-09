<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <ul class="menu">
            <li><a href="">logo</a></li>
            <li><a href="javascript:listar()">Agenda</a></li>
            <li><a href="javascript:cargarContenido('readprofesiones.php')">Profesion</a></li>
            <li><a href="javascript:cargarContenido('cerrar.php')">salir</a></li>
        </ul>
        <div id="contenido">


        </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="titulo-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titulo-modal">Título del Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body" id="contenido-modal">
                    <!-- Contenido dinámico aquí -->


                    <div id="myModal" class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <h2 id="titulo-modal">Título del Modal</h2>
                            <div id="contenido-modal">

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal para eliminar -->
    <div id="modalEliminar" class="modal">
        <div class="modal-content">
            <span class="close" onclick="cerrarModalEliminar()">&times;</span>
            <h2>Confirmar Eliminación</h2>
            <p>¿Estás seguro de que deseas eliminar este registro?</p>
            <input type="hidden" id="idEliminar">
            <button onclick="confirmarEliminar()">Sí, eliminar</button>
            <button onclick="cerrarModalEliminar()">Cancelar</button>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>