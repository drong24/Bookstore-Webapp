<!--
    php for form in signup.php
-->
<?php
session_start();

$username = $_POST["username"];
$password1 = $_POST["password1"];
$password2 = $_POST["password2"];
$email = $_POST["email"];

if ($password1 != $password2) {                                         # checks if password and verify password fields are the same 
    $_SESSION["passwordError"] = TRUE;
    header("Location: signup.php");
    exit();
}

if (file("./users/$username/info.txt")) {                               # checks if username if taken or not
    $_SESSION["error"] = TRUE;
    header("Location: signup.php");
    exit();
}

$users = dir("./users");
foreach ($users as $user) {                                             # checks if email has been used by another account or not
    $file = file("./users/$user/info.txt");
    if ($file[2] == $email) {
        $_SESSION["error"] = TRUE;
        header("Location: signup.php");
        exit();
    }
}

$newUser = $username . "\n" . $password1 . "\n" . $email . "\n";            # creates new user and keeps new user logged in for 1 day
mkdir("./users/$username", 0777, true);
file_put_contents("./users/$username/info.txt", $newUser);
setcookie("username", $username, $expireTime);
header("Location: index.php");
exit();

?>