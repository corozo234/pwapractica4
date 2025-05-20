<?php
include 'includes/auth.php';
include 'includes/db.php';
?>

<h2>Bienvenido, <?= $_SESSION['usuario'] ?></h2>
<a href="logout.php">Cerrar sesión</a>
<a href="tareas.php">Ver tareas</a>