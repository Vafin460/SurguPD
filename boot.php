<?php
require __DIR__ . '/vendor/autoload.php';
use Dotenv\Dotenv;

if (file_exists(__DIR__ . '/.env')) {
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();
} else {
    $msg = 'Отсутсвует файл конфигурации';
    trigger_error($msg, E_USER_ERROR);
}

// Инициализируем сессию
session_start();

// Простой способ сделать глобально доступным подключение в БД
function pdo(): PDO
{
    static $pdo;

    if (!$pdo) {
        // Подключение к БД через переменные окружения
        $dsn = 'mysql:host=' . $_ENV['dbhost'] . ';dbname=' . $_ENV['dbname'] . ';charset=utf8mb4';
        $pdo = new PDO($dsn, $_ENV['dbuser'], $_ENV['dbpassword']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    return $pdo;
}

function flash(?string $message = null)
{
    if ($message) {
        $_SESSION['flash'] = $message;
    } else {
        if (!empty($_SESSION['flash'])) { ?>
          <div class="alert alert-danger mb-3">
              <?=$_SESSION['flash']?>
          </div>
        <?php }
        unset($_SESSION['flash']);
    }
}

function check_auth(): bool
{
    return !!($_SESSION['user_id'] ?? false);
}
