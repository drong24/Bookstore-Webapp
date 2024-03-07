<!--
    header for bookstore site
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lore Keeper</title>
    <link href="styles.css" type="text/css" rel="stylesheet"/>
    <link href="./images/icon.jpeg" type="image/gif" rel="shortcut icon"/>
</head>
<body>
    <div id="container">
    <?php 
    session_start();
    ini_set('display_errors', 1);
        if (!isset($_COOKIE["username"])) {
    ?>
            <div id="header">
            <a href="index.php" >
                <img src="./images/icon.jpeg" alt="banner logo"/>
                <h1>The Lore Keeper</h1>
            </a>
            <div id="nav_bar">
                <a href="signin.php">
                    <p>Sign in</p>
                    <img src="./images/user.svg" alt="user icon">
                </a>
                <a href="cart.php">
                    <p>Cart</p>
                    <img src="./images/shopping-cart.svg" alt="cart icon">
                </a>
            </div>
        </div>

    <?php
        }
        else {
    ?>
    <div id="header">
        <a href="index.php" >
            <img src="./images/icon.jpeg" alt="banner logo"/>
            <h1>The Lore Keeper</h1>
        </a>
        <div id="nav_bar">
            <a href="account-info.php">
                <p><?= $_COOKIE["username"] ?></p>
                <img src="./images/user.svg" alt="user icon">
            </a>
            <a href="signout.php">
                <p>Sign out</p>
                <img src="./images/log-out.svg" alt="log out icon">
            </a>
            <a href="favorites.php">
                <p>Favorites</p>
                <img src="./images/star.svg" alt="favorites icon">
            </a>
            <a href="cart.php">
                <p>Cart</p>
                <img src="./images/shopping-cart.svg" alt="cart icon">
            </a>
        </div>
    </div>
    <?php
        }
    ?>
    <form action="catalogue.php" method="post" id="browse_bar">
        <button name="genre" value="Fantasy" class="browse_button">Fantasy</button>
        <button name="genre" value="Romance" class="browse_button">Romance</button>
        <button name="genre" value="Mystery" class="browse_button">Mystery</button>
        <button name="genre" value="Horror" class="browse_button">Horror</button>
        <button name="genre" value="Science Fiction" class="browse_button">Science Fiction</button>
        <button name="genre" value="Nonfiction" class="browse_button">Nonfiction</button>
    </form>
    <hr>