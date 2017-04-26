<?php

function getAllAnnonces() {
    global $connection;

    $query = "
        SELECT
            annonce.id,
            annonce.titre,
            annonce.contenu,
            annonce.prix,
            annonce.image,
            annonce.privee,
            annonce.nb_personnes,
            annonce.nb_lits,
            annonce.utilisateur_id,
            utilisateur.email AS utilisateur_email,
            utilisateur.mot_de_passe AS utilisateur_mot_de_passe,
            utilisateur.login AS utilisateur_login,
            utilisateur.image AS utilisateur_image,
            annonce.ville_id,
            ville.nom AS ville_nom
        FROM annonce
        INNER JOIN ville ON ville.id = annonce.ville_id
        INNER JOIN utilisateur ON utilisateur.id = annonce.utilisateur_id;
    ";
    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getAllAnnoncesByVille($id) {
    global $connection;

    $query = "
        SELECT
            annonce.id,
            annonce.titre,
            annonce.contenu,
            annonce.prix,
            annonce.image,
            annonce.privee,
            annonce.nb_personnes,
            annonce.nb_lits,
            annonce.utilisateur_id,
            utilisateur.email AS utilisateur_email,
            utilisateur.mot_de_passe AS utilisateur_mot_de_passe,
            utilisateur.login AS utilisateur_login,
            utilisateur.image AS utilisateur_image,
            annonce.ville_id,
            ville.nom AS ville_nom
        FROM annonce
        INNER JOIN ville ON ville.id = annonce.ville_id
        INNER JOIN utilisateur ON utilisateur.id = annonce.utilisateur_id
        WHERE ville.id = :id;
    ";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getAnnonce($id) {
    global $connection;

    $query = "
        SELECT
            annonce.id,
            annonce.titre,
            annonce.contenu,
            annonce.prix,
            annonce.image,
            annonce.privee,
            annonce.nb_personnes,
            annonce.nb_lits,
            annonce.utilisateur_id,
            utilisateur.email AS utilisateur_email,
            utilisateur.mot_de_passe AS utilisateur_mot_de_passe,
            utilisateur.login AS utilisateur_login,
            utilisateur.image AS utilisateur_image,
            annonce.ville_id,
            ville.nom AS ville_nom
        FROM annonce
        INNER JOIN ville ON ville.id = annonce.ville_id
        INNER JOIN utilisateur ON utilisateur.id = annonce.utilisateur_id
        WHERE annonce.id = :id;
    ";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetch();
}

function insertAnnonce($titre, $contenu, $prix, $image, $prive, $nb_personnes, $nb_lits, $ville_id, $utilisateur_id, $equipements_ids) {
    global $connection;
    
    $query = "INSERT INTO annonce (titre, contenu, prix, image, privee, nb_personnes, nb_lits, utilisateur_id, ville_id)
                VALUES (:titre, :contenu, :prix, :image, :prive, :nb_personnes, :nb_lits, :utilisateur_id, :ville_id)
        ";
    
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':titre', $titre);
    $stmt->bindParam(':contenu', $contenu);
    $stmt->bindParam(':prix', $prix);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':prive', $prive);
    $stmt->bindParam(':nb_personnes', $nb_personnes);
    $stmt->bindParam(':nb_lits', $nb_lits);
    $stmt->bindParam(':utilisateur_id', $utilisateur_id);
    $stmt->bindParam(':ville_id', $ville_id);
    $stmt->execute();
    
    $annonce_id = $connection->lastInsertId();
    
    foreach ($equipements_ids as $equipement_id) {
        insertAnnonceEquipement($annonce_id, $equipement_id);
    }
}

function insertAnnonceEquipement($annonce_id, $equipement_id) {
    global $connection;
    
    $query = "INSERT INTO annonce_has_equipement (annonce_id, equipement_id)
                VALUES (:annonce_id, :equipement_id)
        ";
    
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':annonce_id', $annonce_id);
    $stmt->bindParam(':equipement_id', $equipement_id);
    $stmt->execute();
}