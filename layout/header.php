<?php
require_once 'model/database.php';

session_start();

if (isset($_SESSION['id'])) {
    $user = getUser($_SESSION['id']);
}
?>
<html>
    <head>
        <title>Autodash</title>
        <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
