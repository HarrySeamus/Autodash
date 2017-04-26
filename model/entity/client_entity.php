<?php

function getAllClients($utilisateur_id) {
    global $connection;

    $query = "SELECT
    client.id,
    client.nom,
    client.adresse,
    client.code_postal,
    client.ville,
    client.pays,
    client.telephone,
    client.mail,
    client.utilisateur_id
    FROM client
    WHERE client.utilisateur_id = :utilisateur_id
    ORDER BY client.nom
    ;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(':utilisateur_id', $utilisateur_id);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getClient($id) {
    global $connection;

    $query = "SELECT
    client.id,
    client.nom,
    client.adresse,
    client.code_postal,
    client.ville,
    client.pays,
    client.telephone,
    client.mail,
    client.utilisateur_id
    FROM client
    WHERE client.id = :id

    ;";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetch();
}

function insertClient($nom, $adresse, $code_postal, $ville, $pays, $telephone, $mail, $utilisateur_id) {
    global $connection;

    $query = "INSERT INTO client (nom, adresse, code_postal, ville, pays, telephone, mail, utilisateur_id)
    VALUES (:nom, :adresse, :code_postal, :ville, :pays, :telephone, :mail, :utilisateur_id)
    ";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':adresse', $adresse);
    $stmt->bindParam(':code_postal', $code_postal);
    $stmt->bindParam(':ville', $ville);
    $stmt->bindParam(':pays', $pays);
    $stmt->bindParam(':telephone', $telephone);
    $stmt->bindParam(':mail', $mail);
    $stmt->bindParam(':utilisateur_id', $utilisateur_id);
    $stmt->execute();
}

function updateClient($id, $nom, $adresse, $code_postal, $ville, $pays, $telephone, $mail, $utilisateur_id) {
    /* @var $connection PDO */
    global $connection;

    $query = "UPDATE client
    SET nom = :nom,
    adresse = :adresse,
    code_postal = :code_postal,
    ville = :ville,
    pays = :pays,
    telephone = :telephone,
    mail = :mail,
    utilisateur_id = :utilisateur_id
    WHERE id = :id
    ;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':adresse', $adresse);
    $stmt->bindParam(':code_postal', $code_postal);
    $stmt->bindParam(':ville', $ville);
    $stmt->bindParam(':pays', $pays);
    $stmt->bindParam(':telephone', $telephone);
    $stmt->bindParam(':mail', $mail);
    $stmt->bindParam(':utilisateur_id', $utilisateur_id);
    $stmt->execute();
}

function deleteClient($id) {
    /* @var $connection PDO */
    global $connection;

    $query = "DELETE FROM client WHERE id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}
