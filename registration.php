<?php
include("db.php");
if (isset($_POST['submit'])) {
    // $name = $_POST['username'];
    $errors = array();

    //Validating Name
    if (empty($_POST['username'])) {
        $errors['Name1'] = "Your name cannot be empty";
    }
    if (strlen($_POST['username']) < 2) {
        $errors['Name2'] = "Your name must be atleast 2 characters long";
    }

    //Validating Password
    if (empty($_POST['password'])) {
        $errors['password1'] = "Password cannot be empty";
    }
    if (strlen($_POST['password']) < 8) {
        $errors['password2'] = "Password must be atleast 8 characters long";
    }
    if ($_POST['password'] != $_POST['cpassword']) {
        $errors['password3'] = "Password Does not match";
    }
    // Validating Id
    if (empty($_POST['id'])) {
        $errors['id1'] = "Your 'ID' cannot be empty";
    }
    $id = $_POST['id'];

    if (!is_numeric($id)) {
        $errors['id2'] = "Your 'ID' needs to numbers";
    }
    if (strlen($_POST['id']) != 10) {
        $errors['id3'] = "Id must be 10 characters long";
    }



    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email1'] = "Write a valid e-mail address!";
    }


    $user_check_query = "SELECT * FROM users WHERE emailid='$email' LIMIT 1";
    $result = mysqli_query($connection, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user['emailid'] == $email) {
        $errors['email2'] = "This Email Address already Have an Account";
    }


    if (empty($_POST['userType'])) {
        $errors['userType1'] = "Select a User Type";
    }





    if (count($errors) == 0) {
        $userid = mysqli_real_escape_string($connection, $_POST['id']);
        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $usermail = mysqli_real_escape_string($connection, $_POST['email']);
        $userType = mysqli_real_escape_string($connection, $_POST['userType']);

        $password = mysqli_real_escape_string($connection, $_POST['password']);
        $password = md5($password);




        $update = mysqli_query($connection, "INSERT INTO users (userId,username,emailid,password,userType,created)VALUES
        ('$userid','$username','$usermail','$password','$userType',now())");

        if ($update) {
            $msg = "Successfully Updated!!";
            echo "<script type='text/javascript'>alert('$msg');</script>";
            header('Location:login.php');
        } else {
            $errormsg = "Something went wrong, Try again";
            echo "<script type='text/javascript'>alert('$errormsg');</script>";
            header('Location:registration.php');
        }
    }


    // if (count($errors) == 0) {

    //     header("Location: insert.php");
    //     exit();
    // }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <form action="" method="POST" name="registration">
        <div class="registration">
            <h3>Registration</h3>

            <label for="id">Id</label><br>
            <input type="text" id="Id" name="id"><br>
            <p class="errMe"><?php if (isset($errors['id1'])) {
                                    echo "<span style='color: red'>" . $errors['id1'];
                                } else if (isset($errors['id2'])) {
                                    echo "<span style='color: red'>" . $errors['id2'];
                                } else if (isset($errors['id3'])) {
                                    echo "<span style='color: red'>" . $errors['id3'];
                                } ?> </p>
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password"><br>
            <p class="errMe"><?php if (isset($errors['password1'])) {
                                    echo "<span style='color: red'>" . $errors['password1'];
                                } else if (isset($errors['password2'])) {
                                    echo "<span style='color: red'>" . $errors['password2'];
                                } else if (isset($errors['password3'])) {
                                    echo "<span style='color: red'>" . $errors['password3'];
                                }
                                ?></p>


            <label for="Confirm Password">Confirm Password</label><br>
            <input type="password" id="cpassword" name="cpassword"><br>


            <label for="Name">Name</label><br>
            <input type="text" id="Name" name="username"><br>
            <p class="errMe"><?php if (isset($errors['Name1'])) {
                                    echo "<span style='color: red'>" . $errors['Name1'];
                                } else if (isset($errors['Name2'])) {
                                    echo "<span style='color: red'>" . $errors['Name2'];
                                } ?></p> <!-- output errors if error occurs -->



            <label for="email">Email</label><br>
            <input type="email" id="email" name="email"><br>
            <p class="errMe"> <?php if (isset($errors['email1'])) {
                                    echo "<span style='color: red'>" . $errors['email1'] . "<br>";
                                } else if (isset($errors['email2'])) {
                                    echo "<span style='color: red'>" . $errors['email2'] . "<br>";
                                }
                                ?></p>


            <label for="userType">User Type</label><br>
            <!-- <input list="userType" type="text" id="myInput" name="userType"> -->
            <select name="userType" id="userType">
                <option disabled selected value> -- select an option -- </option>
                <option value="admin" id="admin">Admin</option>
                <option value="user" id="user">User</option>
            </select>
            <?php if (isset($errors['userType1'])) {
                echo "<span style='color: red'>" . $errors['userType1'] . "<br>";
            }
            ?>
            <input type="submit" name="submit" id="reg">
            <a href="login.php">Login</a>

            <!-- <button type="submit" name="reg" id="reg">Submit</button> -->
            <!-- <input type="submit" name="reg" id="reg">Submit</input> -->

        </div>


    </form>



</body>

</html>