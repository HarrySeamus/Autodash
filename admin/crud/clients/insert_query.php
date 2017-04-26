<?php
require_once '../../security.php';
require_once '../../../model/database.php';


$nom = $_POST['nom'];
$adresse = $_POST['adresse'];
$code_postal = $_POST['code_postal'];
$ville = $_POST['ville'];
$pays = $_POST['pays'];
$telephone = $_POST['telephone'];
$mail = $_POST['mail'];
$utilisateur_id = $user['id'];

insertClient($nom, $adresse, $code_postal, $ville, $pays, $telephone, $mail, $utilisateur_id);

header("Location: index.php");
