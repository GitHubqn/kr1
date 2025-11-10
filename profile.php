<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

echo "<h1>Привет, студент!</h1>";

$file_path = 'users/1.txt';

if (file_exists($file_path)) {
    echo "Статус: " . htmlspecialchars(file_get_contents($file_path));
}