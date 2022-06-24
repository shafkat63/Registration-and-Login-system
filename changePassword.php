<?php
include('db.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_POST['update'])) {

        $oldPssword = $_POST['oldPassword'];
        $oldPssword = md5($oldPssword);
        $newpassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];

        $errors = array();





        $user_check_query = "SELECT userId,password,userType FROM users WHERE userId='$id' LIMIT 1";
        $result = mysqli_query($connection, $user_check_query);
        $user = mysqli_fetch_assoc($result);



        if (isset($user['password'])) {
            // $token = $user['userId'];

            if ($user['password'] == $oldPssword) {

                if ($newpassword === $confirmPassword) {

                    $newpassword = md5($newpassword);
                    $updated = mysqli_query($connection, "UPDATE users SET password = '$newpassword' WHERE userId = '$id'") or die();



                    if ($updated) {




                        header("Location: profile.php?id=$id");
                    }
                }
            } else {
                $errors['wrong'] = "Old  Password is worng";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Edit form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $getselect = mysqli_query($connection, "SELECT * FROM users WHERE userId='$id'");
        while ($profile = mysqli_fetch_array($getselect)) {
    ?>
            <div class="display">
                <form action="" method="post" name="insertform">
                    <p>
                        <label for="name" id="preinput"> Enter Old Pasword : </label>
                        <input type="password" name="oldPassword" placeholder="Enter Old Pasword" id="inputid" />
                    </p>
                    <p class="errMe"><?php if (isset($errors['wrong'])) {
                                            echo "<span style='color: red'>" . $errors['wrong'];
                                        } ?>
                    </p>
                    <p>
                        <label for="email" id="preinput"> Enter new Pasword: </label>
                        <input type="password" name="newPassword" placeholder="Enter new Pasword:" id="inputid" />
                    </p>
                    <p>
                        <label for="password" id="preinput"> Confirm new Password : </label>
                        <input type="password" name="confirmPassword" placeholder="Enter your Pasword" id="inputid" />
                    </p>
                    <p>
                        <input type="submit" name="update" value="Update" id="inputid" />
                    </p>
                </form>
            </div>
    <?php }
    } ?>
    <a href="profile.php?id=<?php echo $id; ?>"><span class="profile" title="Profile"> Profile</span></a>

</body>

</html>