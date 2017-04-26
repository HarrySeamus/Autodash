<?php
require_once 'model/database.php';

$id = $_POST['ville_id'];
$liste_annonces = getAllAnnoncesByVille($id);

$page_title = "Recherche";
require_once 'layout/header.php';
?>

<section class="liste-annonces">

    <?php foreach ($liste_annonces as $annonce) : ?>
        <article>
            <header>
                <img src="images/<?php echo $annonce['image'] ?>" class="annonce-img">
                <h2>
                    <a href="annonce.php?id=<?php echo $annonce['id'] ?>">
                        <?php echo $annonce['titre'] ?>
                    </a>
                </h2>
                <span class="annonce-prix"><?php echo $annonce['prix'] ?>€</span>
                <span class="annonce-ville"><?php echo $annonce['ville_nom'] ?></span>
                <ul class="liste-icons">
                    <li><i class="fa fa-home"></i> Chambre <?php echo ($annonce['privee'] == 1) ? "privée" : "partagée"; ?></li>
                    <li><i class="fa fa-users"></i> <?php echo $annonce['nb_personnes'] ?> voyageurs</li>
                    <li><i class="fa fa-bed"></i> <?php echo $annonce['nb_lits'] ?> lit</li>
                </ul>
            </header>
            <p>
                <?php echo $annonce['contenu'] ?>
            </p>
            <?php $liste_equipements = getAllEquipementsByAnnonce($annonce['id']); ?>
            <?php if (count($liste_equipements) > 0) : ?>
                <ul class="liste-icons">
                    <?php foreach ($liste_equipements as $equipement) : ?>
                        <li><i class="fa <?php echo $equipement['icone'] ?>"></i> <?php echo $equipement['nom'] ?></li>
                        <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Aucun équipements pour cette annonce</p>
            <?php endif; ?>
            <footer>
                <span>Annonce publiée par <?php echo $annonce['utilisateur_login'] ?></span>
                <img src="images/<?php echo $annonce['utilisateur_image'] ?>" title="<?php echo $annonce['utilisateur_login'] ?>">
            </footer>
        </article>
    <?php endforeach; ?>

</section>

<?php require_once 'layout/footer.php'; ?>