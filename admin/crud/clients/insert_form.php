<?php
require_once '../../../model/database.php';
require_once '../../layout/header.php';
?>

<h1>Ajouter un nouveau client</h1>

<form action="insert_query.php" method="POST" enctype="multipart/form-data">
    <div>
        <label>Nom</label>
        <input type="text" name="nom">
    </div>
    <div>
        <label>adresse</label>
        <input type="text" name="adresse">
    </div>
    <div>
        <label>code_postal</label>
        <input type="text" name="code_postal">
    </div>
    <div>
        <label>ville</label>
        <input type="text" name="ville">
    </div>
    <div>
        <label>pays</label>
        <input type="text" name="pays">
    </div>
    <div>
        <label>telephone</label>
        <input type="text" name="telephone">
    </div>
    <div>
        <label>mail</label>
        <input type="text" name="mail">
    </div>
    <input type="submit">
</form>


<?php require_once '../../layout/footer.php'; ?>
