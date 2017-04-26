<?php
require_once '../../../model/database.php';
require_once '../../layout/header.php';
$liste_projets = getAllProjets($user['id']);
?>

<h1>Liste des Projets</h1>

<a href="insert_form.php">Ajouter</a>

<table>
    <thead>
        <tr>
            <th data-th="Movie Title">Nom</th>
            <th>Date de création</th>
            <th>Avancement</th>
            <th>Type de projet</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($liste_projets as $projet) : ?>
        <tr>
            <td><?php echo $projet['nom']; ?></td>
            <td><?php echo $projet['date_crea']; ?></td>
            <td><?php echo $projet['avancement']; ?>%</td>
            <td><?php echo $projet['type_projet_nom']; ?></td>




            <td>
                 <td>
                     <a href="#">Voir le projet</a>

                 </td>

                <a href="update_form.php?id=<?php echo $projet['id']; ?>">Modifier</a>
                <form action="delete_query.php" method="POST" class="form-delete">
                    <input type="hidden" name="id" value="<?php echo $projet['id']; ?>">
                    <input type="submit" value="Supprimer">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once '../../layout/footer.php'; ?>
