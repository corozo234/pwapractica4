<?php
$conexion = new mysqli("localhost", "root", "", "lista_tareas");
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>