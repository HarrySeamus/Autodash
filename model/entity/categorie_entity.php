<?php

function getAllCategories() {
    global $connection;
    
    $query = "SELECT
                categorie.id,
                categorie.libelle
            FROM categorie
            ;";

    $stmt = $connection->prepare($query);
    $stmt->execute();
    
    return $stmt->fetchAll();
}

function getCategorie($id) {
    global $connection;
    
    $query = "SELECT
                categorie.id,
                categorie.libelle
            FROM categorie
            WHERE categorie.id = :id
            ;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    
    return $stmt->fetch();
}

function insertCategorie($lib) {
    /* @var $connection PDO */
    global $connection;
    
    $query = "INSERT INTO categorie (libelle)
                VALUES (:lib_cat)
            ;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(':lib_cat', $lib);
    $stmt->execute();
}

function updateCategorie($id, $libelle) {
    /* @var $connection PDO */
    global $connection;
    
    $query = "UPDATE categorie
                SET libelle = :libelle
                WHERE id = :id
            ;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':libelle', $libelle);
    $stmt->execute();
}

function deleteCategorie($id) {
    /* @var $connection PDO */
    global $connection;
    
    $query = "DELETE FROM categorie WHERE id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}