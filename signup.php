<!--
    sign up page for bookstore site
-->

<?php
include("top.php");
if (isset($_SESSION['passwordError'])) {                                        # error message password and verify password fields do not match
    unset($_SESSION['passwordError']);
?>  
    <p class="error_message">Passwords do not match</p>
<?php
}
if (isset($_SESSION["error"])) {                                                # error message if username or email is already linked to a different user
    unset($_SESSION['error']);
?>
    <p class="error_message">Username or email already taken</p>
<?php
}
?>
<div class="main_content user_ver">
    <h1>Sign Up</h1>
    <form action="signup-submit.php" method="post">
        <fieldset>
            <label>Email: </label>
            <input name="email" maxlength="40" required>
            <label>Username: </label>
            <input name="username" maxlength="20" required>
            <label>Password: </label>
            <input name="password1" type="password" maxlength="20" required>
            <label>Re-enter Password: </label>
            <input name="password2" type="password" maxlength="20" required>
            <input type="submit" value="Submit">
            <a href="signin.php">Signin</a>
        </fieldset>
    </form>
</div>
<?php include("bottom.php") ?>