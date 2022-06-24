<?php
include('db.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_POST['update'])) {
        $eusername = $_POST['eusername'];
        $eusermail = $_POST['eusermail'];
        // $emobile = $_POST['eusermobile'];
        $epassword = $_POST['euserpassword'];
        $epassword = md5($epassword);


        $updated = mysqli_query($connection, "UPDATE users SET username = '$eusername', emailid = '$eusermail', password = '$epassword' WHERE userId = '$id'") or die();
        if ($updated) {
            $msg = "Successfully Updated!!";



            header("Location: profile.php?id=$id");
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
                        <label for="name" id="preinput"> USER NAME : </label>
                        <input type="text" name="eusername" placeholder="Enter your name" value="<?php echo $profile['username']; ?>" id="inputid" />
                    </p>
                    <p>
                        <label for="email" id="preinput"> EMAIL ID : </label>
                        <input type="email" name="eusermail" placeholder="Enter your Email" value="<?php echo $profile['emailid']; ?>" id="inputid" />
                    </p>
                    <p>
                        <label for="password" id="preinput"> Password : </label>
                        <input type="password" name="euserpassword" placeholder="Enter your Pasword" id="inputid" />
                    </p>
                    <p>
                        <input type="submit" name="update" value="Update" id="inputid" />
                    </p>
                </form>
            </div>
    <?php }
    } ?>
</body>

</html>