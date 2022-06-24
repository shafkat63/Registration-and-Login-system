<?php
    include("db.php");
    if(isset($_GET['id']) != "") {
        $delete = $_GET['id'];
        $delete = mysqli_query($connection, "DELETE FROM users WHERE id = '$delete'");
        if($delete) {
            header("Location:tablesys.php");
        } else {
            echo mysqli_error($connection);
        }
    }
?>