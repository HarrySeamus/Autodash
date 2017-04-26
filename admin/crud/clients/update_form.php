<?php
require_once '../../../model/database.php';
$id = $_GET['id'];
$client = getClient($id);

require_once '../../layout/header.php';
?>

<h1>Modifier un client</h1>

<form action="update_query.php" method="POST" enctype="multipart/form-data">
    <div>
        <label>Nom</label>
        <input type="text" name="nom" value="<?php echo $client['nom']; ?>">
    </div>

    <div>
        <label>Adresse</label>
        <input type="text" name="adresse" value="<?php echo $client['adresse']; ?>">
    </div>

    <div>
        <label>Code Postal</label>
        <input type="text" name="code_postal" value="<?php echo $client['code_postal']; ?>">
    </div>

    <div>
        <label>Ville</label>
        <input type="text" name="ville" value="<?php echo $client['ville']; ?>">
    </div>

    <div>
        <label>Pays</label>
        <input type="text" name="pays" value="<?php echo $client['pays']; ?>">
    </div>

    <div>
        <label>Téléphone</label>
        <input type="text" name="telephone" value="<?php echo $client['telephone']; ?>">
    </div>

    <div>
        <label>Mail</label>
        <input type="text" name="mail" value="<?php echo $client['mail']; ?>">
    </div>

    <input type="hidden" name="id" value="<?php echo $client['id']; ?>">
    <input type="submit">
</form>


<?php require_once '../../layout/footer.php'; ?>
