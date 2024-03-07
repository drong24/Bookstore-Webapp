<!--
    favorites page for bookstore site
-->

<?php 
include('top.php');
$users = scandir("users");
$username = $_COOKIE['username'];

$books = scandir("./books");
array_splice($books, 0, 3);
$favorites = (file_exists("./users/$username/favorites.txt")) ? file("./users/$username/favorites.txt") : null;
if(isset($_SESSION['removedFav'])) {                                                                # message for removing item from favorites
    unset( $_SESSION['removedFav']);
    ?>
    <p class="message">Item removed</p>
    <?php
}   
if(isset($_SESSION['addedCart'])) {                                                                 # messgae for adding item to cart
    unset($_SESSION['addedCart']);
    ?>
    <p class="message">Item added to cart</p>
    <?php
}
?>
<div class="main_content">
    <h1>Favorites</h1>
    <div class="user_books"> 
        <?php
        if ($favorites != null) {
            foreach ($favorites as $fav) {
                $fav = trim($fav);
                $fav = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $fav);
                $info = file("./books/$fav/info.txt");
            ?>
                <a href="book.php?title=<?= $fav ?>" class="list_book" >
                    <img src="./books/<?= $fav ?>/info.jpeg" alt="book image"/>
                    <div>
                    <p class="title"><?= $info[0] ?> </br></p>
                    <p class="author">by: <?= $info[1] ?></p>
                    <p><strong>$<?= $info[5] ?></strong></p>
                    </div>
                    <form action="book-buttons.php" method="post" id="fav_page_buttons">
                        <button name ="shiftCart" value="<?= $info[0] ?>" class="cart_button">Add to Cart</button>
                        <button name="removeFav" value="<?= $info[0] ?>" class="fav_button">Remove</button>
                    </form>
                </a>
            <?php
            }
        }
        else {
            ?>
            <h4>No Favorites to Display</h4>
            <?php
        }
        ?>
    </div>
</div>
<?php include('bottom.php') ?>