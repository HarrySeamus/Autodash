<?php

require_once __DIR__ . '/../config/parameters.php';

try {
    $connection = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $connection->exec("SET names utf8");
    $connection->exec("SET lc_time_names = 'fr_FR'");
} catch (Exception $exc) {
    echo "Erreur de connexion à la base de données";
    die();
}

$files = scandir(__DIR__ . "/entity");

foreach ($files as $file) {
    $ext = pathinfo(__DIR__ . "/entity/" . $file, PATHINFO_EXTENSION);
    if (!is_dir($file) && $ext == "php") {
        require_once __DIR__ . "/entity/" . $file;
    }
}