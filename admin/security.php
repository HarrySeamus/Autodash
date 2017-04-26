<?php
require_once __DIR__ . '/../model/database.php';

// Démarre la session de l'utilisateur en cours
session_start();

// Je vérifie si l'utilisateur est connecté
if (isset($_SESSION['id'])) {
    // Je récupère les infos de l'utilisateur en cours
    $user = getUser($_SESSION['id']);
} else if (isset($_POST['mail']) && isset($_POST['mdp'])) {
    // Utilisateur essaye de s'authentifier
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];
    // Est-ce que l'utilisateur existe
    $user = getUserByEmailPassword($mail, $mdp);
    if (isset($user['id'])) {
        // Enregistre son identifiant dans la session
        $_SESSION['id'] = $user['id'];
    }
}

// Si l'utilisateur n'est pas connecté, redirection vers page de login
if (!isset($user['id'])) {
    header("Location: ../login.php");
}
