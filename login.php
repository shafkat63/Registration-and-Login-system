<?php
session_start();
include("db.php");
if (isset($_POST['submit'])) {
    $errors = array();


    if (empty($_POST['userId'])) {
        $errors['userId1'] = "Your ID cannot be empty";
    }
    $password = $_POST['password'];
    if (empty($password)) {
        $errors['password1'] = "Password cannot be empty";
    }
    $password = md5($password);
    $userId = $_POST['userId'];

    $user_check_query = "SELECT userId,password,userType FROM users WHERE userId='$userId' LIMIT 1";
    $result = mysqli_query($connection, $user_check_query);
    $user = mysqli_fetch_assoc($result);
   


    if (isset($user['userId'], $user['password'])) {
        $token = $user['userId'];

        if ($user['userId'] == $userId && $user['password'] == $password) {

            if ($user['userType'] == 'admin') {
                header("Location: Admin.php?token=$token");
                exit();
            } else {
                header("Location: user.php?token=$token");
                exit();
            }
        }
    } else {
        $errors['wrong'] = "Wrong Information";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <form action="" method="post">

        <div class="login">
            <h3>Login</h3>
            <input type="text" placeholder="User id" name="userId"> <br>
            <p class="errMe"><?php if (isset($errors['userId1'])) {
                                    echo "<span style='color: red'>" . $errors['userId1'];
                                } elseif (isset($errors['wrong'])) {
                                    echo "<span style='color: red'>" . $errors['wrong'];
                                } ?>
            </p>
            <input type="password" placeholder="Password" name="password">
            <p class="errMe"><?php if (isset($errors['password1'])) {
                                    echo "<span style='color: red'>" . $errors['password1'];
                                } ?>
            </p><br>
            <br>
            <hr>
            </h1> <input type="checkbox" value="lsRememberMe" id="rememberMe"> <label for="rememberMe">Remember me</label>
            <br> <input type="submit" value="Login" name="submit" onclick="lsRememberMe()">
            <a href="registration.php">Registration</a>
        </div>

    </form>



</body>

</html>