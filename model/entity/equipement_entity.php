<?php

function getAllEquipements() {
    global $connection;

    $query = "
        SELECT
            equipement.id,
            equipement.nom,
            equipement.icone
        FROM equipement;
    ";
    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getAllEquipementsByAnnonce($id) {
    global $connection;

    $query = "
        SELECT
            equipement.id,
            equipement.nom,
            equipement.icone
        FROM equipement
        INNER JOIN annonce_has_equipement
            ON annonce_has_equipement.equipement_id = equipement.id
        WHERE annonce_has_equipement.annonce_id = :id;
    ";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetchAll();
}