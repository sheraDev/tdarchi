<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php?action=login');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Panel Utilisateur</title>
</head>
<body>
    <h1>Bienvenue, <?= $_SESSION['user']['username'] ?> !</h1>
    <a href="index.php?action=logout">Déconnexion</a>
</body>
</html>
