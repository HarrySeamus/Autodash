<?php

function utilisateurLikeRecette($utilisateur_id, $recette_id) {
    $jaime = getJaime($utilisateur_id, $recette_id);
    
    if (isset($jaime['utilisateur_id'])) {
        deleteJaime($utilisateur_id, $recette_id);
    } else {
        insertJaime($utilisateur_id, $recette_id);
    }
    
    $recette = getRecette($recette_id);
    
    return $recette['nb_likes'];
}

function getJaime($utilisateur_id, $recette_id) {
    global $connection;
    
    $query = "SELECT
                jaime.utilisateur_id,
                jaime.recette_id
            FROM jaime
            WHERE jaime.utilisateur_id = :utilisateur_id
            AND jaime.recette_id = :recette_id
            ;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(':utilisateur_id', $utilisateur_id);
    $stmt->bindParam(':recette_id', $recette_id);
    $stmt->execute();
    
    return $stmt->fetch();
}

function insertJaime($utilisateur_id, $recette_id) {
    /* @var $connection PDO */
    global $connection;
    
    $query = "INSERT INTO jaime (utilisateur_id, recette_id)
                VALUES (:utilisateur_id, :recette_id)
            ;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(':utilisateur_id', $utilisateur_id);
    $stmt->bindParam(':recette_id', $recette_id);
    $stmt->execute();
}

function deleteJaime($utilisateur_id, $recette_id) {
    /* @var $connection PDO */
    global $connection;
    
    $query = "DELETE FROM jaime
                WHERE utilisateur_id = :utilisateur_id
                AND recette_id = :recette_id
            ;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(':utilisateur_id', $utilisateur_id);
    $stmt->bindParam(':recette_id', $recette_id);
    $stmt->execute();
}