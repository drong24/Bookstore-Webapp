<!--
    book info page for bookstore site
-->

<?php include("top.php"); 

$title = $_GET["title"];
$title = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $title);
$info = file("./books/$title/info.txt");
$overview = file_get_contents("./books/$title/overview.txt");

if (isset($_SESSION["repeatError"])) {                                                  # error message if user tries to add book to favorites when it's already in favorites
    unset($_SESSION['repeatError']);
    ?>
    <div class="error_message">Item already in favorites</div> 
    <?php
}
if (isset($_SESSION['error'])) {                                                        # error message if user tries to add book to favorites when not logged in 
    unset($_SESSION['error']);
    ?>
    <div class="error_message">Please sign in first</div> 
    <?php
}
if (isset($_SESSION['addedFav'])) {                                                     # message when book is added to favorites
    unset($_SESSION['addedFav']);
    ?>
<div class="message">Added to favorites</div>
<?php
}
if (isset( $_SESSION['addedCart'])) {                                                   # message when book is added to cart
    unset( $_SESSION['addedCart']);
    ?>
    <div class="message">Added to cart</div>
    <?php
}
?>
<div id="book_main_content">
    <a href="catalogue.php"><- Back to Catalogue</a>
    <div id="top_content">
        <img src="./books/<?= $title ?>/info.jpeg" />
        <div>
            <h1><?= $info[0] ?></h1>
            <h3><?= $info[3] ?> out of 5</h3>
            <p>By: <?= $info[1] ?></p>
            <p>ISBN: <?= $info[4] ?></p>   
            <form action="book-buttons.php" method="post">
                <button name = "addCart" value="<?= $info[0] ?>" class="cart_button">Add to Cart</button> </br>
                <button name = "fav" value="<?= $info[0] ?>" class="fav_button">Add to Favorites</button>    
            </form>
        </div>
    </div>
    <div id="bottom_content">
        <h2>Overview</h2>
        <pre><?= $overview ?></pre>
    </div>
</div>
<?php include("bottom.php"); ?>