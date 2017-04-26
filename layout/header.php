<?php
require_once 'model/database.php';

session_start();

if (isset($_SESSION['id'])) {
    $user = getUser($_SESSION['id']);
}
?>
<html>
    <head>
        <title><?php echo $page_title; ?></title>
        <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        
    </head>
    <body>

        <main>

            <h1>Auto Dash</h1>

            <?php if (isset($user)) : ?>

                <?php if ($user['nom']) : ?>
                    <a href="admin/">Administration</a>
                <?php endif; ?>
                <a href="admin/logout.php">Logout</a>

            <?php else : ?>

                <a href="admin/">Login</a>

            <?php endif; ?>
