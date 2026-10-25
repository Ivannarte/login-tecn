<?php
session_start();
// Validar que exista sesión y que sea estrictamente de tipo 'alumno'
if (!isset($_SESSION['usuario']) || $_SESSION['cargo'] !== 'alumno') {
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel del Alumno</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body style="justify-content: center; align-items: center;">
    <div class="dashboard-container">
        <h1>Bienvenido, Alumno</h1>
        <p>Has iniciado sesión correctamente como: <strong><?php echo htmlspecialchars($_SESSION['usuario']); ?></strong></p>
        <p>Este es tu portal estudiantil personalizado.</p>
        <a href="logout.php" class="btn btn-primary" style="display: inline-block;">Cerrar Sesión</a>
    </div>
</body>
</html>