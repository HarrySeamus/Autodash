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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/fontawesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>

        <div id="dialog-confirm" title="Confirmation de la suppression" style="display:none;">
          <p>
            <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
            Etes-vous sûr de vouloir supprimer cet élément ?
            </p>

        </div>

      <div class="vertical-navigation">
        <div class="nav-logo nav-logo-one">
          <a href="<?php echo $siteurl; ?>admin/crud/clients/"><i class="fa fa-address-card-o" aria-hidden="true"></i></a>
        </div>

        <div class="nav-logo nav-logo-one">
          <a href="<?php echo $siteurl; ?>admin/crud/projets/"><i class="fa fa-file-text" aria-hidden="true"></i></a>
        </div>

        <div class="nav-logo nav-logo-one">
          <a href="<?php echo $siteurl; ?>admin/"><i class="fa fa-bullseye" aria-hidden="true"></i></a>
        </div>

        <div class="nav-logo nav-logo-one">
          <a href="<?php echo $siteurl; ?>"><i class="fa fa-bullseye" aria-hidden="true"></i></a>
        </div>

        <div class="nav-logo nav-logo-one">
          <a href="<?php echo $siteurl; ?>admin/logout.php"><i class="fa fa-bullseye" aria-hidden="true"></i></a>
        </div>
      </div>
