<!--
    catalogue page for bookstore site
-->

<?php include("top.php"); 
    require __DIR__.'/filter.php';

    $books = scandir("./books");
    array_splice($books, 0, 3);             # removes . .. and .DS_Store from array
    $countAll = count($books);

    if (isset($_POST['title'])) {                                      # calls the filter function in filter.php for each filter form value that has been inputed
        $books = filter($books, "title", $_POST['title']);
    }
    if (isset($_POST['author'])) {
        $books = filter($books, "author", $_POST['author']);
    }
    if (isset($_POST['genre'])) {
        $books = filter($books, "genre", $_POST['genre']);
    }
    if (isset($_POST['min'])) {
        $books = filter($books, "min", $_POST['min']);
    }
    if (isset($_POST['max'])) {
        $books = filter($books, "max", $_POST['max']);
    }
?>
<div id = "catalogue_main_content">
<div id = "filters">
    <form action="catalogue.php" method="post">
        <fieldset>
            <legend><strong>Filter & Search Bar</strong></legend>
            <label>Title</label>
            <input name="title" size="25"> </br> </br>
            <label>Author</label>
            <input name="author" size="25"> </br> </br>
            <label>Genre</label> </br>
            <input name = "genre" type="radio" value="Science Fiction"> Science Fiction </br>
            <input name = "genre" type="radio" value="Fantasy"> Fantasy </br>
            <input name = "genre" type="radio" value="Horror"> Horror </br>
            <input name = "genre" type="radio" value="Romance"> Romance </br>
            <input name = "genre" type="radio" value="Mystery"> Mystery </br>
            <input name = "genre" type="radio" value="Nonfiction"> Nonfiction </br></br>
            <label>Price</label> </br>
            <input name="max" maxlength="3" size="6" placeholder="max"> to 
            <input name="min" maxlength="3" size="6" placeholder="min"> </br></br>
            <div id="filter_buttons">
                <input type="submit" value="Search">
                <input type="reset" value="Clear">
            </div>
        </fieldset>
    </form>
</div>
    <div id="catalogue">
        <div class="cata_top">
            <h1>Catalogue</h1>
            <p>1 - <?= count($books) ?> of <?= $countAll ?> results</p>
        </div>
        <div class="cata_bottom"> 
        <?php
        foreach ($books as $a) {
            $info = file("./books/$a/info.txt");
        ?>
            <a href="book.php?title=<?= $a ?>" class="cata_book">
                <img src="./books/<?= $a ?>/info.jpeg" alt="book image"/>
                <p class="title"><?= $info[0] ?> </br></p>
                <p class="author">by: <?= $info[1] ?></p>

            </a>
        <?php   
        }
        ?>
        </div>
    </div>
</div>

<?php include("bottom.php"); ?>