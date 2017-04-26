<?php
require_once '../../../model/database.php';
require_once '../../layout/header.php';

$liste_clients = getAllClients($user['id']);
?>

<h1>Ajouter un nouveau Projet</h1>

<form action="insert_query.php" method="POST" enctype="multipart/form-data">
    <div>
        <label>Nom</label>
        <input type="text" name="nom">
    </div>
    <div>
        <label>Date de création</label>
        <input type="date" name="date_crea">
    </div>
    <div>
        <label>Avancement</label>
        <input type="text" name="avancement">
    </div>
    <div>
        <label>Client</label>
        <select name="client_id">
            <?php foreach ($liste_clients as $client) : ?>
                <option value="<?php echo $client['id']; ?>">
                    <?php echo $client['nom']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label>Type de projet</label>
        <select name="type_projet_id">
            <?php foreach ($type_projet_id as $type_projet) : ?>
                <option value="<?php echo $type_projet_id['type_projet_nom']; ?>>
                    <?php echo $type_projet_id['nom']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <input type="submit">
</form>


<?php require_once '../../layout/footer.php'; ?>
