<?php
session_start();
include_once('Auth.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit;
}

echo "Bem-vindo, " . $_SESSION['usuario_nome'] . "!";
?>

<a href="logout.php">Sair</a>
