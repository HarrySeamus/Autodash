<?php

function getAllIngredientsByRecette($id) {
    global $connection;
    
    $query = "SELECT
                ingredient.id,
                ingredient.libelle,
                recette_has_ingredient.quantite,
                unite.libelle AS 'unite'
            FROM ingredient
            INNER JOIN recette_has_ingredient ON recette_has_ingredient.ingredient_id = ingredient.id
            LEFT JOIN unite ON unite.id = recette_has_ingredient.unite_id
            WHERE recette_has_ingredient.recette_id = :id;";
    
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    
    return $stmt->fetchAll();
}