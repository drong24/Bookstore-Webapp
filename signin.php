<!--
    sign in page for bookstore site
-->

<?php 
    include("top.php") ;

    if (isset($_SESSION["error"])) {                                                    // error message for incorrect username/password combo
    unset($_SESSION['error']);
?>
<p class="error_message">Incorrect username or password.</p>
<?php
    }
?>
<div class="main_content user_ver">
    <h1>Sign In</h1>
    <form action="signin-submit.php" method="post">
        <fieldset>
            <label>Username: </label>
            <input name="username" type="text" maxlength="20" required>
            <label>Password: </label>
            <input name="password" type="password" maxlength="20" required>
            <input type="submit" value="Submit">
            <a href="signup.php">Signup</a>
        </fieldset>
    </form>
</div>
<?php include("bottom.php") ?>