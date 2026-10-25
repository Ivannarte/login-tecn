<?php
session_start();
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST['usuario']);
    $password = $_POST['password'];
    $cargo = $_POST['cargo'];

    // Consulta preparada para evitar Inyecciones SQL
    $sql = "SELECT id, usuario, password, cargo FROM usuarios WHERE usuario = ? AND cargo = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ss", $usuario, $cargo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($row = $resultado->fetch_assoc()) {
        // Verificar contraseña hasheada
        if (password_verify($password, $row['password'])) {
            $_SESSION['usuario'] = $row['usuario'];
            $_SESSION['cargo'] = $row['cargo'];

            // Redireccionar según el rol seleccionado
            if ($row['cargo'] === 'administrador') {
                header("Location: administrador.php");
            } else {
                header("Location: alumno.php");
            }
            exit();
        }
    }

    // Si falla la autenticación, redirigir al index con error
    header("Location: index.html?error=datos");
    exit();
}
?>