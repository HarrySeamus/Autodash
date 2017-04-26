<?php
require_once '../../../model/database.php';
$id = $_GET['id'];
$client = getClient($id);

require_once '../../layout/header.php';
?>

<h1>Modifier un Projet</h1>

<form action="update_query.php" method="POST" enctype="multipart/form-data">
    <div>
        <label>Nom</label>
        <input type="text" name="nom" value="<?php echo $client['nom']; ?>">
    </div>

    <div>
        <label>Date de création</label>
        <input type="text" name="adresse" value="<?php echo $client['adresse']; ?>">
    </div>

    <div>
        <label>Avancement</label>
        <input type="text" name="code_postal" value="<?php echo $client['code_postal']; ?>">
    </div>

    <div>
        <label>Type de projet</label>
        <input type="text" name="ville" value="<?php echo $projet['ville']; ?>">
    </div>

    <input type="hidden" name="id" value="<?php echo $projet['id']; ?>">
    <input type="submit">
</form>


<?php require_once '../../layout/footer.php'; ?>
