<?php

function getAllTypeProjet(){
    global $connection;

    $query = "SELECT id, nom FROM type_projet;";

    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}



function getAllProjets($utilisateur_id) {
    global $connection;

    $query = "SELECT
    projet.id,
    projet.nom,
    projet.date_crea,
    projet.avancement,
    projet.utilisateur_id,
    projet.client_id,
    projet.type_projet_id,
    type_projet.nom as type_projet_nom
    FROM projet
    INNER JOIN type_projet ON projet.type_projet_id = type_projet.id
    WHERE projet.utilisateur_id = :utilisateur_id
    ORDER BY projet.nom
    ;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(':utilisateur_id', $utilisateur_id);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getProjet($id) {
    global $connection;

    $query = "SELECT
    projet.id,
    projet.nom,
    projet.date_crea,
    projet.avancement,
    projet.utilisateur_id,
    projet.client_id,
    projet.type_projet_id,
    type_projet.nom as type_projet_nom
    FROM projet
    INNER JOIN type_projet ON projet.type_projet_id = type_projet.id
    WHERE projet.id = :id

    ;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetch();
}

function insertProjet($nom, $avancement,$utilisateur_id, $client_id, $type_projet_id) {
    global $connection;

    $query = "INSERT INTO projet (nom, date_crea, avancement, utilisateur_id, client_id, type_projet_id)
    VALUES (:nom, NOW(), :avancement, :utilisateur_id, :client_id, :type_projet_id)
    ";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':avancement', $avancement);
    $stmt->bindParam(':utilisateur_id', $utilisateur_id);
    $stmt->bindParam(':client_id', $client_id);
    $stmt->bindParam(':type_projet_id', $type_projet_id);
    $stmt->execute();
}

function updateProjet($id, $nom, $avancement, $client_id, $type_projet_id) {
    /* @var $connection PDO */
    global $connection;

    $query = "UPDATE projet
    SET nom = :nom,
        avancement = :avancement,
        client_id = :client_id,
        type_projet_id = :type_projet_id
    WHERE id = :id
    ;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':avancement', $avancement);
    $stmt->bindParam(':client_id', $client_id);
    $stmt->bindParam(':type_projet_id', $type_projet_id);
    $stmt->execute();
}
