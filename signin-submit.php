<!--
    php for form in signin.php
    verifies user username and password 
-->

<?php
    session_start();

    $user = $_POST["username"];
    $password = $_POST["password"];
    $expireTime = time() + (60 * 60 * 24);

    if (file("./users/$user/info.txt")) {                   
        $file = file("./users/$user/info.txt");
        print(trim($file[0]) . "-" . trim($file[1]) . "\n");
        print($user . "-" . $password);
        if (trim($file[0]) == $user && trim($file[1]) == $password) {
            setcookie("username", $_POST["username"], $expireTime);
            header('Location: index.php');
            exit();
            print("yes!");
        }
    }
    $_SESSION["error"] = TRUE;
    header("Location: signin.php"); 
    exit();
?>