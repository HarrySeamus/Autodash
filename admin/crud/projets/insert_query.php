<?php
require_once '../../security.php';
require_once '../../../model/database.php';


$nom = $_POST['nom'];
$date_crea = $_POST['date_crea'];
$avancement = $_POST['avancement'];
$utilisateur_id = $user['id'];
$client_id = $_POST['client_id'];
$type_projet_id = $_POST['type_projet_id'];


insertProjet($nom, $date_crea, $avancement, $utilisateur_id, $client_id, $type_projet_id);

header("Location: index.php");
