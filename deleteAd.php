<?php
session_start();
require 'boot.php';

if (empty($_SESSION['user_id']) || empty($_POST['adId'])) {
    header('Location: index.php');
    exit;
}

$pdo = pdo();
$adId = (int)$_POST['adId'];

// Проверяем владельца
$stmt = $pdo->prepare("SELECT adUserId FROM ads WHERE adId = :adId LIMIT 1");
$stmt->execute(['adId' => $adId]);
$row = $stmt->fetch();

if (!$row || $row['adUserId'] !== $_SESSION['user_id']) {
    die("Нет прав на удаление этого объявления.");
}

// Удаляем запись
$del = $pdo->prepare("DELETE FROM ads WHERE adId = :adId");
$del->execute(['adId' => $adId]);

header('Location: index.php');
exit;