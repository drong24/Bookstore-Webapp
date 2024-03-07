<!--
    account info page for bookstore site
-->

<?php 
include('top.php');
require __DIR__.'/filter.php';
$users = scandir("users");

for ($i = 0; $i < sizeof($users); $i++) {                                   # gets user info
    
    if ($_COOKIE['username'] == $users[$i]) {
        
        $file = file("./users/$users[$i]/info.txt");
        $username = trim($file[0]);
        $password = $file[1];
        $email = $file[2];
        
        
    }
}

$image = (file_exists("./users/$username/info.jpeg")) ? "./users/$username/info.jpeg" : "./images/default.jpeg";

$books = scandir("./books");
array_splice($books, 0, 3);
$history = (file_exists("./users/$username/history.txt")) ? file("./users/$username/history.txt") : null;

?>
<div class="main_content">
    <h1>My Account</h1>
    <div id="user_info">
        <img src="<?= $image ?>" alt="profile image">
        <div>
            <h3>User Info</h3>
            <div>
                <p><strong>Email:</strong> <span><?= $email ?></span></p>
                <p><strong>Username:</strong> <span><?= $username ?></span></p>
                <p><strong>Password:</strong> <span class="hidden"><?= $password ?></span></p>
            </div>
        </div>
    </div>
    <h3>Order History</h3>
    <div class="history_list"> 
        <?php
        if ($history != null) {
            foreach ($history as $book) {
                $book = trim($book);
                $book = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $book);
                $info = file("./books/$book/info.txt");
            ?>
                <a href="book.php?title=<?= $book ?>" class="history_book">
                    <img src="./books/<?= $book ?>/info.jpeg" alt="book image"/>
                    <p class="title"><?= $info[0] ?> </br></p>
                    <p class="author">by: <?= $info[1] ?></p>

                </a>
            <?php
            }
        }
        else {
            ?>
            <h4>No Previous Purchases Found</h4>
            <?php
        }
        ?>
    </div>
</div>
<?php include('bottom.php') ?>