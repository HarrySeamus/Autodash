<?php
require_once __DIR__ . '/model/database.php';

// Démarre la session de l'utilisateur en cours
session_start();

if (isset($_SESSION['id'])) {
    $user = getUser($_SESSION['id']);
}

if (isset($user["id"])) {
  header("Location: admin/");
} else {
  header("Location: login.php");
}
