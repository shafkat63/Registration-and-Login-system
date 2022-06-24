<?php
include('db.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = mysqli_query($connection, "SELECT * FROM users WHERE userId = '$id'");

    while ($userrow = mysqli_fetch_array($select)) {
?>
        <div class="display">

            <p> ID : <span><?php echo $userrow['id']; ?></span>
                <a href="delete.php?id=<?php echo $userrow['id']; ?>" onclick="return confirm('Are you sure you wish to delete this Record?');">
                    <span class="delete" title="Delete"> Delete </span>
                </a>
            </p>


            <p> USER ID : <span><?php echo $userrow['userId']; ?></span>
                <a href="delete.php?id=<?php echo $userrow['userId']; ?>" onclick="return confirm('Are you sure you wish to delete this Record?');">
                    <span class="delete" title="Delete"> Delete </span>
                </a>
            </p>


            <p> USER NAME : <span><?php echo $userrow['username']; ?></span>
                <a href="delete.php?id=<?php echo $userrow['username']; ?>" onclick="return confirm('Are you sure you wish to delete this Record?');">
                    <span class="delete" title="Delete"> Delete </span>
                </a>
            </p>
            <br />
            <p> EMAIL ID : <span><?php echo $userrow['emailid']; ?></span>
                <a href="edit.php?id=<?php echo $userrow['userId']; ?>"><span class="edit" title="Edit"> Edit </span></a>
            </p>
            <br />
            <p> User Type : <span><?php echo $userrow['userType']; ?></span>
            </p>
            <br />
            <p> CREATED ON : <span><?php echo $userrow['created']; ?></span>
            </p>
            <p>
                <?php
                if ($userrow['userType'] == 'admin') { ?>
                        <a href="admin.php?id=<?php echo $id; ?>"><span class="profile" title="Profile"> Profile</span></a>


                <?php } else { ?>
                    <a href="user.php?id=<?php echo $id; ?>"><span class="profile" title="Profile"> Profile</span></a>
                <?php   }

                ?>

            </p>
        </div>
<?php }
} ?>