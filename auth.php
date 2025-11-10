<?php
session_start();

//Проверка CSRF
if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die('CSRF validation failed');
}

$login = $_POST['login'] ?? '';
$password = $_POST['password'] ?? '';

//Валидация логина
if (!preg_match('/^[a-zA-Z0-9]{3,20}$/', $login)) {
    die('Invalid login format');
}

//Проверка учетных данных
if ($login === 'student' && $password === 'php2025') {
    $_SESSION['user_id'] = 1;
    
    //Создаем папку users если нет
    if (!is_dir('users')) mkdir('users');
    file_put_contents('users/1.txt', 'logged_in=1');
    
    header('Location: profile.php');
    exit;
} else {
    echo 'Invalid credentials';
}