<?php
require_once '../../../model/database.php';
require_once '../../layout/header.php';

$id = $_GET['id'];
$projet = getProjet($id);
$liste_clients = getAllClients($user['id']);
$liste_types_projet = getAllTypeProjet();

?>

<h1>Modifier un Projet</h1>

<form action="update_query.php" method="POST" enctype="multipart/form-data">
    <div>
        <label>Nom</label>
        <input type="text" name="nom" value="<?php echo $projet['nom']; ?>">
    </div>

    <div>
        <label>Avancement</label>
        <input type="text" name="avancement" value="<?php echo $projet['avancement']; ?>">
    </div>
    <div>
        <label>Client</label>
        <select name="client_id">
            <?php foreach ($liste_clients as $client) : ?>
                <option value="<?php echo $client['id']; ?>" <?php echo ($client['id'] == $projet['client_id']) ? "selected" : ""; ?>>
                    <?php echo $client['nom']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label>Type de projet</label>
        <select name="type_projet_id">
            <?php foreach ($liste_types_projet as $type_projet) : ?>
                <option value="<?php echo $type_projet['id']; ?>" <?php echo ($type_projet['id'] == $projet['type_projet_id']) ? "selected" : ""; ?>>
                    <?php echo $type_projet['nom']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
  <input type="hidden" name="id" value="<?php echo $projet['id']; ?>">
    <input type="submit">
</form>



<?php require_once '../../layout/footer.php'; ?>
