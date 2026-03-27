<?php
require_once __DIR__.'/boot.php';
$imagePath = NULL;
if (!empty($_FILES['image_path']['name'])) {
    $uploadDir = __DIR__ . '/img/';
    $fileName = time() . '_' . basename($_FILES['image_path']['name']);
    $targetFile = $uploadDir . $fileName;

    if (move_uploaded_file($_FILES['image_path']['tmp_name'], $targetFile)) {
        $imagePath = 'img/' . $fileName;
    } else {
        die("Ошибка при загрузке файла.");
    }
}

$stmt = pdo()->prepare("
    INSERT INTO ads (adUserId, adTitle, adText, adDate, image_path, wayToCommunicate, adAdress)
    VALUES (:adUserId, :adTitle, :adText, :adDate, :image_path, :wayToCommunicate, :adAdress)
");

$stmt->execute([
    'adUserId' => $_SESSION['user_id'],
    'adTitle' => $_POST['adTitle'],
    'adText' => $_POST['adText'],
    'adDate' => date('Y-m-d H:i:s'),
    'image_path' => $imagePath,
    'wayToCommunicate' => $_POST['wayToCommunicate'],
    'adAdress' => $_POST['adAdress']
]);

header('Location: index.php');
