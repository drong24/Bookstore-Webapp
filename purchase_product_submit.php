<!--
    purchase confirmation for bookstore site
-->
<?php 
include('top.php'); 

$cart = unserialize($_COOKIE['cart']);

 if (isset($_COOKIE['username'])) {                                                                       # adds purchased items to history.txt if user is logged in
     $user = $_COOKIE['username'];
     foreach ($cart as $item) {
        file_put_contents("./users/$user/history.txt", $item . "\n", FILE_APPEND);
     }
 }
setcookie('cart', "", -1);
?>
<div class="main_content thank_message">
    <h1>Thank you!</h1>
    <p>Your purchase has been confirmed. Visit your account info page to check all past purchases.</p>
    <form action="index.php" method="post">
        <button class="cart_button">Return to Homepage</button>
    </form>
    <?php
        if (isset($_COOKIE['username'])) {                                                              # if logged in link to account info else link to sign in page
    ?>
        <a href="account-info.php">Check Past Purchases</a>
    <?php
        }
        else {
            ?>
        <a href="signin.php">Sign in</a>
            <?php
        }
    ?>
</div>
<?php include('bottom.php'); ?>