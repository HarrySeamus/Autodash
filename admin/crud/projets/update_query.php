<?php
require_once '../../security.php';
require_once '../../../model/database.php';

$id = $_POST['id'];
$nom = $_POST['nom'];
$avancement = $_POST['avancement'];
$client_id = $_POST['client_id'];
$type_projet_id = $_POST['type_projet_id'];




// Enregistrement en base de données
updateProjet($id, $nom, $avancement, $client_id, $type_projet_id);

header("Location: index.php");
