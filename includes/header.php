<?php include ("includes/config.php"); ?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title;?><?=$divider;?><?=$sitename;?></title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <header>
        <a href="index.php"><img src="images/php-elephant.png" alt="Elefant" class="elephant-logo"></a>
        <nav>
            <ul>
                <li><a href="index.php">Hem</a></li>
                <li><a href="bucketlist.php">Bucketlist</a></li>
                <li><a href="addToBucketlist.php">Lägg till nytt</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="container">