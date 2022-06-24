<?php
include('db.php');
// $query = "SELECT * FROM users order by id desc";
// $select = mysqli_query($connection, $query);
// $userrow = mysqli_fetch_array($select);


if (isset($_GET['token'])) {

    //User ID in a Token
    $token = $_GET['token'];
}
//From An ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $token = $id;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
</head>

<body>
    <h1>This is user</h1>
    <!-- <a href="profile.php">Profile</a> -->

    <a href="profile.php?id=<?php echo $token; ?>"><span class="profile" title="Profile"> Profile</span></a>
    <a href="changePassword.php?id=<?php echo $token; ?>"><span class="changePassword" title="Change Password"> Change Password</span></a>

</body>

</html>