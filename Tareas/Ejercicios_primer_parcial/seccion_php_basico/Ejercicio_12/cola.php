<?php
session_start();

class Cola {
    public $tipo; // Normal o dobleentrada
    public $datos = [];

    public function __construct($tipo) {
        $this->tipo = $tipo;
        if (!isset($_SESSION['cola'])) {
            $_SESSION['cola'] = [];
        }
        $this->datos = $_SESSION['cola'];
    }

    public function insertardelante($valor) {
        if ($this->tipo == "dobleentrada") {
            array_unshift($this->datos, $valor); // al inicio
            $_SESSION['cola'] = $this->datos;
        } else {
            echo "<p>❌ Solo se puede insertar por detrás en una cola normal.</p>";
        }
    }

    public function insertardetras($valor) {
        $this->datos[] = $valor; // al final
        $_SESSION['cola'] = $this->datos;
    }

    public function eliminar() {
        if (count($this->datos) > 0) {
            array_shift($this->datos); // elimina el primero
            $_SESSION['cola'] = $this->datos;
        } else {
            echo "<p>⚠️ La cola está vacía</p>";
        }
    }

    public function mostrar() {
        if (empty($this->datos)) {
            echo "<p>Cola vacía</p>";
        } else {
            echo "<h3>📋 Elementos en la cola:</h3><ul>";
            foreach ($this->datos as $item) {
                echo "<li>$item</li>";
            }
            echo "</ul>";
        }
    }
}
?>
