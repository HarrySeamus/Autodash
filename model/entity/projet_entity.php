<?php

function getAllType_projet($type_projet_id){
    global $connection;

    $query = "SELECT *
    FROM type_projet
    WHERE type_projet.type_projet_id = :type_projet_id
    ;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(':type_projet_id', $type_projet_id);
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

    return $stmt->fetchAll();
}

function insertProjet($nom, $date_crea, $avancement,$utilisateur_id, $client_id, $type_projet_id) {
    global $connection;

    $query = "INSERT INTO projet (nom, date_crea, avancement, utilisateur_id, client_id, type_projet_id)
    VALUES (:nom, :date_crea, :avancement, :utilisateur_id, :client_id, :type_projet_id)
    ";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':date_crea', $date_crea);
    $stmt->bindParam(':avancement', $avancement);
    $stmt->bindParam(':utilisateur_id', $utilisateur_id);
    $stmt->bindParam(':client_id', $client_id);
    $stmt->bindParam(':type_projet_id', $type_projet_id);
    $stmt->execute();
}
