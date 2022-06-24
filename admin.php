<?php
include('db.php');
if (isset($_GET['token'])) {

    //User ID in a Token
    $token = $_GET['token'];
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $token = $id;
}

//   include('db.php');
// include('tablesys.php');
// $query = "SELECT * FROM users order by id desc";
// $select = mysqli_query($connection, $query);
// $num_row = mysqli_num_rows($select);
// $userrow = mysqli_fetch_array($select);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>
    <h1>This is Admin</h1>

    <br>
    <a href="tablesys.php?id=<?php echo $token; ?>"><span class="table" title="table">Table</span></a>

    <!-- From A login Page  -->


    <a href="profile.php?id=<?php echo $token; ?>"><span class="profile" title="Profile"> Profile</span></a>


</body>

</html>