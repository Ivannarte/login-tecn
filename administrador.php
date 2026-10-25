<?php
session_start();
// Validar que exista sesión y que sea estrictamente de tipo 'administrador'
if (!isset($_SESSION['usuario']) || $_SESSION['cargo'] !== 'administrador') {
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body style="justify-content: center; align-items: center;">
    <div class="dashboard-container">
        <h1>Panel de Administración</h1>
        <p>Bienvenido Administrador: <strong><?php echo htmlspecialchars($_SESSION['usuario']); ?></strong></p>
        <p>Tienes control total sobre el sistema y los registros.</p>
        <a href="logout.php" class="btn btn-primary" style="display: inline-block; background-color: #d9534f;">Cerrar Sesión</a>
    </div>
</body>
</html>