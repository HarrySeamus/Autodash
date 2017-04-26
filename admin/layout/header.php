<?php
require_once __DIR__ . '/../../config/parameters.php';
require_once __DIR__ . '/../security.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Administration</title>
        <link rel="stylesheet" type="text/css" href="<?php echo $siteurl; ?>admin/jquery-ui/jquery-ui.css"  media="screen" />
        <link rel="stylesheet" href="<?php echo $siteurl; ?>css/style.css"/>
    </head>
    <body>

        <div id="dialog-confirm" title="Confirmation de la suppression" style="display:none;">
          <p>
            <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
            Etes-vous sûr de vouloir supprimer cet élément ?
            </p>

        </div>
        <nav>
            <ul>
                <li><a href="<?php echo $siteurl; ?>admin/crud/clients/">Clients</a></li>
                <li><a href="<?php echo $siteurl; ?>admin/crud/projets/">Projets</a></li>
                <li><a href="<?php echo $siteurl; ?>admin/">Dashboard</a></li>
                <li><a href="<?php echo $siteurl; ?>">Front</a></li>
                <li><a href="<?php echo $siteurl; ?>admin/logout.php">Déconnexion</a></li>
            </ul>
        </nav>
