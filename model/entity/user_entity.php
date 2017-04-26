<?php

function getUser($id) {
    /* @var $connection PDO */
    global $connection;

    $query = "SELECT
                utilisateur.id,
                utilisateur.nom,
                utilisateur.mail
            FROM utilisateur
            WHERE utilisateur.id = :id
            ";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetch();
}

function getUserByEmailPassword($mail, $mdp) {
    /* @var $connection PDO */
    global $connection;

    $query = "SELECT
                utilisateur.id,
                utilisateur.mail
            FROM utilisateur
            WHERE utilisateur.mail = :mail
            AND utilisateur.mdp = MD5(:mdp)
            ";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(':mail', $mail);
    $stmt->bindParam(':mdp', $mdp);
    $stmt->execute();

    return $stmt->fetch();
}
