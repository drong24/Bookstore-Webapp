<!--
    cart page for bookstore site
-->

<?php 
include('top.php');
$username = (isset($_COOKIE['username'])) ? $_COOKIE['username'] : null;
$books = scandir("./books");
array_splice($books, 0, 3); 
$cartItems = (isset($_COOKIE['cart'])) ? unserialize($_COOKIE['cart']) : null;
$totalPrice = 0;

if (isset($_SESSION['removedCart'])) {                                          # message for removed item
    unset($_SESSION['removedCart']);    
    ?>
    <p class="message">Item removed</p>
    <?php
}
if (isset($_SESSION['error'])) {                                                # message if user tries to check out without items in cart
    unset($_SESSION['error']);
    ?>
    <p class="error_message">Please add at least one item to cart before checking out</p>
    <?php
}
?>
<div class="main_content" id="align_left">
    <h1 id="cart_header">Shopping Cart</h1>
    <hr>
    <div id="cart">
        <div class="user_books" id="float_left"> 
            <?php
            if ($cartItems != null) {
                foreach ($cartItems as $item) {
                    $item = trim($item);
                    $item = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $item);
                    $info = file("./books/$item/info.txt");
                    $totalPrice += $info[5];
                ?>
                    <a href="book.php?title=<?= $item ?>" class="list_book" >
                        <img src="./books/<?= $item ?>/info.jpeg" alt="book image"/>
                        <div>
                        <p class="title"><?= $info[0] ?> </br></p>
                        <p class="author">by: <?= $info[1] ?></p>
                        <p><strong>$<?= $info[5] ?></strong></p>
                        </div>
                        <form action="book-buttons.php" method="post" id="fav_page_buttons">
                            <button name="removeCart" value="<?= $info[0] ?>" class="fav_button">Remove</button>
                        </form>
                    </a>
                <?php
                }
            }
            else {
                ?>
                <h4>No Items in Cart</h4>
                <?php
            }
            ?>
        </div>
        <div id="float_right">
            <p><strong>Subtotal: </strong>$<?= $totalPrice ?></p>
            <form action="purchase_products.php" method="post">
                <button class="cart_button">Proceed to Checkout</button>
            </form>
        </div>
    </div>
</div>
<?php include('bottom.php');?>