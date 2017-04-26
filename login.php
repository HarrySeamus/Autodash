<?php require_once 'layout/header.php'; ?>

<form action="admin/" method="POST">
    <div>
        <label>Email :</label>
        <input type="mail" name="mail">
    </div>
    <div>
        <label>Mot de passe :</label>
        <input type="password" name="mdp">
    </div>
    <input type="submit">
</form>

<?php require_once 'layout/footer.php'; ?>
