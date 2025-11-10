<?php
session_start();
$token = bin2hex(random_bytes(32));
$_SESSION['csrf_token'] = $token;
?>

<form method="post" action="auth.php">
    <input type="text" name="login" placeholder="Логин" pattern="[a-zA-Z0-9]{3,20}" required>
    <input type="password" name="password" placeholder="Пароль" required>
    <input type="hidden" name="csrf_token" value="<?= $token ?>">
    <button type="submit">Войти</button>
</form>