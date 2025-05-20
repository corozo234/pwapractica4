<?php
include 'includes/auth.php';
include 'includes/db.php';

$usuario_id = $_SESSION['usuario_id'];
$rol_id = $_SESSION['rol_id'];

if (isset($_POST['nueva'])) {
    $desc = $_POST['descripcion'];
    $stmt = $conexion->prepare("INSERT INTO tareas (descripcion, usuario_id) VALUES (?, ?)");
    $stmt->bind_param("si", $desc, $usuario_id);
    $stmt->execute();
}

if (isset($_GET['accion']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($_GET['accion'] == 'completar') {
        $conexion->query("UPDATE tareas SET completada = 1 WHERE id = $id AND usuario_id = $usuario_id");
    } elseif ($_GET['accion'] == 'eliminar' && $rol_id == 1) {
        $conexion->query("DELETE FROM tareas WHERE id = $id");
    }
}

$tareas = $conexion->query("SELECT * FROM tareas WHERE usuario_id = $usuario_id OR $rol_id = 1");
?>

<form method="POST">
    <input type="text" name="descripcion" placeholder="Nueva tarea" required>
    <button type="submit" name="nueva">Agregar</button>
</form>

<ul>
<?php while ($tarea = $tareas->fetch_assoc()): ?>
    <li>
        <?= $tarea['descripcion'] ?> 
        <?= $tarea['completada'] ? "(completada)" : "" ?>
        <a href="?accion=completar&id=<?= $tarea['id'] ?>">✅</a>
        <?php if ($rol_id == 1): ?>
            <a href="?accion=eliminar&id=<?= $tarea['id'] ?>">🗑️</a>
        <?php endif; ?>
    </li>
<?php endwhile; ?>
</ul>