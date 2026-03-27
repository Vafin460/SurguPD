<?php

require_once __DIR__.'/boot.php';

$stmt = pdo()->prepare("SELECT * FROM `users` WHERE `username` = :username");
$stmt->execute(['username' => $_POST['username']]);
if (!$stmt->rowCount()) {
    flash('Пользователь с такими данными не зарегистрирован');
    header('Location: login.php');
    die;
}
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (password_verify($_POST['password'], $user['password'])) {
    if (password_needs_rehash($user['password'], PASSWORD_DEFAULT)) {
        $newHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt = pdo()->prepare('UPDATE `users` SET `password` = :password WHERE `username` = :username');
        $stmt->execute([
            'username' => $_POST['username'],
            'password' => $newHash,
        ]);
    }
    $_SESSION['user_id'] = $user['id'];
    setcookie('old_username', '', time() - 3600, '/');
    setcookie('old_password', '', time() - 3600, '/');
    header('Location: /');
    die;
}

setcookie('old_username', $_POST['username'], time() + 15, '/');
setcookie('old_password', $_POST['password'], time() + 15, '/');
flash('Неверный логин или пароль');
header('Location: login.php');
