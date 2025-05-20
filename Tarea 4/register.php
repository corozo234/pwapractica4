<?php
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
    $rol_id = 2; // usuario normal

    $stmt = $conexion->prepare("INSERT INTO usuarios (usuario, contrasena, rol_id) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $usuario, $contrasena, $rol_id);
    $stmt->execute();
    header("Location: login.php");
}
?>

<form method="POST">
    <input type="text" name="usuario" placeholder="Usuario" required>
    <input type="password" name="contrasena" placeholder="Contraseña" required>
    <button type="submit">Registrarse</button>
</form>